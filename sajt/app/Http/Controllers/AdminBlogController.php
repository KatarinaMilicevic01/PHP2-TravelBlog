<?php

namespace App\Http\Controllers;

require_once base_path('vendor/autoload.php');

use App\Http\Requests\BlogRequest;
use App\Models\Akcije;
use App\Models\Blog;
use App\Models\KatBlog;
use App\Models\Kategorije;
use App\Models\Komentari;
use App\Models\Lajkovi;
use App\Models\Slika;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class AdminBlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogovi = Blog::with('blogPodnaslov','lajkBlog','komBlog','katBlog')->orderByDesc('datum')->get();
        return view('admin.pages.blogovi',['blogovi'=>$blogovi]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategorije = Kategorije::all();
        return view('admin.pages.add-blog',['kategorije'=>$kategorije]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $slika = $request->file('slika');
        $imeFajla = time().'___'.$slika->getClientOriginalName();
        $putanja = public_path('assets/img/' . $imeFajla);
        $kategorije = $request->input('kat',[]);

        try{
            DB::beginTransaction();
            $slikaNova = new Slika();
            $slikaNova-> putanja = $imeFajla;
            $slikaNova->alt = $request->get('alt');
            $slikaNova->save();

            $blog = new Blog();
            $blog->naslov = $request->get('naslov');
            $blog->opis = $request->get('opis');
            $blog->idSlika = $slikaNova->idSlika;
            $blog->save();

            foreach ($kategorije as $k){
                $katBlog = new KatBlog();
                $katBlog->idKategorija = $k;
                $katBlog->idBlog = $blog->idBlog;
                $katBlog->save();
            }
            DB::commit();
            // Premestite sliku na ciljnu putanju
            $slika->move(public_path('assets/img'), $imeFajla);
            return view('admin.pages.blogovi',["blogovi"=>Blog::all()]);
        }catch (\Exception $ex){
            return response()->redirectToRoute('blogovi.create');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
//        $blog = Blog::where('idBlog','=',$id)->with('slikaBlog','blogPodnaslov','lajkBlog','komBlog','akcije','katBlog')->first();
        $blog = Blog::find($id);
        $pregled = Akcije::where('idBlog','=',$id)->where('tipAkcije','=','Pregled bloga')->get();

        return view('admin.pages.blog', ['blog' => $blog, 'pregled' => $pregled]);

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $blog = Blog::find($id);
        $kategorije = Kategorije::all();
        return view('admin.pages.editBlog',['blog'=>$blog,'kategorije'=>$kategorije]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $blog = Blog::find($id);
        $noveKat = $request->get('kat',[]);
        $kategorije = KatBlog::where('idBlog','=',$id)->get();
        $novaSlika = $request->file('slikaBlog');

        try {
            // Prolazak kroz postojeće kategorije
            foreach ($kategorije as $kategorija) {
                // Provera da li je kategorija izbrisana iz izabranih kategorija
                if (!in_array($kategorija->idKategorija, $noveKat)) {
                    // Ako jeste, obriši je
                    $kategorija->delete();
                }
            }

            // Prolazak kroz izabrane kategorije iz zahteva
            foreach ($noveKat as $novaKategorijaId) {
                // Provera da li nova kategorija već postoji za dati blog
                if (!$kategorije->contains('idKategorija', $novaKategorijaId)) {
                    // Ako ne postoji, dodaj je
                    $novaKategorija = new KatBlog();
                    $novaKategorija->idBlog = $id;
                    $novaKategorija->idKategorija = $novaKategorijaId;
                    $novaKategorija->save();
                }
            }
            $blog->naslov = $request->get('naslovBlog');
            $blog->opis = $request->get('opisBlog');
            if ($novaSlika == null) {
                $slika = Slika::find($blog->idSlika);
                $slika->alt = $request->get('altBlog');
                $slika->save();
                $blog->save();
            } else {
                $idSlika = $blog->idSlika;
                $imeFajla = time() . "___" . $novaSlika->getClientOriginalName();
                $slika = new Slika();
                $slika->putanja = $imeFajla;
                $slika->alt = $request->get('altBlog');
                $slika->save();
                $novaSlika->move(public_path('assets/img'), $imeFajla);
                $blog->idSlika = $slika->idSlika;
                $blog->save();
                Slika::destroy($idSlika);
            }
            $pregled = Akcije::where('idBlog', '=', $id)->where('tipAkcije', '=', 'Pregled bloga')->get();

            return view('admin.pages.blog', ['blog' => $blog, 'pregled' => $pregled]);
        }catch (\Exception $ex){
            return response()->redirectToRoute('blogovi.edit',['blogovi'=>$id]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       try{
           DB::beginTransaction();
           $kategorije = KatBlog::where('idBlog','=',$id);
           $lajk = Lajkovi::where('idBlog','=',$id);
           $komentar = Komentari::where('idBlog','=',$id);
           $akcije = Akcije::where('idBlog','=',$id);
           Blog::destroy($id);
           Kategorije::destroy($kategorije->pluck('idKatBlog'));
           Lajkovi::destroy($lajk->pluck('idLike'));
           Komentari::destroy($komentar->pluck('idKomentar'));
           Akcije::destroy($akcije->pluck('idAkcija'));
           DB::commit();
           return redirect()->back();
       }catch (\Exception $ex){
           DB::rollBack();
           return redirect()->back();
       }
    }
}
