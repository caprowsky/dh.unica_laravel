<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcapiuEsecModel extends BaseModel
{
	protected $table = 'acapius_esec';
	protected $fillable = ['de_id','a_id','tipo','descrizione'];
	protected static $tipi_it = array( 
	0=>'Indefinita',
	1=>'Fa parte di',
	2=>"E\' composto da"
		
	);
	protected static $tipi_inv =array(
	0=>0,
	1=>2,
	2=>1
	);
 
    public function EsecudoriA()
    {
        return $this->belongsTo('App\EsecudoriModel','a_id');
    }
    
     public function EsecudoriDe()
    {
        return $this->belongsTo('App\EsecudoriModel','de_id');
    }
     public static function getTipiIt()
    {
        return (AcapiuEsecModel::$tipi_it);
    }
    public static function getTipoInv($num)
    {
        return (AcapiuEsecModel::$tipi_inv[$num]);
    }
    public static function getJoints()
	{
		return array(
				'esecudori' => array(
					'from_table'      => 'acapius_esec',
					'from_col'        => 'id',
					'to_table'        => 'EsecudoriDe',
					//'to_col' => 'a_id',
					'to_value_column'		=>'id'
				),/*
				'esecudoriDe' => array(
					'from_table'      => 'acapius_esec',
					'from_col'        => 'id',
					'to_table'        => 'EsecudoriDe',
					//'to_col' => 'de_id',
					'to_value_column'		=>'id'
				)*/
			);
		}
}
/*
 * 
    conformsTo
    hasFormat (ad esempio, nel caso vi sia anche una documentazione video)
    hasPart (il documento-madre avrà link a tutti I documenti-figli con questa relazione)
    hasVersion (nel caso in cui ci siano altri documenti – regostrazioni – riferite alla stessa gara)
    isFormatOf (ad esempio, nel caso vi sia anche una documentazione video)
    isPartOf (il documento-figlio avrà il link al document madre)
    isReferencedBy (il file audio è referenziato da un documento relativo a un libureddu)
    isReplacedBy (usare nel caso si trovi una registrazione palesemente migliore)
    isRequiredBy
    isVersionOf (da usare solo nel caso vi sia una registrazione che possiamo considerare migliore, primaria, e questa una sua  “versioni” alternative – altrimenti usare hasVersion)
    references (ad esempio, un libureddu avrà una relazione references con il file audio e video della stessa gara)
    replaces (usare nel caso rimpiazzi una registrazione palesemente peggiore)
    requires
    source (il documento-madre indica come “source”, con stringa letterale, il support, ad esempio FPZ001A-23)
    relation (o altro): in questo caso la relazione è generica e viene esplicitata verbalmente.

*/
