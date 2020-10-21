<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CountryModel;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        $product = new CountryModel([
            'provinsi' => $request->get('provinsi'),
            'kota' => $request->get('kota'),
            'kecamatan' => $request->get('kecamatan'),
            'kelurahan' => $request->get('kelurahan'),
        ]);

        $product->save();
        return redirect()->route('home');
    }
    
}
