<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\DocumentuModel;
use App\LoguModel;
use App\EsecudoriModel;
use App\AcorradoriModel;
use App\EventuModel;
use App\ColletzioniModel;
use App\TierModel;
use App\IntervalModel;
use App\QueryModel;
use App\User;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		
        return view('home',['n_doc'=>DocumentuModel::count(),'n_col'=>ColletzioniModel::count(),
        'n_eve'=>EventuModel::count(),'n_aco'=>AcorradoriModel::count(),'n_ese'=>EsecudoriModel::count(),
        'n_log'=>LoguModel::count(),'n_tie'=>TierModel::count(),'n_int'=>IntervalModel::count(),'n_ric'=>QueryModel::count(),'n_use'=>User::count()]);
    }
}
