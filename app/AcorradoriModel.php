<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcorradoriModel extends Model
{
    protected $table = 'acorradoris';
	protected $fillable = ['nome', 'data','data_note','descrizione','foto_url','luogo_id','luogo_note'];
	
	public function luogo()
    {
        return $this->belongsTo('App\LoguModel');
    }
    public function eventus()
    {
		return $this->hasMany('App\EventuModel','aggregatore_id');
	}
}
