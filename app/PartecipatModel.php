<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PartecipatModel extends Model
{
    protected $table = 'partecipant';
	protected $fillable = ['ruolo','descrizione','evento_id','esecutore_id'];
	
	public function evento()
    {
        return $this->belongsTo('App\EventuModel');
    }
    public function esecutore()
    {
        return $this->belongsTo('App\EsecudoriModel');
    }
}
