<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IntervalModel extends BaseModel
{
	protected $table = 'intervals';
	protected $fillable = ['id', 'seq','nota','tier_id','inizio','fine'];
 
    public function tier()
    {
        return $this->belongsTo('App\TierModel');
    }
        
    public $timestamps = false;
   	
}
