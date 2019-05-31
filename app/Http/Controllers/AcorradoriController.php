<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

use App\AcorradoriModel;
use App\LoguModel;
use Storage;

use timgws\QueryBuilderParser;

class AcorradoriController extends Controller
{
	
	private $det = array(
	'table'=>'acorradoris',
	'abb'=>'ac',
	'single'=>'acorradori',
	'title'=>'aggregatori',
	'rows'=>[
		['nome','Aggregatore','y'],
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
			'descrizione' => 'max:1023',
			'data_note' => 'max:1023',
			'data' => 'date|nullable'
			
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
			session(['ac_rules' => $request['rules']]);
			$query = new QueryBuilderParser();
			
			$rul=json_encode($query->parse_subquery(json_decode($request['rules'])));				
			$q= $query->parse($rul, AcorradoriModel::query());
			
			$items=$q->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
			$aciunta="(ricerca avanzata)";
			
			$query='rules='.$request['rules'];
		}
		else {
			if ($request['logu_id']!=null) {
				$log=LoguModel::find($request['logu_id']);
				$items = $log->acorradoris()->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
				$aciunta="(luogo: ".$log->nome.")";
				$query='logu_id='.$request['logu_id'];
			 
			} elseif ($request->has('acorradori_id')) {
				$items=AcorradoriModel::where('id',$request['acorradori_id'])->paginate(config('labimus.options.option_paginate'));
				
				$aciunta="(Singolo)";
				$query='acorradori_id='.$request['acorradori_id'];
			} 
			else {
				$items = AcorradoriModel::orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
				$aciunta="";
			} 
		} 
		if (($request->has('page'))&&($request->ajax())) {
			return view('acorradori_rows',compact('items','det','aciunta','query'));
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
		$acorradori = (object) array("id"=>0,"nome"=>"","descrizione"=>"","data"=>0,"luogo_id"=>0,"foto_url"=>null);
		$logus = LoguModel::all(['id', 'nome']);	
		return view('acorradori_edit',['item'=>$acorradori,'logus'=>$logus]);
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
		
		$acorradori = AcorradoriModel::create($request->all());

		$luogo=LoguModel::find($acorradori->luogo_id);	
		$acorradori->luogo=$luogo->nome;

		return response()->json($acorradori);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$acorradori = AcorradoriModel::find($id);

		return view('acorradori_show')->with('item',$acorradori);
    }
    


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $acorradori = AcorradoriModel::find($id);
        $logus = LoguModel::all(['id', 'nome']);	
        return view('acorradori_edit',['item'=>$acorradori,'logus'=>$logus]);
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
		
        $acorradori = AcorradoriModel::find($id);

		$acorradori->nome = $request->nome;
		$acorradori->descrizione = $request->descrizione;
		$acorradori->data = $request->data;
		$acorradori->data_note = $request->data_note;
		$acorradori->luogo_id = $request->luogo_id;
		$acorradori->luogo_note = $request->luogo_note;
		
		if ($request->foto_filename!="") {
			$acorradori->foto_url='foto/acc'.$id.'_foto';
			if (Storage::exists($acorradori->foto_url)) {
				Storage::delete($acorradori->foto_url);
			}		
			Storage::copy($request->foto_filename, $acorradori->foto_url);
		}
		$acorradori->save();
		
		$luogo=LoguModel::find($acorradori->luogo_id);	
		$acorradori->luogo=$luogo->nome;

		return response()->json($acorradori);
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
		$acorradori = AcorradoriModel::destroy($id);

		return response()->json($acorradori);
		} catch ( \Illuminate\Database\QueryException $e) {
			if ($e->errorInfo[1]==1451)
				return response('Aggregatore utilizzato in qualche tabella' ,500);
			else 
			return response()->json($e->errirInfo ,500);
		}
    
    }
      public function invsearch($id)
    {
		$item = AcorradoriModel::find($id);
		return view('acorradori_rev',compact('item'));
	}
	 public function search()
    {		
		$rules="{}";		
		if (session()->has('ac_rules')) $rules=session('ac_rules');	
		return view('acorradori_search',compact('rules'));
	}
	
   
  
    
}
