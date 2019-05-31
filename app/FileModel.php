<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FileModel extends BaseModel
{
	protected $table = 'files';
	protected $fillable = ['file_id', 'filename','documento_id','local','size','created_id'];
 
    public function documentu()
    {
        return $this->belongsTo('App\Documentus');
    }
}
