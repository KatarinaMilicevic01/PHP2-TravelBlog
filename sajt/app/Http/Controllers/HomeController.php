<?php

namespace App\Http\Controllers;

use App\Mail\Poruka;
use App\Models\Akcije;
use App\Models\Blog;
use App\Models\Lajkovi;
use App\Models\Osoba;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(){
        $blogovi= Blog::orderByDesc('datum')->limit(3);
        return view('pages.home',['blogovi'=>$blogovi->get()]);
    }

    public function adminHome(){
        $osoba = Osoba::where("idUloga", '=', 2)->get();
        $poruka = \App\Models\Poruka::where("procitano", '=', 0);
        $blogovi = Blog::all();
        $lajkovi = Lajkovi::all();
        $datum = now()->subDays(2)->toDateString();
        $akcije = Akcije::whereDate('vreme','>=',$datum)->orderByDesc("vreme")->with('osoba','blog','komentar','poruka')->get();
//        dd($akcije);
        return view('admin.pages.home', ["korisnici" => $osoba, 'blogovi'=>$blogovi, 'lajkovi'=>$lajkovi, 'poruka'=>$poruka, 'akcije'=>$akcije]);
    }

    public function adminNavNot(){
        $poruka = \App\Models\Poruka::with('osoba')->where("procitano", '=', 0)->get();
        $akcije = Akcije::where('procitano','=',0)->get();

        return response()->json(["poruka"=>$poruka,"akcije"=>$akcije]);
    }

    public function procitanaPoruka(Request $request){
        $idPoruke = $request->get("idNiz");

        foreach ($idPoruke as $id){
            $poruka = \App\Models\Poruka::find($id);
            DB::beginTransaction();
            $poruka->procitano = 1;
            $poruka->save();
            DB::commit();
        }
        return response()->json(['ok'=>'ok']);

    }
    public function procitanaAkcija(Request $request){
        $idAkcije = $request->get("idNiz");

        foreach ($idAkcije as $id){
            $akcija = Akcije::find($id);
            DB::beginTransaction();
            $akcija->procitano = 1;
            $akcija->save();
            DB::commit();
        }
        return response()->json(['ok'=>'ok']);

    }
}
