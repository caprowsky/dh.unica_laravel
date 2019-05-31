<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocumentuModel extends Model
{
    protected $table = 'documentus';
	protected $fillable = ['titolo','titolo_alt', 'soggetto','descrizione','data','tipo','formato','identificatore','lingua','lingua_det','diritti','file','inizio','fine','collezione_id','evento_id','created_id','updated_id'];
	//protected $labels=['Titolo','Creatore','Soggetto','Descrizione','Editore','Contributore','Data','Tipo','Formato','Identificatore','Lingua','Lingua_det','Diritti','Collezione','Evento'];
	protected static $tipi = ['Non definito','Immagine','Video','Audio','Testo','Oggetto','Altro'];
	
	
	public function collezione()
    {
        return $this->belongsTo('App\ColletzioniModel');
    }
    
	
	public function creatori()
	{
		return $this->agenti()->where('ruolo','=','creatore');
	}
	public function editori()
	{
		return $this->agenti()->where('ruolo','=','editore');
	}
	public function contributori()
	{
		return $this->agenti()->where('ruolo','=','contributore');
	}
	public function autori()
	{
		return $this->agenti()->where('ruolo','=','autore');
	}
	public function altri()
	{
		return $this->agenti()->where(function($query)
            {
                $query->where('ruolo','=','non definito')->orWhere('ruolo','=','altro');
            });
	}
	
	public function agenti()
    {
		return $this->belongsToMany('App\EsecudoriModel', 'esec_documentu','documento_id','esecutore_id')->withPivot('id','descrizione','ruolo');
	}
	
	public function taggaus()
    {
			return $this->agenti()->where(function($query)
            {
                $query->where('esec_documentu.descrizione','LIKE','%tag[%,%]%');
            });
	}
	
    public function evento()
    {
        return $this->belongsTo('App\EventuModel');
    }
    
     public function user_created()
    {
        return $this->belongsTo('App\User','created_id');
    }
    
     public function user_updated()
    {
        return $this->belongsTo('App\User','updated_id');
    }
    
    public function files()
    {
		return $this->hasMany('App\FileModel', 'documento_id');
	}
	 
	public function JSONfiles()
    {
		return $this->hasMany('App\FileModel', 'documento_id')->where('filename','LIKE','%JSON');
	}
	
	public function tiers()
	{
		return $this->hasMany('App\TierModel', 'documento_id');
	}
	
	public function intervals()
	{   
		return $this->hasManyThrough('App\IntervalModel', 'App\TierModel','documento_id','tier_id','documento_id','tier_id');    
	}
	
	public function acapius()
	{
		return $this->hasMany('App\AcapiuModel', 'a_id');
	}
	public function acapiaus()
	{
		return $this->hasMany('App\AcapiuModel', 'de_id');
	}
	public function acapius_esec()
	{
		return $this->hasMany('App\EsecDocumentuModel', 'documento_id');
	}
    public static function getTipi()
    {
        return (DocumentuModel::$tipi);
    }
    public static function getJoints()
	{
		return array(
		
				'acapiu' => array(
					'from_table'      => 'documentus',
					'from_col'        => 'id',
					'to_table'        => 'acapius',
					'to_col' => 'a_id',
					'to_value_column'		=>'de_id'
				),
				'acapiau' => array(
					'from_table'      => 'documentus',
					'from_col'        => 'id',
					'to_table'        => 'acapiaus',
					'to_col' => 'de_id',
					'to_value_column'		=>'a_id'
				),
				'relazione_desc' => array(
					'from_table'      => 'documentus',
					'from_col'        => 'id',
					'to_table'        => 'acapius',
					'to_col' => 'a_id',
					'to_value_column'		=>'descrizione'
				),
				'relazione_tipo' => array(
					'from_table'      => 'documentus',
					'from_col'        => 'documentus.id',
					'to_table'        => 'acapiaus',
					'to_col' => 'de_id',
					'to_value_column'	=>'acapius.tipo'
				),
				'tier' => array(
					'from_table'      => 'documentus',
					'from_col'        => 'documentus.id',
					'to_table'        => 'tiers',
					'to_col' => 'tiers_id',
					'to_value_column'	=>'id'
				),
				'agenti' => array(
					'from_table'      => 'documentus',
					'from_col'        => 'id',
					'to_table'        => 'agenti',
					'to_col' => 'esecutore_id',
					'to_value_column'		=>'esec_documentu.id'
				)
				
				);

	
	}
	public function getResourceUrl()		//per files nel documento madre
	{					
		if ($this->getAudioFile) {
			return $this->getAudioFile->local;
		} else {
			foreach ($this->acapiaus as $acapiu)
				{
					if ($acapiu->tipo=6) {	//è parte di
						if ($acapiu->DocumentuA->getAudioFile) return $acapiu->DocumentuA->getAudioFile->local;
					}
				}
			return null;		
		}
	}
	public function getFirstResourceUrl()
	{
		return $this->files[0]->local;
	}
	
	public function getAudioFile()
	{
		return $this->hasOne('App\FileModel', 'documento_id')->where([['filename','like','%.mp3'],['filename','not like','_tn']]);
	}
	public function getTrackFiles()
	{
		return $this->files()->where('filename','like','%_tn%.mp3');
	}
	public function getTrackFile($track)
	{
		//return $this->files()->where('filename','like','%_tn'.$track.'.mp3');
		return $this->hasOne('App\FileModel', 'documento_id')->where('filename','like','%_tn'.$track.'.mp3')->first();
	}
 
}
