<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoguModel extends BaseModel
{
	protected $table = 'logus';
	protected $fillable = ['nome', 'lat','lng','descrizione'];
	
	public function colletzionis()
    {
        return $this->hasMany('App\ColletzioniModel','luogo_id');
    }
    public function eventus()
    {
        return $this->hasMany('App\EventuModel','luogo_id');
    }
    public function esecudoris()
    {
		return $this->belongsToMany('App\EsecudoriModel', 'logus_esec', 'luogo_id','esecutore_id');
	}	
    public function acorradoris()
    {
        return $this->hasMany('App\AcorradoriModel','luogo_id');
    }
    public function documentus()
    {
        return $this->hasMany('App\DocumentuModel','luogo_id');
    }
}
