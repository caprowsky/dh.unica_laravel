<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventuModel extends BaseModel
{
    protected $table = 'eventus';
	protected $fillable = ['nome', 'inizio','fine','descrizione','luogo_id','foto_url','luogo_note','aggregatore_id'];
	
	public function luogo()
    {
        return $this->belongsTo('App\LoguModel');
    }
    public function aggregatore()
    {
        return $this->belongsTo('App\AcorradoriModel');
    }
    public function documentus()
    {
		return $this->hasMany('App\DocumentuModel', 'evento_id');
	}
	public function esecudoris()
    {
		return $this->belongsToMany('App\EsecudoriModel', 'partecipant', 'evento_id','esecutore_id');
	}
	public function partecipantis()
	{
		return $this->hasMany('App\PartecipatModel', 'evento_id');
	}
	
	public static function getJoints()
	{
		return array(/*
				'ruolo' => array(
					'from_table'      => 'eventus',
					'from_col'        => 'id',
					'to_table'        => 'partecipantis',
					'to_col' => 'evento_id',
					'to_value_column'		=>'ruolo'
				),*/
				'partecipantis' => array(					//Partecipanti subquery
					'from_table'      => 'eventus',
					'from_col'        => 'id',
					'to_table'        => 'partecipantis',
					'to_col' => 'evento_id',
					'to_value_column'		=>'partecipant.id'
				)
				);
	}
}
