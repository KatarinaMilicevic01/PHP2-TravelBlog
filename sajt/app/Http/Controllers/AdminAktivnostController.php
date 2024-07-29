<?php

namespace App\Http\Controllers;

use App\Models\Akcije;
use Illuminate\Http\Request;

class AdminAktivnostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function filter(Request $request){
//        dd($request->get('datum'));
        $datum = Akcije::selectRaw('DATE(vreme) as datum')
            ->groupBy('datum')
            ->get()
            ->pluck('datum');
        if($request->has('datum')){
            $aktivnosti = Akcije::whereDate('vreme','=',$request->get('datum'))->get();

        }
        $html = view('admin.pages.aktivnosti', ["akcije" => $aktivnosti, "vreme" => $datum])->render();
        return response()->json(['html'=>$html]);
    }
    public function index(Request $request)
    {
        $datum = Akcije::selectRaw('DATE(vreme) as datum')
            ->groupBy('datum')
            ->get()
            ->pluck('datum');
            $aktivnosti = Akcije::all();

            return view('admin.pages.aktivnosti',['vreme'=>$datum,'akcije'=>$aktivnosti]);
//        }

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
        //
    }
}
