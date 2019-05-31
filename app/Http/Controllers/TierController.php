<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\DocumentuModel;

use App\EsecudoriModel;
use App\TierModel;
use App\IntervalModel;


use timgws\JoinSupportingQueryBuilderParser;


class TierController extends Controller
{
  private $det = array(
	'table'=>'tiers',
	'abb'=>'ti',
	'single'=>'tier',
	'title'=>'tiers',
	'rows'=>[
		['nome','Tier','y'],
		['descrizione','Descrizione','y'],
		['','N. annotazioni','n'],
		['documento_id','Documento','y'],
		['esecutore_id','Esecutore','y']
	]);
  
  public function __construct()
		{
			$this->middleware('auth');
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
			session(['ti_rules' => $request['rules']]);				
			//$query = new QueryBuilderParser();	
			$query=new JoinSupportingQueryBuilderParser(null, TierModel::getJoints());
			
			$rul=json_encode($query->parse_subquery(json_decode($request['rules'])));		
			$q= $query->parse($rul, TierModel::query());
			$items=$q->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
			$aciunta="(ricerca avanzata)";
			$query='rules='.$request['rules'];
		}
		else {
			if ($request['documento_id']!=null) {
					$doc=DocumentuModel::find($request['documento_id']);
					$items = $doc->tiers()->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
					$aciunta="(documento: ".$doc->titolo.")";
					$query='documento_id='.$request['documento_id'];
			}
			elseif ($request['esecudori_id']!=null) {
					$esec=EsecudoriModel::find($request['esecudori_id']);
					$items = $esec->tiers()->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
					$aciunta="(esecutore: ".$esec->nome." ".$esec->cognome.")";
					$query='esecudori_id='.$request['esecudori_id'];
			}
			
			elseif ($request->has('tier_id')) {
				$items=TierModel::where('id',$request['tier_id'])->paginate(config('labimus.options.option_paginate'));
				
				$aciunta="(Singolo)";
				$query='tier_id='.$request['tier_id'];
			} 
			 else {
					
				$aciunta="";	
				$items = TierModel::orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
			}
		}
		
        $det=$this->det;
        $noadd=true;
        
		if (($request->has('page'))&&($request->ajax())) {
			return view('tier_rows',compact('items','det','aciunta','query'));
		} 
		elseif ($request->ajax())
		{					
			return view('layouts/table2',compact('items','det','aciunta','query','noadd'));
		}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
		$intervals = IntervalModel::where('tier_id', $id)->paginate(15);
		$nome=TierModel::find($id)->nome;
				
		if (($request->has('page'))&&($request->ajax())) {
			return view('tier_show_rows',['items'=>$intervals,'nome'=>$nome,'id'=>$id]);
		} 
		elseif ($request->ajax())
		{					
			return view('tier_show',['items'=>$intervals,'nome'=>$nome,'id'=>$id]);
		}
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		
      
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
		
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		IntervalModel::where('tier_id', $id)->delete();
		$tier = TierModel::destroy($id);
		return response()->json("Tier eliminato");
    }
    
	public function tgSubmit(Request $request)
	{
		$filename = $request->tgfile->store('tg');
		
		$data=json_decode(Storage::get($filename),true);
		Storage::delete($filename);
		if ($data['File type']!='json') {
			return response()->json("File non json:".print_r($data), 403);
		}
		if ($data['Object class']!='TextGrid') {
			return response()->json("File non TextGrid", 403);
		}
		
		$tiers=array();
		$i=0;
		foreach ($data["tiers"] as $name => $value) {
			$tier=new \stdClass();   
			$tier->id=$i++;
			$tier->nome=$value['name'];
			$tier->descrizione=$value['description'];
			$tier->classe=$value['class'];
			$tier->intervalli=count($value['intervals']);
			$tier->inizio=$value['start'];
			$tier->fine=$value['end'];
			$tier->overwrite=TierModel::where('nome', $tier->nome)->where('documento_id',$request->doc_id)->exists(); // this returns a true or false
			$tier->esecudori=null;
			if (substr($tier->nome, -3) === '_TE')
			{	//Tier esecutore
				$temp=explode('_',$tier->nome);
				$alias=explode(' ',$temp[count($temp)-2]);
				$query=EsecudoriModel::where('nome',$alias[0]);
				
				if (count($alias)==2) {
					$query->where('cognome',$alias[1]);
				}
				else {
				
					foreach ($alias as $a)
					{
						$query->orWhere('nome',$a);							
						$query->orWhere('cognome',$a);								
						$query->orWhere('alias','like','%'.$a.'%');
						
					}
				}
				$tier->esecudori=$query->get();
				
			}
			$tiers[]=$tier;
		}
		
		
    return view('tiersimport')->with('items',$tiers);
	}
	
	public function tgImport(Request $request)
	{
		$filename = $request->tgfile->store('tg');
		$data=json_decode(Storage::get($filename),true);
		Storage::delete($filename);
		if ($data['File type']!='json') {
			return response()->json("File non json:".$data['File type'], 403);
		}
		if ($data['Object class']!='TextGrid') {
			return response()->json("File non TextGrid", 403);
		}
		
		// importatzioni datus child doc
		if ((isset($data['start']))&&(isset($data['end']))) {	
			$documentu=DocumentuModel::find($request->doc_id);
			$documentu->inizio = $data['start'];
			$documentu->fine = $data['end'];
			$documentu->save();
		}
		
		$sel_tiers=explode(',',$request->sel);	// id de is tiers seletzionaus
		$tiers_es=explode(',',$request->tiers_es);	// id de is tiers esecudori
		$tiers_es_es=explode(',',$request->tiers_es_es);	// id de s'esecudori
		
		
		$tiers=array();
		$i=0;
		
		
		foreach ($data["tiers"] as $name => $value) {
			
			if (in_array($i, $sel_tiers)){
				
				if (TierModel::where('nome', $value['name'])->where('documento_id',$request->doc_id)->exists())
				{
					$this->destroy(TierModel::where('nome', $value['name'])->where('documento_id',$request->doc_id)->first()->id);
				}
				if (in_array($i, $tiers_es))
				{
					$esec=$tiers_es_es[array_search($i,$tiers_es)];
					if ($esec=='') $esec=null;
				
				} else {
					$esec=null;
				}
				
				$tier = TierModel::create([
				'nome'=>$value['name'],
				'descrizione'=>$value['description'],
				'documento_id'=>$request->doc_id,
				'inizio'=>$value['start'],
				'fine'=>$value['end'],
				'esecutore_id'=>$esec,
				'created_id' => Auth::id(),
				'updated_id'=>Auth::id()
				]);
				$n=1;
				foreach ($value['intervals'] as $ni => $vi) 
				{
					if ($vi['label']!="") {
					$int=IntervalModel::create([
						'seq'=>$n++,
						'nota'=>$vi['label'],		
						'inizio'=>$vi['start'],
						'fine'=>$vi['end'],
						'tier_id'=>$tier->id
					]);
				}
				}			
			} 
			$i++;
		}		
		
    //return response()->json("Importazione riuscita di ".count($tiers)." tiers.", 200);
    return response()->json("Tiers importati.");
	}
	
	
	public function tierGetJson(Request $request,$id)
	{
		if ($request->ajax()) {
			$t=TierModel::find($id);
			return response()->json($t->intervals);
		}
	}
	
	 public function search()
    {
		
		$rules="{}";
		
		if (session()->has('ti_rules')) $rules=session('ti_rules');
		
		
		return view('tier_search',['rules'=>$rules]);
	}
	 
	
}
