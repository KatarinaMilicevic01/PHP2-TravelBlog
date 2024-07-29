<?php

namespace App\Http\Controllers;

use App\Http\Requests\KomentarRequest;
use App\Models\Akcije;
use App\Models\Blog;
use App\Models\Kategorije;
use App\Models\Komentari;
use App\Models\Lajkovi;
use App\Models\Slika;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class BlogController extends Controller
{
    public function blog($id)
    {
        $blog = \App\Models\Blog::find($id);
        $niz = collect([]);
        $lajkovi = Lajkovi::where("idBlog",'=',$id);
        if($lajkovi){
            foreach ($blog->lajkBlog as $lajk){
                $niz->push($lajk->idOsoba);
            }
        }
        try{
            DB::beginTransaction();
            $akcija = new Akcije();
            $akcija -> tipAkcije = 'Pregled bloga';
            $akcija -> idOsoba = session()->has('korisnik')?session()->get('korisnik.idOsoba'):null;
            $akcija -> idBlog = $id;
            $akcija->save();
            DB::commit();
        }catch (Exception $ex){
            DB::rollBack();
            return response()->redirectToRoute('adminHome');
        }
        return view('pages.blog',['blog'=>$blog, 'nizLajk'=>$niz]);
    }

    public function like(Request $request){
        $korisnik = $request->get('idOsoba');
        $blog = $request->get('idBlog');
        try{
            DB::beginTransaction();
            $like = new Lajkovi;
            $like->idOsoba = $korisnik;
            $like->idBlog = $blog;
            $like->save();
            $akcija = new Akcije();
            $akcija->tipAkcije="Lajk";
            $akcija->idOsoba = $korisnik;
            $akcija->idBlog = $blog;
            $akcija->save();
            DB::commit();
            return response()->json(['success'=>'success']);
        }catch (\Exception $ex){
            DB::rollBack();
            return response()->redirectToRoute('like');
        }

    }

    public function unlike(Request $request){
        $korisnik = $request->get('idOsoba');
        $blog = $request->get('idBlog');
        $like = Lajkovi::where('idOsoba','=',$korisnik)->where('idBlog','=',$blog)->get();
        try{
            DB::beginTransaction();
            Lajkovi::destroy($like);
            $akcije = new Akcije();
            $akcije->tipAkcije = "Dislajk";
            $akcije->idOsoba = $korisnik;
            $akcije->idBlog = $blog;
            $akcije->save();
            DB::commit();
            return response()->json(['success'=>'success']);
        }catch (\Exception $ex){
            DB::rollBack();
            return redirect()->back()->with('err',$ex);
        }
    }

    public function dodajKomentar(KomentarRequest $request){
        $korisnik = $request->get('idOsoba');
        $blog = $request->get('idBlog');
        $komentar = $request->get('komentar');

        try{
            DB::beginTransaction();
            $kom = new Komentari;
            $kom->idOsoba = $korisnik;
            $kom->idBlog = $blog;
            $kom->komentar = $komentar;
            $kom->save();
            $akcije = new Akcije();
            $akcije->tipAkcije = "Komentar";
            $akcije->idOsoba = $korisnik;
            $akcije->idBlog = $blog;
            $akcije->idKomentar = $kom->idKomentar;
            $akcije->save();
            DB::commit();
            return response()->json(['poruka'=>'uspeh']);
        }catch (\Exception $ex){
            DB::rollBack();
            return response()->redirectToRoute('dodajKomentar');
        }
    }

    public function editKom(KomentarRequest $request){
        $id = Komentari::find($request->idKom);
        try{
            DB::beginTransaction();
            $id->komentar = $request->komentar;
            $id->save();
            $akcije = new Akcije();
            $akcije -> tipAkcije = "Izmena komentara";
            $akcije -> idOsoba = $id->idOsoba;
            $akcije -> idBlog = $id->idBlog;
            $akcije -> idKomentar = $id->idKomentar;
            $akcije-> save();
            DB::commit();
            return response()->json(['poruka'=>'uspeh']);
        }catch (\Exception $ex){
            DB::rollBack();
            return response()->redirectToRoute('editKom');
        }
//        dd($id);
    }

    public function blogovi(Request $request){
        $items = Blog::paginate(3);
        $kategorije = Kategorije::all();

        if($request->has('idKat')){
            $idKat = $request->get('idKat');
            $items = Kategorije::find($idKat)->blogKat()->paginate(3);

            // Generisanje HTML-a za prikaz blogova
            $html = view('pages.blogovi', ["items" => $items->withQueryString(), "kategorije" => Kategorije::all()])->render();
            if($request->get('page')){
//                dd($request->get('page'));
                return view('pages.blogovi', ["items" => $items->withQueryString(), "kategorije" => Kategorije::all()]);
            }
           if(count($items) == 0){
               return response()->json(['msg'=>'nema']);
           }
            // Prikazivanje blogova koristeći Blade view i JSON odgovor
            return response()->json(['html' => $html, 'blogovi' => $items]);
        }


        if($request->has('sortBy')){
            if($request->get('sortBy')=="nazivASC"){
                $items = Blog::query()->orderBy('naslov')->paginate(3);
            }
            if($request->get('sortBy')=="nazivDESC"){
                $items = Blog::query()->orderByDesc('naslov')->paginate(3);
            }
            if($request->get('sortBy')=="datumASC"){
                $items = Blog::query()->orderBy('datum')->paginate(3);
            }
            if($request->get('sortBy')=="datumDESC"){
                $items = Blog::query()->orderByDesc('datum')->paginate(3);
            }
            if($request->get('page')){
//                dd($request->get('page'));
                return view('pages.blogovi', ["items" => $items->withQueryString(), "kategorije" => Kategorije::all()]);
            }

            $html = view('pages.blogovi', ["items" => $items->withQueryString(), "kategorije" => Kategorije::all()])->render();
            return response()->json(['html' => $html, 'blogovi' => $items]);

        }

        if($request->has('keyword')){
            $items =Blog:: where('naslov', 'like', '%'.$request->get('keyword').'%')
                ->orWhere('opis', 'like', '%'.$request->get('keyword').'%')
                ->paginate(3);
            if(count($items) == 0){
                return response()->json(['msg'=>'nema']);
            }
            if($request->get('page')){
//                dd($request->get('page'));
                return view('pages.blogovi', ["items" => $items->withQueryString(), "kategorije" => Kategorije::all()]);
            }

            $html = view('pages.blogovi', ["items" => $items->withQueryString(), "kategorije" => Kategorije::all()])->render();
            return response()->json(['html' => $html, 'blogovi' => $items]);
        }

        return view('pages.blogovi',["items" => $items->withQueryString(), "kategorije" => $kategorije]);
    }

    public function deleteCom(Request $request){
        $id = $request->get('id');

        $komentar = Komentari::find($id);
        $akcije = Akcije::where("idKomentar","=",$id)->get();

        try{
            foreach ($akcije as $a){
                Akcije::destroy($a->idAkcije);
            }
            $komentar->delete();

            return response()->json(['ok'=>'ok']);
        }catch (Exception $ex){
            return response()->redirect()->back();
        }

    }

}
