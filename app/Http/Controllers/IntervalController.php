<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

use Storage;
use Session;

use Illuminate\Support\Facades\Auth;


use App\EsecudoriModel;
use App\IntervalModel;
use App\AcapiuModel;
use App\DocumentuModel;

use falahati\PHPMP3\MpegAudio;
use timgws\QueryBuilderParser;

class IntervalController extends Controller
{
  private $det = array(
	'table'=>'intervals',
	'abb'=>'in',
	'single'=>'interval',
	'title'=>'annotazioni',
	'rows'=>[
		['seq','N.seq.','y'],
		['nota','Annotazione','n'],
		['inizio','Inizio','y'],
		['fine','Fine','y'],
		
		['tier_id','Tier','y'],
		['documento_id','Documento','n']
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
			session(['in_rules' => $request['rules']]);				
			$query = new QueryBuilderParser();	
			$rul=json_encode($query->parse_subquery(json_decode($request['rules'])));		
			$q= $query->parse($rul, IntervalModel::query());
			$items=$q->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
			$aciunta="(ricerca avanzata)";
			$query='rules='.$request['rules'];
		}
		else {
			if ($request['tier_id']!=null) {
					$tier=TierModel::find($request['tier_id']);
					$items = $tier->intervals()->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
					$aciunta="(tier: ".$tier->titolo.")";
					$query='tier_id='.$request['tier_id'];
			} else {
					
				$aciunta="";	
				$items = IntervalModel::orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
			}
		}
		
        $det=$this->det;
        $noadd=true;
        
		if (($request->has('page'))&&($request->ajax())) {
			return view('intervals_rows',compact('items','det','aciunta','query'));
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
		IntervalModel::destroy($id);
		return response()->json("Annotazione eliminata");
    }
    
     public function intervalPlay($id)	
	{
		$interval=IntervalModel::find($id);
		
		$i=($interval->inizio)-1;		//Pre
		if ($i<0) $i=0;
		
		$l=$interval->fine-$interval->inizio+2;		//Post
		
		
		$doc=$interval->tier->documentu;
		$url=$doc->getResourceUrl();
		
		$doc_i=$doc->inizio;	//offset
		
		if ($doc_i!=null) {
			$i=$i+$doc_i;
		}
		
		MpegAudio::fromFile("../storage/app/".$url)->trim($i, $l)->saveFile("../storage/app/".Session::getId()."t.mp3");
				
		return response()->file("../storage/app/".Session::getId()."t.mp3")->deleteFileAfterSend(true);
		
		//return response()->streamDownload(function () {
		//		echo "ciao";// MpegAudio::fromFile("../storage/app/".$url)->trim($i, $l)->close();
		//	}, 'file.txt');
    }
    
	 public function search()
    {		
		$rules="{}";
		
		if (session()->has('in_rules')) $rules=session('in_rules');
		$tipus=EsecudoriModel::getTipi();
		return view('interval_search',['rules'=>$rules]);
	}
	
}
