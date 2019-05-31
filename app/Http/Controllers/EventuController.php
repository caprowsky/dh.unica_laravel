<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

use App\EventuModel;
use App\LoguModel;
use App\AcorradoriModel;
use App\PartecipatModel;
use App\EsecudoriModel;
use Storage;
//use timgws\QueryBuilderParser;
use timgws\JoinSupportingQueryBuilderParser;


class EventuController extends Controller
{
	
	private $det = array(
	'table'=>'eventus',
	'abb'=>'ev',
	'single'=>'eventu',
	'title'=>'eventi',
	'rows'=>[
		['nome','Evento','y'],
		['inizio','Inizio','y'],
		['fine','Fine','y'],
		['descrizione','Descrizione','y'],
		['aggregatore_id','Aggregatore','n'],
		['luogo_id','Luogo','n']
	]);
	
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	 private function valida($request) {
			$this->validate($request,[
			'nome' => 'required|max:255',	
			'inizio' => 'date|nullable',	
			'fine' => 'date|nullable',		
			'descrizione' => 'max:1023',
			'datai_note' => 'max:1023',
			'datai_note' => 'max:1023'
			
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
		
		  $det=$this->det;
		
		if ($request['rules']!=null)
		{		
			session(['ev_rules' => $request['rules']]);
			
			//$query = new QueryBuilderParser();
			$query=new JoinSupportingQueryBuilderParser(null, EventuModel::getJoints());
			$rul=json_encode($query->parse_subquery(json_decode($request['rules'])));	
			
			$q= $query->parse($rul, EventuModel::query());
			
			$items=$q->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
			$aciunta="(ricerca avanzata)";
			
			$query='rules='.$request['rules'];
		}
		else 
		{
			if ($request->has('logu_id')) {
				$log=LoguModel::find($request['logu_id']);
				$items = $log->eventus()->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
				$aciunta="(luogo: ".$log->nome.")";
				$query='logu_id='.$request['logu_id'];
			} 
			elseif ($request->has('acorradori_id')) {
				$aco=AcorradoriModel::find($request['acorradori_id']);
				$items = $aco->eventus()->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
				$aciunta="(aggregatore: ".$aco->nome.")";
				$query='acorradori_id='.$request['acorradori_id'];
			} 
			elseif ($request->has('esecudori_id')) {
				$ese=EsecudoriModel::find($request['esecudori_id']);
				$items = $ese->eventus()->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
				$aciunta="(esecutore: ".$ese->nome." ".$ese->cognome.")";
				$query='esecudori_id='.$request['esecudori_id'];
			} 
			elseif ($request->has('eventu_id')) {
				$items=EventuModel::where('id',$request['eventu_id'])->paginate(config('labimus.options.option_paginate'));
				
				$aciunta="(Singolo)";
				$query='eventu_id='.$request['eventu_id'];
			} 
			else {
				$items = EventuModel::orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));			
				$aciunta="";
			}
		}	
		
		if (($request->has('page'))&&($request->ajax())) {
			return view('eventu_rows',compact('items','det','aciunta','query'));
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
		$eventu = (object) array("id"=>0,"nome"=>"","descrizione"=>"","luogo_id"=>0,"aggregatore_id"=>0);
		$logus = LoguModel::all(['id', 'nome']);
		$acs = AcorradoriModel::all(['id', 'nome']);		
		return view('eventu_edit',['item'=>$eventu,'logus'=>$logus,'acorradoris'=>$acs,'partecipantis'=>array()]);
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
		
		$eventu = EventuModel::create($request->all());

		$luogo=LoguModel::find($eventu->luogo_id);	
		$eventu->luogo=$luogo->nome;
		
		$aggr=AcorradoriModel::find($eventu->aggregatore_id);	
		$eventu->aggregatore=$aggr->nome;

		return response()->json($eventu);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$eventu = EventuModel::find($id);

		return view('eventu_show')->with('item',$eventu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $eventu = EventuModel::find($id);
        $logus = LoguModel::all(['id', 'nome']);	
        $acs = AcorradoriModel::all(['id', 'nome']);
        $par= PartecipatModel::where('evento_id', '=', $id)->get();
        
        return view('eventu_edit',['item'=>$eventu,'logus'=>$logus,'acorradoris'=>$acs,'partecipantis'=>$par]);
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
		
        $eventu = EventuModel::find($id);

		$eventu->nome = $request->nome;
		$eventu->descrizione = $request->descrizione;
		$eventu->inizio = $request->inizio;
		$eventu->datai_note = $request->datai_note;
		$eventu->fine = $request->fine;
		$eventu->dataf_note = $request->dataf_note;
		$eventu->luogo_id = $request->luogo_id;
		$eventu->luogo_note = $request->luogo_note;
		$eventu->aggregatore_id = $request->aggregatore_id;
		
		if ($request->foto_filename!="") {
			$eventu->foto_url='foto/eve'.$id.'_foto';
			if (Storage::exists($eventu->foto_url)) {
				Storage::delete($eventu->foto_url);
			}		
			Storage::copy($request->foto_filename, $eventu->foto_url);
		}
		
		$eventu->save();
		
		$luogo=LoguModel::find($eventu->luogo_id);	
		$eventu->luogo=$luogo->nome;
		
		$aggr=AcorradoriModel::find($eventu->aggregatore_id);	
		$eventu->aggregatore=$aggr->nome;

		return response()->json($eventu);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		PartecipatModel::where('evento_id', $id)->delete();	//elimina partecipanti
		
	  try {
			$eventu = EventuModel::destroy($id);

			return response()->json($eventu);
			} catch ( \Illuminate\Database\QueryException $e) {
				if ($e->errorInfo[1]==1451)
					return response('Evento presente in qualche tabella (documento?)' ,500);
				else 
				return response()->json($e->errirInfo ,500);
			}		
  
    }
     // Gestioni de is partecipantis
     
      public function createPartecipanti($eventu)
    {
		
		$par = (object) array("id"=>0,"ruolo"=>"","descrizione"=>"","evento_id"=>$eventu,"esecutore_id"=>0);
		
		$esecudoris = EsecudoriModel::all(['id', 'nome','cognome']);		
		return view('partecipanti_edit',['item'=>$par,'esecudoris'=>$esecudoris]);
    }
     
       public function editPartecipanti($id_e,$id_p)
    {
        $par = PartecipatModel::find($id_p);
        $esecudoris = EsecudoriModel::all(['id', 'nome','cognome']);	
        
       // $par= PartecipatModel::where('evento_id', '=', $id)->get();
        
        return view('partecipanti_edit',['item'=>$par,'esecudoris'=>$esecudoris]);
    }

     
     public function updatePartecipanti(Request $request, $id_e,$id_p)
    {
        $par = PartecipatModel::find($id_p);

		$par->ruolo = $request->ruolo;
		$par->descrizione = $request->descrizione;
		
		$par->evento_id = $request->evento_id;
		$par->esecutore_id = $request->esecutore_id;
		$par->save();
		
		$es=EsecudoriModel::find($par->esecutore_id);	
		$par->partecipante=$es->nome." ".$es->cognome;

		return response()->json($par);
    }

     
     public function storePartecipanti(Request $request)
    {
		/*
		
		$ev=EventuModel::find($par->evento_id);
		$request->evento_id=$ev->$id;
		
		$aggr=EsecudoriModel::find($par->esecutore_id);	
		$request->esecutore_id=$aggr->id;
		*/
		$par = PartecipatModel::create($request->all());
		
		$es=EsecudoriModel::find($par->esecutore_id);	
		$par->partecipante=$es->nome." ".$es->cognome;

		return response()->json($par);
    }
     
     public function destroyPartecipanti($id_e,$id_p)
    {
		$par = PartecipatModel::destroy($id_p);

		return response()->json($par);
    }
    public function test($id)
    {
		echo $id;
	}
	
	 public function search()
    {
		
		$rules="{}";
		
		if (session()->has('ev_rules')) $rules=session('ev_rules');
		
		return view('eventu_search')->with('rules',$rules);
	}
	  public function invsearch($id)
    {
		$eve = EventuModel::find($id);

		//MpegAudio::fromFile("old.mp3")->stripTags()->saveFile("new.mp3");
		
		return view('eventu_rev')->with('item',$eve);
	}
	
   
   
}
