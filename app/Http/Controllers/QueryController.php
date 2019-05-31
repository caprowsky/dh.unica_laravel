<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Auth;

use App\QueryModel;
use DB;

class QueryController extends Controller
{
	
	 private $det = array(
	'table'=>'queries',
	'abb'=>'qu',
	'single'=>'query',
	'title'=>'ricerche',
	'rows'=>[
		['nome','Ricerca','y'],
		['descrizione','Descrizione','y'],
		['tipo','Tipo','y'],
		['tabella','Tabella','y'],
		['created_id','Utente','y']
	]);
	
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    private function valida($request) {
			$this->validate($request,[
			'nome' => 'required',			
			'query' => 'required',
			'descrizione' => 'max:255',
			'tabella' => 'max:31'		
		]);
	
	}

    /**
     * Show the application dashboard.
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
		
    	$items = QueryModel::orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
				
        $det=$this->det;
        $noadd=true;
        
		if (($request->has('page'))&&($request->ajax())) {
			return view('query_rows',compact('items','det','aciunta','query'));
		} 
		elseif ($request->ajax())
		{					
			return view('layouts/table2',compact('items','det','aciunta','query','noadd'));
		}
    }
    
    public function store(Request $request){
		$this->valida($request);
						
		$query = QueryModel::create($request->all()+ ['created_id' => Auth::id()]);

		return response()->json($query);
       
    
	}
	
	  /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		
        $item = QueryModel::find($id);
			
		return view('query_edit',compact('item'));
    }
    
     public function update(Request $request, $id)
    {
		$this->valida($request);
		
        $item = QueryModel::find($id);

		$item->nome = $request->nome;		
		$item->descrizione = $request->descrizione;		
		$item->tipo = $request->tipo;
		
		$item->save();
		return response()->json($item);
	}
	
	 public function show($id)
    {
		$item = QueryModel::find($id);
	
		return response()->json($item);
    }
    
    public function destroy($id)
    {
		$query = QueryModel::destroy($id);
		return response()->json($query);
	}
	
	public function autocomplete(Request $request){
		$term = $request['term'];
		$tab = $request['tab'];
		
		$results = array();
		
		$queries = DB::table('queries')
			->where('nome', 'LIKE', '%'.$term.'%')
			->where('tabella',$tab)
			
			->take(5)->get();
		
		foreach ($queries as $query)
		{
			$results[] = [ 'id' => $query->id, 'value' => $query->nome,'desc'=>$query->descrizione ];
		}
	return response()->json($results);
	
	}
	
}
