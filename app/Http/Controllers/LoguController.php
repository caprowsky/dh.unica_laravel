<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

use App\LoguModel;

use timgws\QueryBuilderParser;
use DB;

class LoguController extends Controller
{
	private $det = array(
	'table'=>'logus',
	'abb'=>'lg',
	'single'=>'logu',
	'title'=>'luoghi',
	'rows'=>[
		['nome','Luogo','y'],
		['lat','Lat-Lng','y'],
		['descrizione','Descrizione','y']
	]);

	
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	 private function valida($request) {
			$this->validate($request,[
			'nome' => 'required|max:63',			
			'descrizione' => 'max:255',
			'lat' => 'numeric',
			'lng' => 'numeric',
		]);
	
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
		$query=null;
		$aciunta="";
		
		if ($request->filled('order')) {
			$by=$request->order;
			$dir=$request->dir;
			
		} else {
			$by='id';
			$dir='asc';
		}
		if ($request['rules']!=null)
		{		
			session(['lo_rules' => $request['rules']]);				
			$query = new QueryBuilderParser();		
			$q= $query->parse($request['rules'], LoguModel::query());
			$items=$q->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
			$aciunta="(ricerca avanzata)";
			$query='rules='.$request['rules'];
		}
		else {
		
			$items = LoguModel::orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
		}
		
        $det=$this->det;
        
		if (($request->has('page'))&&($request->ajax())) {
			return view('logu_rows',compact('items','det','aciunta','query'));
		} 
		elseif ($request->ajax())
		{					
			return view('layouts/table2',compact('items','det','aciunta','query'));
		}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$logu = (object) array("id"=>0,"nome"=>"","descrizione"=>"","lat"=>0,"lng"=>0);
			
		return view('logu_edit')->with('item',$logu);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$this->valida($request);
		
		$logu = LoguModel::create($request->all());

		return response()->json($logu);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$logu = LoguModel::find($id);

		return view('logu_show')->with('item',$logu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $logu = LoguModel::find($id);
        return view('logu_edit')->with('item',$logu);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
		$this->valida($request);
		
        $logu = LoguModel::find($id);

		$logu->nome = $request->nome;
		$logu->descrizione = $request->descrizione;
		$logu->lat = $request->lat;
		$logu->lng = $request->lng;
		$logu->save();

		return response()->json($logu);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		try {
			$logu = LoguModel::destroy($id);
			return response()->json($logu);

		} catch ( \Illuminate\Database\QueryException $e) {
			if ($e->errorInfo[1]==1451)
				return response('Luogo utilizzato in qualche tabella' ,500);
			else 
			return response()->json($e->errirInfo ,500);
		}
	
    }
    
    public function autocomplete(Request $request){
		$term = $request['term'];
		
		$results = array();
		
		$queries = DB::table('logus')
			->where('nome', 'LIKE', '%'.$term.'%')
			
			->take(5)->get();
		
		foreach ($queries as $query)
		{
			$results[] = [ 'id' => $query->id, 'value' => $query->nome];
		}
	return response()->json($results);
	
	}
    
    public function invsearch($id)
    {
		$logu = LoguModel::find($id);

		return view('logu_rev')->with('item',$logu);
	}  
	public function search()
    {		
		$rules="{}";
		
		if (session()->has('lo_rules')) $rules=session('lo_rules');
		
		return view('logu_search',['rules'=>$rules]);
	}
	 public function verifica(Request $request)
    {
		
		$query = DB::table('logus')
		->where('nome', '=', $request['nome'])
			
		->take(1)->get();
		if (count($query)!=0) return response()->json($query[0]->nome);
		else return response()->json("");
	
    }
   
  
}
