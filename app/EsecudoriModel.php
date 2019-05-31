<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EsecudoriModel extends BaseModel
{
    protected $table = 'esecudoris';
	protected $fillable = ['nome','cognome','sesso','alias','tipo','nascita','datan_note','morte','datam_note','descrizione','foto_url'];
	protected static $tipi=['Singolo','Collettivo'];
	protected static $sex=['M','F','U'];
	
	
    public function luoghi()
    {
        return $this->belongsToMany('App\LoguModel', 'logus_esec', 'esecutore_id', 'luogo_id');
    }
    public function logusEsec()
	{
		return $this->hasMany('App\LoguEsecModel', 'esecutore_id');
	}
    public function eventus()
    {
		return $this->belongsToMany('App\EventuModel', 'partecipant', 'esecutore_id', 'evento_id');
	}
	public function partecipant()
	{
		return $this->hasMany('App\PartecipatModel', 'esecutore_id');
	}
	public function tiers()
	{
		return $this->hasMany('App\TierModel', 'esecutore_id');
	}
	public function acapius()
	{
		return $this->hasMany('App\AcapiuEsecModel', 'a_id');
	}
	public function acapiaus()
	{
		return $this->hasMany('App\AcapiuEsecModel', 'de_id');
	}
	public function documentus()
    {
		return $this->belongsToMany('App\DocumentuModel', 'esec_documentu', 'esecutore_id', 'documento_id');
	}
	
	public static function getTipi()
    {
        return (EsecudoriModel::$tipi);
    }
    public static function getSex()
    {
        return (EsecudoriModel::$sex);
    }
    public function esec_documentu()
	{
		return $this->hasMany('App\EsecDocumentuModel', 'esecutore_id');
	}
    
	public static function getJoints()
	{
		return array(/*
				'ruolo_ev' => array(
					'from_table'      => 'esecudoris',
					'from_col'        => 'id',
					'to_table'        => 'partecipant',
					//'to_col' => 'esecutore_id',
					'to_value_column'		=>'ruolo'
				),*/
				'evento' => array(
					'from_table'      => 'esecudoris',
					'from_col'        => 'id',
					'to_table'        => 'partecipant',
					//'to_col' => 'esecutore_id',
					'to_value_column'		=>'partecipant.id'
				),
				'acapius' => array(
					'from_table'      => 'esecudoris',
					'from_col'        => 'id',
					'to_table'        => 'acapius',
					//'to_col' => 'a_id',
					'to_value_column'		=>'acapius_esec.id'
				),/*
				'acapiu' => array(
					'from_table'      => 'esecudoris',
					'from_col'        => 'id',
					'to_table'        => 'acapius',
					//'to_col' => 'a_id',
					'to_value_column'		=>'de_id'
				),
				'acapiau' => array(
					'from_table'      => 'esecudoris',
					'from_col'        => 'id',
					'to_table'        => 'acapiaus',
					//'to_col' => 'de_id',
					'to_value_column'		=>'a_id'
				),
				'relazione_desc' => array(
					'from_table'      => 'esecudoris',
					'from_col'        => 'id',
					'to_table'        => 'acapius',
					//'to_col' => 'a_id',
					'to_value_column'		=>'descrizione'
				),
				'relazione_tipo' => array(
					'from_table'      => 'esecudoris',
					'from_col'        => 'esecudoris.id',
					'to_table'        => 'acapiaus',
					//'to_col' => 'de_id',
					'to_value_column'	=>'acapius_esec.tipo'
				),*/
				
				'logus' => array(
					'from_table'      => 'esecudoris',
					'from_col'        => 'id',
					'to_table'        => 'luoghi',
					//'to_col' => 'de_id',
					'to_value_column'		=>'luogo_id'
				),
				'logus_desc' => array(
					'from_table'      => 'esecudoris',
					'from_col'        => 'id',
					'to_table'        => 'luoghi',
					//'to_col' => 'a_id',
					'to_value_column'		=>'descrizione'
				),
				'ruolo_doc' => array(
					'from_table'      => 'esecudoris',
					'from_col'        => 'id',
					'to_table'        => 'esec_documentu',
					//'to_col' => 'esecutore_id',
					'to_value_column'		=>'ruolo'
				),
				
    );
	}
    
}

