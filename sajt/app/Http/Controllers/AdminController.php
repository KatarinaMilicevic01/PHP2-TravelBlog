<?php

namespace App\Http\Controllers;

use App\Models\Akcije;
use App\Models\Kategorije;
use App\Models\Komentari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function dodajKategoriju(Request $request){
        // Validacija zahteva
        $validate = $request->validate([
            'kategorija' => 'required|string|max:25|unique:kategorija',
        ]);

        try{
            DB::beginTransaction();
            $kat = new Kategorije();
            $kat->kategorija = $request->get('kategorija');
            $kat->save();
            DB::commit();
            return response()->json(["kat"=>Kategorije::all()]);
        }catch (\Exception $ex){
            return redirect()->back();
        }
    }

    public function deleteCom($id){
        $akcije = Akcije::where('idKomentar','=',$id);

        foreach ($akcije as $a){
            Akcije::destroy($a->idAkcije);
        }

        Komentari::destroy($id);
        return back();
    }
}
