<?php

namespace App\Http\Controllers;

use App\Mail\Poruka;
use App\Models\Akcije;
use App\Models\Komentari;
use App\Models\Lajkovi;
use App\Models\Osoba;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $osobe = Osoba::all();
        return view('admin.pages.korisnici',['osobe'=>$osobe]);
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
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Akcije::where('idOsoba','=',$id)->delete();

        Lajkovi::where('idOsoba','=',$id)->delete();

        Komentari::where('idOsoba','=',$id)->delete();

       \App\Models\Poruka::where('idOsoba','=',$id)->delete();

        Osoba::destroy($id);
        return back();
    }
}
