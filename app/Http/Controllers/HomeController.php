<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimoni;
use App\Tutor;
use App\Program;
use App\Diskon;
use App\Setting;
use App\Registration;
use App\RegistrationDiskon;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $programs = Program::all();
        $testimonis = Testimoni::all();
        $tutors = Tutor::all();
        $setting = Setting::first();

        return view('index', compact('programs', 'testimonis', 'tutors', 'setting'));
    }

    public function about()
    {
        $tutors = Tutor::all();
        return view('about', compact('tutors'));
    }

    public function courses()
    {
        $programs = Program::all();
        $setting = Setting::first();

        return view('courses', compact('programs', 'setting'));
    }

    public function course($id)
    {
        $program = Program::find($id);

        if(is_null($program))
        {
            abort('404');
        }

        $programs = Program::whereNotIn('id', [$program->id])->get();
        
        return view('course', compact('program', 'programs'));
    }

    public function contact()
    {
        return view('contact');
    }

    public function registrasi()
    {
        $programs = Program::all();
        return view('registrasi', compact('programs'));
    }

    public function registrasiSubmit(Request $request)
    {
        $jumlah_pendaftar = sizeof($request->name);

        $diskon = Diskon::where('program_id', $request->program_id)
                    ->where('tanggal_awal', '<=', date_create())
                    ->where('tanggal_akhir', '>=', date_create())
                    ->where('banyak', '<=', $jumlah_pendaftar)
                    ->where('batas', '>=', $jumlah_pendaftar)
                    ->where('status', true)
                    ->first();

        if(isset($diskon))
        {
            $registration_diskon = RegistrationDiskon::create([
                'diskon_id' => $diskon->id
            ]);
        }

        $registrasi = array();
        foreach ($request->name as $key => $value)
        {
            $registrasi[] = Registration::create([
                'name' => $request->name[$key],
                'no_hp' => $request->no_hp[$key],
                'email' => $request->email[$key],
                'program_id' =>  $request->program_id,
                'status' => 'registrasi',
                'registration_diskon_id' => isset($diskon)?$registration_diskon->id:null,
            ]);
        }
        return redirect()->route('konfirmasi', ['id' => $registrasi[0]->id, 'no_hp' => $registrasi[0]->no_hp]);
    }

    public function konfirmasi(Request $request)
    {
        $registrasi = Registration::where('id', $request->id)->where('no_hp', $request->no_hp)->first();
        if(is_null($registrasi))
        {
            abort('404');
        }

        if(isset($registrasi->registration_diskon_id))
        {
            $registrasis = Registration::where('registration_diskon_id', $registrasi->registration_diskon_id)->get();
            $registration_diskon = RegistrationDiskon::find($registrasi->registration_diskon_id);
            return view('konfirmasi', compact('registrasi', 'registrasis', 'registration_diskon'));
        }

        return view('konfirmasi', compact('registrasi'));
    }

}
