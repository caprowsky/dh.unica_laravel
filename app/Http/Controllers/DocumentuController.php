<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

use Storage;
use Illuminate\Support\Facades\Auth;

use App\DocumentuModel;
use App\EsecudoriModel;
use App\ColletzioniModel;
use App\EventuModel;

use DB;
use App\AcapiuModel;
use App\EsecDocumentuModel;

use timgws\JoinSupportingQueryBuilderParser;

class DocumentuController extends Controller
{
  private $det = array(
	'table'=>'documentus',
	'abb'=>'do',
	'single'=>'documentu',
	'title'=>'documenti',
	'rows'=>[
		['titolo','Documento','y'],
		['data','Data','y'],
		['tipo','Tipo','y'],
		['identificatore','Id','y'],
		['evento_id','Evento','y'],
		['collezione_id','Collezione','n']
	]);
	
  private $newfile="";
  
  public function __construct()
		{
			$this->middleware('auth');
		}
		
		private function valida($request) {
			$this->validate($request,[
			'titolo' => 'required',			
			'data' => 'date|nullable',
			'formato' => 'max:1023',
			'identificatore' => 'max:255',
			'lingua' => 'max:255',
			'lingua_det' => 'max:1023',
			'data_note' => 'max:1023',
			'inizio'=>'numeric|nullable',
			'fine'=>'numeric|nullable'
			
		]);
	
	}
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {	
		$by='id';
		$dir='asc';
		
		if ($request->filled('order')) {
			$by=$request->order;
			$dir=$request->dir;
			
		} 
		
		if ($request->has('rules'))
		{		
			session(['do_rules' => $request['rules']]);					
			//$query = new QueryBuilderParser();
			
			$query=new JoinSupportingQueryBuilderParser(null, DocumentuModel::getJoints());
			$rul=json_encode($query->parse_subquery(json_decode($request['rules'])));	
			
			$q= $query->parse($rul, DocumentuModel::query());
			$items=$q->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
			$aciunta="(ricerca avanzata)";
			$query='rules='.$request['rules'];
			
		}
		elseif ($request->has('logu_id')) {
				$log=LoguModel::find($request['logu_id']);
				$items = $log->documentus()->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
				$aciunta="(".$log->nome.")";
				$query='logu_id='.$request['logu_id'];
		} 
		elseif ($request->has('eventu_id')) {
				$eve=EventuModel::find($request['eventu_id']);
				$items = $eve->documentus()->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
				$aciunta="(evento: ".$eve->nome.")";
				$query='eventu_id='.$request['eventu_id'];
		}
		elseif ($request->has('esecudori_id')) {
				$ese=EsecudoriModel::find($request['esecudori_id']);
				$items = $ese->documentus()->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
				$aciunta="(esecutore: ".$ese->nome." ".$ese->cognome.")";
				$query='esecudori_id='.$request['esecudori_id'];
		}
		elseif ($request->has('colletzioni_id')) {
				$col=ColletzioniModel::find($request['colletzioni_id']);
				$items = $col->documentus()->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
				$aciunta="(collezione: ".$col->nome.")"; 
				$query='colletzioni_id='.$request['colletzioni_id'];
		} elseif ($request->has('documentu_id')) {
				$items=DocumentuModel::where('id',$request['documentu_id'])->paginate(config('labimus.options.option_paginate'));
				
				$aciunta="(Singolo)";
				$query='documentu_id='.$request['documentu_id'];
			} 
		else {
				$items = DocumentuModel::orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
				$aciunta="";
				$query=null;
		}
		
		$det=$this->det;
		$tipus=DocumentuModel::getTipi();
						
		if (($request->has('page'))&&($request->ajax())) {
			return view('documentu_rows',compact('items','det','aciunta','query','tipus'));
		} 
		elseif ($request->ajax())
		{					
			return view('layouts/table2',compact('items','det','aciunta','query','tipus'));
		}
		
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$item = new DocumentuModel();
		//(object) array("id"=>0,"titolo"=>"","creatore"=>"","editore"=>"","soggetto"=>"","contributore"=>"","descrizione"=>"","data"=>"",
		//"formato"=>"","tipo"=>"","lingua"=>"","lingua_det"=>"","evento_id"=>0,"collezione_id"=>0,"files"=>array());
		$eventus = EventuModel::all(['id', 'nome']);
		$colletzionis = ColletzioniModel::all(['id', 'nome']);
		$tipus= DocumentuModel::getTipi();
		
		return view('documentu_edit',compact('item','eventus','colletzionis','tipus'));
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
						
		$documentu = DocumentuModel::create($request->all()+ ['created_id' => Auth::id(),'updated_id'=>Auth::id()]);

		$evento=EventuModel::find($documentu->evento_id);	
		$documentu->evento=$evento->nome;
		
		$coll=ColletzioniModel::find($documentu->collezione_id);	
		$documentu->collezione=$coll->nome;
		
		$documentu->tipo_str= DocumentuModel::getTipi()[$documentu->tipo];

		//$path=$request->file('file')->store('documentus');
		

		return response()->json($documentu);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$item = DocumentuModel::find($id);
		
		//$evento=EventuModel::find($documentu->evento_id);	
		//$documentu->evento=$evento->nome;
		
		//$coll=ColletzioniModel::find($documentu->collezione_id);	
		//$documentu->collezione=$coll->nome;

		$item->tipo_str= DocumentuModel::getTipi()[$item->tipo];
		$tipus_ac=AcapiuModel::getTipiIt();
		//$documentu->files = DocumentuModel::files();
				
		return view('documentu_show',compact('item','tipus_ac'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		
        $item = DocumentuModel::find($id);
		$eventus = EventuModel::all(['id', 'nome']);
		$colletzionis = ColletzioniModel::all(['id', 'nome']);
		$tipus= DocumentuModel::getTipi();
		$tipus_ac=AcapiuModel::getTipiIt();
		return view('documentu_edit',compact('item','eventus','colletzionis','tipus','tipus_ac'));
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
		
        $documentu = DocumentuModel::find($id);
		$documentu->titolo = $request->titolo;
		$documentu->titolo_alt = $request->titolo_alt;
		
		$documentu->soggetto = $request->soggetto;
		$documentu->descrizione = $request->descrizione;	
		$documentu->data = $request->data;
		$documentu->data_note = $request->data_note;
		$documentu->tipo = $request->tipo;
		$documentu->formato = $request->formato;
		$documentu->identificatore = $request->identificatore;
		$documentu->lingua = $request->lingua;
		$documentu->lingua_det = $request->lingua_det;
		$documentu->diritti = $request->diritti;
		
		$documentu->inizio = $request->inizio;
		$documentu->fine = $request->fine;
		
		$documentu->evento_id = $request->evento_id;
		$documentu->collezione_id = $request->collezione_id;
		$documentu->updated_id=Auth::id();
		
		//$documentu->file=$request->file('filex')->store('documentus');
		
		$documentu->save();
	
		$evento=EventuModel::find($documentu->evento_id);	
		$documentu->evento=$evento->nome;
		
		$coll=ColletzioniModel::find($documentu->collezione_id);	
		$documentu->collezione=$coll->nome;

		$documentu->tipo_str= DocumentuModel::getTipi()[$documentu->tipo];
		
		
		return response()->json($documentu);
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
			$documentu = DocumentuModel::destroy($id);
		} catch ( \Illuminate\Database\QueryException $e) {
			if ($e->errorInfo[1]==1451)
				return response('Il documento ha risorse associate (tiers e/o files e/o relazioni) che vanno cancellati.' ,500);
			else 
			return response()->json($e->errorInfo,403);
		}

		

		return response()->json($documentu);
    }
    
    public function clona($id)
    {
		$model = DocumentuModel::find($id);

		$model->titolo.=" (c)";

		$newModel = $model->replicate();
		$newModel->push();

		/*
		foreach($model->getRelations() as $relation => $items){
			foreach($items as $item){
				unset($item->id);
				$newModel->{$relation}()->create($item->toArray());
			}
		}
		* */
		
	}
	public function clona_totu($id)
    {
		$model = DocumentuModel::find($id);

		$model->titolo.=" (c)";

		$newModel = $model->replicate();
		$newModel->push();
		
		foreach($model->acapius as $item){
			
				$newItem = $item->replicate();
				$newItem->a_id=$newModel->id;	//sostituisce
				$newItem->push();			
		}
		foreach($model->acapiaus as $item){		
				$newItem = $item->replicate();
				$newItem->de_id=$newModel->id;	//sostituisce
				$newItem->push();
			
		}
		foreach($model->acapius_esec as $item){
			
				$newItem = $item->replicate();
				$newItem->documento_id=$newModel->id;	//sostituisce
				$newItem->push();			
		}
		
	
	}
	public function importa(Request $request) {
		
		$filename = $request->dfile->store('tmp');
		$data=json_decode(Storage::get($filename),true);
		Storage::delete($filename);
		
		if (json_last_error()==0) {
		
		unset($data->id);
		
		
		foreach ($data as $k=>$v)
		{
			if (is_array($v)) {
				$data[$k]=json_encode($v);
			}
		}
		$item = new DocumentuModel($data);
		
		$eventus = EventuModel::all(['id', 'nome']);
		$colletzionis = ColletzioniModel::all(['id', 'nome']);
		$tipus= DocumentuModel::getTipi();
		$tipus_ac=AcapiuModel::getTipiIt();
		return view('documentu_edit',compact('item','eventus','colletzionis','tipus','tipus_ac'));
	}
	else {
		return response()->json(json_last_error_msg(),400); 
		}
	}
	public function esporta(Request $request,$id) {
	
		$item = DocumentuModel::find($id);
		Storage::put('tmp/'.$id.'.json', json_encode($item,JSON_UNESCAPED_LINE_TERMINATORS));
		return response()->download('../storage/app/tmp/'.$id.'.json')->deleteFileAfterSend(true);
		
	}
    
    public function invsearch($id)
    {
		$item = DocumentuModel::find($id);
		return view('documentu_rev',compact('item'));
	}
    
    public function search()
    {
			
		$rules="{}";
		
		if (session()->has('do_rules')) $rules=session('do_rules');
		
		return view('documentu_search',['rules'=>$rules]);
	}
	
	public function autocomplete(Request $request){
		$term = $request['term'];
		
		$results = array();
		
		$queries = DB::table('documentus')
			->where('titolo', 'LIKE', '%'.$term.'%')
			
			->take(5)->get();
		
		foreach ($queries as $query)
		{
			$results[] = [ 'id' => $query->id, 'value' => $query->titolo ];
		}
	return response()->json($results);
	
	}
	
	public function play($id){
		$item = DocumentuModel::find($id);
		switch ($item->tipo) {
			case 3:	//audio
				//if ($item->getAudioFile!=null)
				//{			
					return view('documentu_play',compact('item'));
				//}
				//else //pdf
				//{
				//	$nome=$item->files[0]->filename;
				//	return view('documentu_download',compact('item','nome'));
					
				//}
			case 1: //immagine
				$tagga=false;
				return view('documentu_view',compact('item','tagga'));
			default:
				return response()->json("Tipo [".DocumentuModel::getTipi()[$item->tipo]."] non gestito!",403);
		}
	}
	
	public function tagga($id){
		$item = DocumentuModel::find($id);
		$tagga=true;
		return view('documentu_view',compact('item','tagga'));
			
	}
	
	// Acapius
	
	 public function acapiuCreate($id)
    {
		$acapiu = (object) array("id"=>0,"de_id"=>$id,"a_id"=>"","descrizione"=>"","tipo"=>"15");
		$tipus_ac=AcapiuModel::getTipiIt();
		return view('acapiu_edit',['item'=>$acapiu,'tipus_ac'=>$tipus_ac]);
    }
	
	public function acapiuStore(Request $request)
	{
		
		$acapiu = AcapiuModel::create([
		'de_id'=>$request->de_id,
		'a_id'=>$request->a_id,
		'tipo'=>(int)$request->tipo,
		'descrizione'=>$request->descrizione,
		'created_id' => Auth::id(),
		'updated_id'=>Auth::id()]);
		
		$inv=AcapiuModel::getTipoInv($request->tipo);	//relazione inversa
		
		if ($inv!=0)		
		{		
			$acapiu = AcapiuModel::create([
			'de_id'=>$request->a_id,
			'a_id'=>$request->de_id,
			'tipo'=>(int)$inv,
			'descrizione'=>$request->descrizione,
			'created_id' => Auth::id(),
			'updated_id'=>Auth::id()]);
		}
		return response()->json("OK",200);
    
	}
	 public function acapiuDelete($id)
    {
		$a = AcapiuModel::destroy($id);
		return response()->json("OK",200);
    }
	 public function acapius($id)
	 {
		 $item = DocumentuModel::find($id);
		 $tipus_ac=AcapiuModel::getTipiIt();
		 return view('acapius_rows',compact('item','tipus_ac'));
	 }
	 public function acapiaus($id)
	 {
		 $item = DocumentuModel::find($id);
		 $tipus_ac=AcapiuModel::getTipiIt();
		 return view('acapiaus_rows',compact('item','tipus_ac'));
	 }
	 
	 //
	  public function ruoluCreate($id)
    {
		$item = DocumentuModel::find($id);
		if ($item->tipo==1) $t=true; else $t=false;	//immagini
		
		$ruolu = (object) array("documento_id"=>$id,"esecutore_id"=>"","descrizione"=>"","ruolo"=>"","taggable"=>$t);
		$tipus_ru=EsecDocumentuModel::getTipi();
		return view('ruolu_edit',['item'=>$ruolu,'tipus_ru'=>$tipus_ru]);
    }
	
	public function ruoluStore(Request $request)
	{
		
		$ruolu = EsecDocumentuModel::create([
		'documento_id'=>$request->doc_id,
		'esecutore_id'=>$request->ag_id,
		'ruolo'=>$request->ruolo,
		'descrizione'=>$request->descrizione,
		'created_id' => Auth::id(),
		'updated_id'=>Auth::id()]);
		
		return response()->json("OK",200);
    
	}
	public function ruoluUpdate(Request $request,$id)
	{

		$ruolu = EsecDocumentuModel::find($id);
		
		$ruolu->esecutore_id=$request->ag_id;
		$ruolu->ruolo=$request->ruolo;
		$ruolu->descrizione=$request->descrizione;
		$ruolu->save();
		return response()->json("OK",200);
    
	}
	  public function ruoluDelete($id)
    {
		$a = EsecDocumentuModel::destroy($id);
		return response()->json("OK",200);
    }
	  public function ruolus($id)
	 {
		 $item = DocumentuModel::find($id);
		 //$tipus_ru=EsecDocumentuModel::getTipi();
		 return view('ruolus_rows',compact('item'));//,'tipus_ru'));
	 }
	 
	  public function ruoluEdit($d_id,$r_id)
    {
		$ditem = DocumentuModel::find($d_id);
		if ($ditem->tipo==1) $t=true; else $t=false;	//immagini
        $item = EsecDocumentuModel::find($r_id);
		$tipus_ru=EsecDocumentuModel::getTipi();
		$item->taggable=$t;
		
		return view('ruolu_edit',['item'=>$item,'tipus_ru'=>$tipus_ru]);
    }
	 

}
