<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

use Storage;
use Session;

use Illuminate\Support\Facades\Auth;

use App\DocumentuModel;

use App\ColletzioniModel;
use App\EventuModel;

use DB;
use App\FileModel;
use App\TierModel;
use App\IntervalModel;

use falahati\PHPMP3\MpegAudio;

use timgws\QueryBuilderParser;

class ResourceController extends Controller
{
  
  
  public function __construct()
		{
			$this->middleware('auth');
		}
		
	
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$id)
    {	
		 $item = DocumentuModel::find($id);
		
		if ($request->ajax()) {
			return view('documentu_resources_rows',compact('item'));
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
    public function show($id)
    {
		
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
		
    }
    
    //
    //
    //
     public function playSubTrack($id,$sub)	
	{
		$item = DocumentuModel::find($id);	
		$dat=$item->getTrackFile($sub);
		
		$url=$dat->local;
			
		
		$i=$item->inizio;
		$l=$item->fine-$i;
		
		if ($url!=null) {
			if ($l==null) {	
				return response()->file("../storage/app/".$url);
			} else {
				MpegAudio::fromFile("../storage/app/".$url)->trim($i, $l)->saveFile("../storage/app/".Session::getId()."td.mp3");			
				return response()->file("../storage/app/".Session::getId()."td.mp3")->deleteFileAfterSend(true);
			}
		} else {	
			return response()->json("Nessuna risorsa associata",403);
		}
		
		
	}
    public function play($id)	
	{
		$item = DocumentuModel::find($id);
		$url=$item->getResourceUrl();
		
		$i=$item->inizio;
		$l=$item->fine-$i;
		
		if ($url!=null) {
			if ($l==null) {	
				return response()->file("../storage/app/".$url);
			} else {
				MpegAudio::fromFile("../storage/app/".$url)->trim($i, $l)->saveFile("../storage/app/".Session::getId()."td.mp3");			
				return response()->file("../storage/app/".Session::getId()."td.mp3")->deleteFileAfterSend(true);
			}
		} else {	
			return response()->json("Nessuna risorsa associata",403);
		}
		
		
	}
	public function view($id)	
	{
		$item = DocumentuModel::find($id);
		
		$url=$item->getFirstResourceUrl();

		
		if ($url!=null) {
			return response()->file("../storage/app/".$url);
			} else {	
			return response()->json("Nessuna risorsa associata",403);
		}
		
		
	}
	
	public function json($id)	
	{
		$item = DocumentuModel::find($id);
		
		$url=$item->JSONfiles[0]->local;
				
		if ($url!=null) {
			
			return response()->file("../storage/app/".$url);
			
		} else {	
			return response()->json("Nessun json associato",403);
		}
		
		
	}
	
	 public function downloadFile($id)	
	{
		$file = FileModel::find($id);		
		if ($file!=null) {
			return response()->download("../storage/app/".$file->local,$file->filename);	
		} else {	
			return response()->json("Errore",403);
		}
		
	}
	
	 public function downloadFoto($name)	
	{
				
		if ($name!=null) {
			
				return response()->file("../storage/app/foto/".$name);	
		} else {	
			return response()->json("Nessuna risorsa associata",403);
		}
		
	}
	
	public function uploadFoto(Request $request)
	{
		
		$filename = $request->dfile->storeAs('foto','foto'.Session::getId());
		 return response()->json(array('file' => $filename), 200);
	}
	
	
   
    
	public function deleteSubmit(Request $request,$id)	
	{
		
		$file=FileModel::find($id);
		if ($file->created_id==Auth::id()){			
				Storage::delete($file->local);
				FileModel::destroy($id);
				return response()->json(array('removed' => $id), 200);
			}
		else {
			return response()->json("Utente non autorizzato", 401);
		}
	}
	
	public function uploadSubmit(Request $request)
	{
   
	$files = [];
	
    foreach ($request->dfiles as $filex) {
		$filename = $filex->store('documentus');
		
		$file_object = new \stdClass();       
        $file_object->name = str_replace('documentus/', '',$filex->getClientOriginalName());
       	$file_object->size = round(Storage::size($filename) / 1024, 2);
       	
        $doc_file = FileModel::create([
            'local' => $filename,'filename'=>$file_object->name,'documento_id'=>$request->doc_id,'created_id' => Auth::id(),
            'size'=>$file_object->size
        ]);
 
        
        $file_object->fileID = $doc_file->id;
        $file_object->docID = $doc_file->documento_id;
        $files[] = $file_object;
    }
 
    return response()->json(array('files' => $files), 200);
	}
	
	
	public function resources(Request $request,$id)
	{
		if ($request->filled('order')) {
			$by=$request->order;
			$dir=$request->dir;
			
		} else {
			$by='id';
			$dir='asc';
		}
		
		$documentu = DocumentuModel::find($id);
		$tiers=TierModel::where('documento_id', $id)->orderBy($by, $dir)->paginate(15);
	
		if (($request->has('page'))&&($request->ajax())) {
			return view('tier_rows',['items'=>$tiers,'nolink'=>'true']);
		} 
		elseif ($request->ajax())
		{					
			return view('documentu_data',['item'=>$documentu,'tiers'=>$tiers]);
		}
		
	}
	
	
}
