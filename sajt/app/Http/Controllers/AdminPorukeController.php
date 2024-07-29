<?php

namespace App\Http\Controllers;

use App\Mail\Poruka;
use App\Models\Akcije;
use Illuminate\Http\Request;

class AdminPorukeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $poruke = \App\Models\Poruka::all();
        return view('admin.pages.poruke',['poruke'=>$poruke]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id)
    {
        $poruka = \App\Models\Poruka::find($id);
        if($poruka->procitano == 1){
            $poruka->procitano = 0;
        }
        else{
            $poruka->procitano = 1;
        }
        $poruka->save();
        return view('admin.pages.poruke',['poruke'=>\App\Models\Poruka::all()]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $akcija = Akcije::where("idPoruka",'=',$id)->get();
        $idAkcije = $akcija[0]->idAkcija;
        Akcije::destroy($idAkcije);
        \App\Models\Poruka::destroy($id);

        return view('admin.pages.poruke',['poruke'=>\App\Models\Poruka::all()]);
    }
}
