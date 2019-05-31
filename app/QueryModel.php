<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QueryModel extends BaseModel
{
	protected $table = 'queries';
	protected $fillable = ['id', 'nome','descrizione','tipo','tabella','query','created_id'];
 
  public function user_created()
    {
        return $this->belongsTo('App\User','created_id');
    }
   
}
