<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

use App\EsecudoriModel;
use App\PartecipatModel;
use App\LoguModel;
use App\LoguEsecModel;
use App\AcapiuEsecModel;
use App\EventuModel;
use Storage;
use timgws\JoinSupportingQueryBuilderParser;
//use timgws\QueryBuilderParser;
use Illuminate\Support\Facades\Auth;
use DB;

class EsecudoriController extends Controller
{
	
	private $det = array(
	'table'=>'esecudoris',
	'abb'=>'es',
	'single'=>'esecudori',
	'title'=>'esecutori',
	'rows'=>[
		['nome','Nome/Den','y'],
		['cognome','Cognome','y'],
		['sesso','Sesso','y'],
		['tipo','Tipo','n'],
		['nascita','Nascita','y'],
		['morte','Morte','y'],
		['descrizione','Descrizione','y']
		
	]);
	
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	 private function valida($request) {
			$this->validate($request,[
			'nome' => 'required|max:255',	
			'cognome' => 'required|max:31',
			'sesso'=>'in:M,F,U',	
			'alias' => 'max:1023|nullable',		
			'descrizione' => 'max:1023',
			'nascita' => 'date|nullable',
			'datan_note' => 'max:1023',
			'morte' => 'date|nullable',
			'datam_note' => 'max:1023'
			
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
			session(['es_rules' => $request['rules']]);
	
			//$query = new QueryBuilderParser();
			$query=new JoinSupportingQueryBuilderParser(null, EsecudoriModel::getJoints());
			$rul=json_encode($query->parse_subquery(json_decode($request['rules'])));	
								
			$q= $query->parse($rul, EsecudoriModel::query());
			
			$items=$q->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
			$aciunta="(ricerca avanzata)";
			
			$query='rules='.$request['rules'];
		}
		else 
		{
		  
			if ($request->has('logu_id')) {
				$log=LoguModel::find($request['logu_id']);
				$items = $log->esecudoris()->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
				$aciunta="(luogo: ".$log->nome.")";
				$query='logu_id='.$request['logu_id'];
			} 
			elseif ($request->has('eventu_id')) {
				$eve=EventuModel::find($request['eventu_id']);
				$items = $eve->esecudoris()->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
				$aciunta="(evento: ".$eve->nome.")";
				$query='eventu_id='.$request['eventu_id'];
					
			} elseif ($request->has('esecudori_id')) {
				$items=EsecudoriModel::where('id',$request['esecudori_id'])->paginate(config('labimus.options.option_paginate'));
				
				$aciunta="(Singolo)";
				$query='esecudori_id='.$request['esecudori_id'];
			} 
			else {
				$items = EsecudoriModel::orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
				
		  }
	  }
		$tipus=EsecudoriModel::getTipi();
		
		if (($request->has('page'))&&($request->ajax())) {
			return view('esecudori_rows',compact('items','det','aciunta','query','tipus'));
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
		$item = new EsecudoriModel();//(object) array("id"=>0,"nome"=>'',"cognome"=>'',"alias"=>'',"tipo"=>0,"descrizione"=>'',"nascita"=>"","morte"=>"");
			
		$tipus=EsecudoriModel::getTipi();
		return view('esecudori_edit',compact('item','tipus'));
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
		
		$esecudori = EsecudoriModel::create($request->all());

		//$luogo=LoguModel::find($esecudori->luogo_id);	
		//$esecudori->luogo=$luogo->nome;

		return response()->json($esecudori);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		$item = EsecudoriModel::find($id);
        
		return view('esecudori_show',compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = EsecudoriModel::find($id);
        $logus = LoguModel::all(['id', 'nome']);	
        //$tipus=EsecudoriModel::getTipi();
        $tipus_ac=AcapiuEsecModel::getTipiIt();
		return view('esecudori_edit',compact('item','logus','tipus','tipus_ac'));
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
		
        $esecudori = EsecudoriModel::find($id);

		$esecudori->nome = $request->nome;
		$esecudori->cognome = $request->cognome;
		$esecudori->sesso = $request->sesso;
		$esecudori->alias = $request->alias;
		$esecudori->tipo = $request->tipo;
		$esecudori->descrizione = $request->descrizione;
		$esecudori->nascita = $request->nascita;
		$esecudori->datan_note = $request->datan_note;
		$esecudori->morte = $request->morte;
		$esecudori->datam_note = $request->datam_note;
		
		if ($request->foto_filename!="") {
			$esecudori->foto_url='foto/ese'.$id.'_foto';
			if (Storage::exists($esecudori->foto_url)) {
				Storage::delete($esecudori->foto_url);
			}		
			Storage::copy($request->foto_filename, $esecudori->foto_url);
		}
			
		
		$esecudori->save();
		
		//$luogo=LoguModel::find($esecudori->luogo_id);	
		//$esecudori->luogo=$luogo->nome;

		return response()->json($esecudori);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		PartecipatModel::where('esecutore_id', $id)->delete();	//elimina partecipazioni
		AcapiuEsecModel::where('de_id', $id)->delete();	//elimina legami da
		AcapiuEsecModel::where('a_id', $id)->delete();	//elimina legami verso
		LoguEsecModel::where('esecutore_id', $id)->delete();	//elimina luoghi
		
		try {
		$esecudori = EsecudoriModel::destroy($id);

		return response()->json($esecudori);
		} catch ( \Illuminate\Database\QueryException $e) {
			if ($e->errorInfo[1]==1451)
				return response('Esecutore presente in qualche tabella (evento?)' ,500);
			else 
			return response()->json($e->errirInfo ,500);
		}

		
    }
      public function invsearch($id)
    {
		$ese = EsecudoriModel::find($id);

		return view('esecudori_rev')->with('item',$ese);
	}
	
	 public function search()
    {
		
		
		$rules="{}";
		
		if (session()->has('es_rules')) $rules=session('es_rules');
		
		
		return view('esecudori_search',['rules'=>$rules]);
	}
	
	public function autocomplete(Request $request){
		$term = $request['term'];
		
		$results = array();
		
		$queries = DB::table('esecudoris')
			->where('nome', 'LIKE', '%'.$term.'%')
			->orWhere('cognome', 'LIKE', '%'.$term.'%')
			->take(5)->get();
		
		foreach ($queries as $query)
		{
			$results[] = [ 'id' => $query->id, 'value' => $query->id."-".$query->nome." ".$query->cognome." (".$query->descrizione.")"];
		}
	return response()->json($results);
	
	}
	
	// Acapius
	
	 public function acapiuCreate($id)
    {
		$acapiu = (object) array("id"=>0,"de_id"=>$id,"a_id"=>"","descrizione"=>"","tipo"=>"15");
		$tipus_ac=AcapiuEsecModel::getTipiIt();
		return view('acapiu_esec_edit',['item'=>$acapiu,'tipus_ac'=>$tipus_ac]);
    }
	
	public function acapiuStore(Request $request)
	{
		
		$acapiu = AcapiuEsecModel::create([
		'de_id'=>$request->de_id,
		'a_id'=>$request->a_id,
		'tipo'=>(int)$request->tipo,
		'descrizione'=>$request->descrizione,
		'created_id' => Auth::id(),
		'updated_id'=>Auth::id()]);
		
		$inv=AcapiuEsecModel::getTipoInv($request->tipo);	//relazione inversa
		
		if ($inv!=0)		
		{		
			$acapiu = AcapiuEsecModel::create([
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
		$a = AcapiuEsecModel::destroy($id);
		return response()->json("OK",200);
    }
	 public function acapius($id)
	 {
		 $item = EsecudoriModel::find($id);
		 $tipus_ac=AcapiuEsecModel::getTipiIt();
		 return view('acapius_esec_rows',compact('item','tipus_ac'));
	 }
	 public function acapiaus($id)
	 {
		 $item = EsecudoriModel::find($id);
		 $tipus_ac=AcapiuEsecModel::getTipiIt();
		 return view('acapiaus_esec_rows',compact('item','tipus_ac'));
	 }
	 
	 //Logus
	 
	  public function loguCreate($id)
    {
		$item = (object) array("id"=>0,"esecutore_id"=>$id,"luogo_id"=>"","descrizione"=>"");
		
		return view('logu_esec_edit',compact('item'));
    }
	
	public function loguStore(Request $request)
	{
		
		$item = LoguEsecModel::create([
		'luogo_id'=>$request->luogo_id,
		'esecutore_id'=>$request->id,
		'descrizione'=>$request->descrizione,
		'created_id' => Auth::id(),
		'updated_id'=>Auth::id()]);
		
		return response()->json("OK",200);
    
	}
	 public function loguDelete($id)
    {
		$a = LoguEsecModel::destroy($id);
		return response()->json("OK",200);
    }
     public function logus($id)
	 {
		 $item = EsecudoriModel::find($id);
		
		 return view('logus_esec_rows',compact('item'));
	 }
}


