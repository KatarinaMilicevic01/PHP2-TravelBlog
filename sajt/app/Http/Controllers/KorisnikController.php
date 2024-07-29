<?php

namespace App\Http\Controllers;

use App\Http\Requests\LogInRequest;
use App\Http\Requests\PorukaRequest;
use App\Http\Requests\RegisterRequest;
use App\Mail\Poruka;
use App\Mail\PorukaForm;
use App\Models\Akcije;
use App\Models\Osoba;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Mockery\Exception;

class KorisnikController extends Controller
{
    public function logInForm(){
        return view('pages.logInForm');
    }

    public function logIn(LogInRequest $request){
        $email = $request->get('email');
        $lozinka = md5($request->get('lozinka'));

        $korisnik = Osoba::where('email','=',$email)->first();
        if(!$korisnik){
            return redirect()->back()->with('err','Ne postoji korisnik sa ovom email adresom.');
        }
        $korisnikPass = Osoba::where('lozinka','=',$lozinka)->first();
        if(!$korisnikPass){
            return redirect()->back()->with('err','Uneta lozinka nije ispravna.');
        }
        $request->session()->put("korisnik", $korisnik);
        if($korisnik->idUloga == 1){
            return redirect()->route('adminHome');

        }
        else{
            try{
                DB::beginTransaction();
                $akcije = new Akcije();
                $akcije->tipAkcije = "Logovanje";
                $akcije->idOsoba = $korisnik->idOsoba;
                $akcije->procitano = 0;
                $akcije->save();
                DB::commit();
                return redirect()->route('home');
            }catch(Exception $ex){
                return response()->redirectToRoute('logInForm');
            }
        }
    }

    public function logOut(Request $request){
//        dd($request->session()->get('korisnik.idOsoba'));
        if($request->session()->get('korisnik.idUloga') == 1){
            $request->session()->remove('korisnik');
            return redirect()->route('home');
        }
        else{
            try{
                DB::beginTransaction();
                $akcija = new Akcije();
                $akcija->tipAkcije = 'Odjava';
                $akcija->idOsoba = $request->session()->get('korisnik.idOsoba');
                $akcija->procitano = 0;
                $akcija->save();
                DB::commit();
                $request->session()->remove('korisnik');
                return redirect()->route('home');
            }catch (\Exception $ex){
                return response()->redirectToRoute('logOut');
        }

        }
    }

    public function registerForm(){
        return view('pages.registerForm');
    }

    public function register(RegisterRequest $request){
        $ime = $request->get("ime");
        $prezime = $request->get("prezime");
        $email = $request->get("email");
        $lozinka = md5($request->get("lozinka"));

        try{
            DB::beginTransaction();
            $osoba = new Osoba;
            $osoba->ime = $ime;
            $osoba->prezime = $prezime;
            $osoba->email = $email;
            $osoba->lozinka = $lozinka;
            $osoba->idUloga = 2;
            $osoba->save();
            $akcije = new Akcije();
            $akcije -> tipAkcije = "Registrovanje";
            $akcije -> idOsoba = $osoba->idOsoba;
            $akcije -> save();
            DB::commit();
            $korisnik = Osoba::where("email",'=',$email)->get();
            $request->session()->put("korisnik", $korisnik);
            return redirect()->route('home');

        }catch(Exception $ex){
            return response()->redirectToRoute('registerForm');
        }
    }

    public function posaljiPoruku(PorukaRequest $request){
//        Mail::to('katarina.milicevic.2001@gmail.com')->send(new PorukaForm($request->all()));

        try{
            DB::beginTransaction();
            $poruka = new \App\Models\Poruka;
            $poruka->naslov = $request->naslov;
            $poruka->poruka = $request->poruka;
            $poruka->idOsoba = $request->korisnikId;
            $poruka->procitano = 0;
            $poruka->save();
            $akcija = new Akcije();
            $akcija->tipAkcije = "Poruka";
            $akcija->idOsoba = $request->korisnikId;
            $akcija->idPoruka = $poruka->idPoruka;
            $akcija->save();
            DB::commit();
            return view('pages.kontakt',['msg'=>'uspeh']);
        }catch (\Exception $ex){
            return response()->redirectToRoute('posaljiPoruku');
        }

    }
}
