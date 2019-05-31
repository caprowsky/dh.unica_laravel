<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColletzioniModel extends Model
{
    protected $table = 'colletzionis';
	protected $fillable = ['nome', 'data','descrizione','foto_url','luogo_id','luogo_note'];
	
	public function luogo()
    {
        return $this->belongsTo('App\LoguModel');
    }
    public function documentus()
    {
		return $this->hasMany('App\DocumentuModel', 'collezione_id');
	}
}
