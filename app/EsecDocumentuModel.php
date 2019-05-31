<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EsecDocumentuModel extends Model
{
    protected $table = 'esec_documentu';
	protected $fillable = ['ruolo','documento_id','esecutore_id','descrizione'];
	protected static $tipi_ru = ['Non definito','Creatore','Contributore','Editore','Mediatore','Altro'];
	
	public function documento()
    {
        return $this->belongsTo('App\DocumentuModel');
    }
    public function esecutore()
    {
        return $this->belongsTo('App\EsecudoriModel');
    }
    public static function getTipi()
    {
        return (EsecDocumentuModel::$tipi_ru);
    }
}
