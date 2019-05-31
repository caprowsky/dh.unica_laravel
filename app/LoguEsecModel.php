<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoguEsecModel extends Model
{
    protected $table = 'logus_esec';
	protected $fillable = ['luogo_id','esecutore_id','descrizione'];
	
	public function luogo()
    {
        return $this->belongsTo('App\LoguModel');
    }
    public function esecutore()
    {
        return $this->belongsTo('App\EsecudoriModel');
    }
}
