<?php

namespace App\Http\Controllers;

use App\Models\Akcije;
use App\Models\Blog;
use App\Models\Podnaslov;
use App\Models\Slika;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class AdminPodnaslovController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('admin.pages.addPodnaslov',['idBlog'=>$request->get('id')]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'naslov' => 'required|min:5|max:30',
                'opis'=>'required|min:25',
                'slika' => 'nullable|image',
                'alt' => 'nullable|min:5|required_with:slika'
            ]
        );
        try{
            $podnaslov = new Podnaslov();
            $podnaslov->podnaslov = $request->get('naslov');
            $podnaslov->podnaslovOpis = $request->get('opis');
            $podnaslov->idBlog = $request->get('idBlog');
            $slika = $request->file('slika');
            if($slika != null ){
                $nazivFajla = time().'___'.$slika->getClientOriginalName();
                $novaSlika = new Slika();
                $novaSlika->putanja = $nazivFajla;
                $novaSlika->alt = $request->get('alt');
                $novaSlika->save();
                $podnaslov->idSlika = $novaSlika->idSlika;
                $slika -> move(public_path('assets/img/'),$nazivFajla);
            }
            $podnaslov->save();

            $blog = Blog::find($request->get('idBlog'));
            $pregled = Akcije::where('idBlog','=',$request->get('idBlog'))->where('tipAkcije','=','Pregled bloga')->get();

            return view('admin.pages.blog', ['blog' => $blog, 'pregled' => $pregled]);

       }catch (Exception $ex){
            DB::rollBack();
            return response()->redirectToRoute('adminHome');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $podnaslov = Podnaslov::find($id);
        return view('admin.pages.editPodnaslov',["podnaslov"=>$podnaslov]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $podnaslov = Podnaslov::find($id);
        $novaSlika = $request->file('slika');
        $podnaslov->podnaslov = $request->get('naslov');
        $podnaslov->podnaslovOpis = $request->get('opis');
        if ($novaSlika == null) {
            $slika = Slika::find($podnaslov->idSlika);
            $slika->alt = $request->get('alt');
            $slika->save();
            $podnaslov->save();
        } else {
            $idSlika = $podnaslov->idSlika;
            $imeFajla = time() . "___" . $novaSlika->getClientOriginalName();
            $slika = new Slika();
            $slika->putanja = $imeFajla;
            $slika->alt = $request->get('alt');
            $slika->save();
            $novaSlika->move(public_path('assets/img'), $imeFajla);
            $podnaslov->idSlika = $slika->idSlika;
            $podnaslov->save();
            Slika::destroy($idSlika);
        }
        $pregled = Akcije::where('idBlog', '=', $id)->where('tipAkcije', '=', 'Pregled bloga')->get();
        $blog = Blog::find($podnaslov->idBlog);
        return view('admin.pages.blog', ['blog' => $blog, 'pregled' => $pregled]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $podnaslov = Podnaslov::find($id);
        $idBlog=$podnaslov->idBlog;
        $idSlika = $podnaslov->idSlika;
        if($podnaslov->idSlika){
            $podnaslov->idSlika = null;
            $podnaslov->save();
            Slika::destroy($idSlika);
        }
        Podnaslov::destroy($id);

        $blog = Blog::find($idBlog);
        $pregled = Akcije::where('idBlog','=',$idBlog)->where('tipAkcije','=','Pregled bloga')->get();

        return view('admin.pages.blog', ['blog' => $blog, 'pregled' => $pregled]);
    }
}
