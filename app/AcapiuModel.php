<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcapiuModel extends BaseModel
{
	protected $table = 'acapius';
	protected $fillable = ['de_id','a_id','tipo','descrizione'];
	protected static $tipi_it = array( 
	//0=>'Conforme a',
	2=>'ha formato',
	3=>'ha parte',
	4=>'ha versione',
	5=>'è formato di',
	6=>'è parte di',
	7=>'è riferito da',
	8=>'è sostituito da',
	9=>'è richiesto da',
	10=>'è versione di',
	11=>'si riferisce a',
	12=>'sostituisce',
	13=>'richiede',
	14=>'ha fonte',
	15=>'ha relazione con'		
	);
	protected static $tipi_inv =array(
	2=>5,
	3=>6,
	4=>10,
	5=>2,
	6=>3,
	7=>11,
	8=>12,
	9=>13,
	10=>4,
	11=>7,
	12=>8,
	13=>9,
	14=>0,
	15=>15
	);
 
    public function DocumentuA()
    {
        return $this->belongsTo('App\DocumentuModel','a_id');
    }
    
     public function DocumentuDe()
    {
        return $this->belongsTo('App\DocumentuModel','de_id');
    }
     public static function getTipiIt()
    {
        return (AcapiuModel::$tipi_it);
    }
    public static function getTipoInv($num)
    {
        return (AcapiuModel::$tipi_inv[$num]);
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
