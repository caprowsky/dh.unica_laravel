<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

use App\User;

use timgws\QueryBuilderParser;

class UserController extends Controller
{
	private $det = array(
	'table'=>'users',
	'abb'=>'us',
	'single'=>'user',
	'title'=>'utenti',
	'rows'=>[
		['name','Nome','y'],
		['email','email','y'],
		['','Ruoli','n']
		
	]);

	
	public function __construct()
	{
		$this->middleware('auth');
	}
	
	 private function valida($request) {
			/*$this->validate($request,[
			'name' => 'required|max:63',			
			'descrizione' => 'max:255',
			'lat' => 'numeric',
			'lng' => 'numeric',
		]);
	*/
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
			session(['us_rules' => $request['rules']]);				
			$query = new QueryBuilderParser();		
			$q= $query->parse($request['rules'], User::query());
			$items=$q->orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
			$aciunta="(ricerca avanzata)";
			$query='rules='.$request['rules'];
		}
		else {
		
			$items = User::orderBy($by, $dir)->paginate(config('labimus.options.option_paginate'));
		}
		
        $det=$this->det;
        
		if (($request->has('page'))&&($request->ajax())) {
			return view('user_rows',compact('items','det','aciunta','query'));
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
		
		$user = User::create($request->all());

		return response()->json($user);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
		//$logu = LoguModel::find($id);

		//return view('logu_show')->with('item',$logu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user_edit')->with('item',$user);
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
		
        $user = User::find($id);

		$user->name = $request->name;		
		$user->email = $request->email;
		
		if ($request->has('editor'))
		{
			$user->assignRole('editor');
		}
			else {
			$user->removeRole('editor');
			
		}
		
		$user->save();

		return response()->json($user);
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
			$logu = User::destroy($id);
			return response()->json($logu);

		} catch ( \Illuminate\Database\QueryException $e) {
			if ($e->errorInfo[1]==1451)
				return response('Errore' ,500);
			else 
			return response()->json($e->errirInfo ,500);
		}
	
    }
   
	public function search()
    {		
		$rules="{}";
		
		if (session()->has('us_rules')) $rules=session('us_rules');
		
		return view('user_search',['rules'=>$rules]);
	}
   
  
}
