<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TierModel extends BaseModel
{
	protected $table = 'tiers';
	protected $fillable = ['id', 'nome','descrizione','documento_id','inizio','fine','esecutore_id','created_id','updated_id'];
 
    public function documentu()
    {
        return $this->belongsTo('App\DocumentuModel','documento_id');
    }
    public function intervals()
	{
		return $this->hasMany('App\IntervalModel','tier_id');
	}
	public function user_created()
    {
        return $this->belongsTo('App\User','created_id');
    }
    public function esecudori()
    {
        return $this->belongsTo('App\EsecudoriModel','esecutore_id');
    }
    public function user_updated()
    {
        return $this->belongsTo('App\User','updated_id');
    }    
	  public static function getJoints()
	{
		return array(
				'annotazione' => array(
					'from_table'      => 'tiers',
					'from_col'        => 'id',
					'to_table'        => 'intervals',
					'to_col' => 'tiers_id',
					'to_value_column'		=>'id'
				)
				);
	}
}
