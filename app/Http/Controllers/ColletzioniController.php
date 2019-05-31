<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

use App\ColletzioniModel;
use App\LoguModel;
use Storage;
use timgws\QueryBuilderParser;

class ColletzioniController extends Controller
{
	
	
	private $det = array(
	'table'=>'colletzionis',
	'abb'=>'co',
	'single'=>'colletzioni',
	'title'=>'collezioni',
	'rows'=>[
		['nome','Collezione','y'],
		['data','Data','y'],
		['descrizione','Descrizione','y'],
		['luogo_id','Luogo','n']
	]);
	
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	private function valida($request) {
			$this->validate($request,[
			'nome' => 'required|max:31',	
			'data' => 'date|nullable',				
			'descrizione' => 'max:1023',
			'data_note' => 'max:1023'
			
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
		if ($request->filled('order')) {
			$by=$request->order;
			$dir=$request->dir;
			
		} else {
			$by='id';
			$dir='asc';
		}
		$det=$this->det;
		
		if ($request['rules']!=null)
		{		
			session(['co_rules' => $request['rules']]);
			$query = new QueryBuilderParser();
			
			$rul=json_encode($query->parse_subquery(json_decode($request['rules'])));				
			$q= $query->parse($rul, ColletzioniModel::query());
			
			$items=$q->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
			$aciunta="(ricerca avanzata)";
			
			$query='rules='.$request['rules'];
		}
		else {
		
			if ($request->has('logu_id')) {
				$log=LoguModel::find($request['logu_id']);
				$items = $log->colletzionis()->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
				$aciunta="(luogo: ".$log->nome.")";
				$query='logu_id='.$request['logu_id'];
			} elseif ($request->has('colletzioni_id')) {
				$items=ColletzioniModel::where('id',$request['colletzioni_id'])->paginate(config('labimus.options.option_paginate'));
				
				$aciunta="(Singolo)";
				$query='colletzioni_id='.$request['colletzioni_id'];
			} 
			else 	{
				$items = ColletzioniModel::orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
				$aciunta="";
			}
		}
		
		 
		if (($request->has('page'))&&($request->ajax())) {
			return view('colletzioni_rows',compact('items','det','aciunta','query'));
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
		$colletzioni = (object) array("id"=>0,"nome"=>"","descrizione"=>"","luogo_id"=>0);
		$logus = LoguModel::all(['id', 'nome']);	
		return view('colletzioni_edit',['item'=>$colletzioni,'logus'=>$logus]);
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
		
		$colletzioni = ColletzioniModel::create($request->all());

		$luogo=LoguModel::find($colletzioni->luogo_id);	
		$colletzioni->luogo=$luogo->nome;

		return response()->json($colletzioni);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$colletzioni = ColletzioniModel::find($id);

		return view('colletzioni_show')->with('item',$colletzioni);
    
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $colletzioni = ColletzioniModel::find($id);
        $logus = LoguModel::all(['id', 'nome']);	
        return view('colletzioni_edit',['item'=>$colletzioni,'logus'=>$logus]);
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
		
        $colletzioni = ColletzioniModel::find($id);

		$colletzioni->nome = $request->nome;
		$colletzioni->descrizione = $request->descrizione;
		$colletzioni->data = $request->data;
		$colletzioni->data_note = $request->data_note;
		$colletzioni->luogo_id = $request->luogo_id;
		$colletzioni->luogo_note = $request->luogo_note;
		
		if ($request->foto_filename!="") {
			$colletzioni->foto_url='foto/col'.$id.'_foto';
			if (Storage::exists($colletzioni->foto_url)) {
				Storage::delete($colletzioni->foto_url);
			}		
			Storage::copy($request->foto_filename, $colletzioni->foto_url);
		}
		
		$colletzioni->save();
		
		$luogo=LoguModel::find($colletzioni->luogo_id);	
		$colletzioni->luogo=$luogo->nome;

		return response()->json($colletzioni);
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
			$item = ColletzioniModel::destroy($id);

			return response()->json($item);
			} catch ( \Illuminate\Database\QueryException $e) {
				if ($e->errorInfo[1]==1451)
					return response('Collezione presente in qualche tabella (documento?)' ,500);
				else 
				return response()->json($e->errirInfo ,500);
			}		
    }
      public function invsearch($id)
    {
		$coll = ColletzioniModel::find($id);

		return view('colletzioni_rev')->with('item',$coll);
	}
	 public function search()
    {		
		$rules="{}";		
		if (session()->has('co_rules')) $rules=session('co_rules');	
		return view('colletzioni_search')->with('rules',$rules);
	}
	
}
