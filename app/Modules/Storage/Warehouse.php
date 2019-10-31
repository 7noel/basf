<?php namespace App\Modules\Storage;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model implements Auditable {

	use \OwenIt\Auditing\Auditable;
	use SoftDeletes;

	protected $fillable = ['company_id', 'provider_id', 'name', 'address', 'ubigeo_id', 'country_id', 'phone', 'mobile', 'email', 'contact', 'comment'];


	public function company()
	{
		return $this->belongsTo('App\Modules\Finances\Company');
	}
	public function provider()
	{
		return $this->belongsTo('App\Modules\Finances\Company', 'provider_id');
	}
	public function country()
	{
		return $this->belongsTo('App\Modules\Base\SunatTable','id','country_id');
	}
    public function ubigeo()
	{
		return $this->hasOne('App\Modules\Base\Ubigeo','id','ubigeo_id');
	}
	public function stocks()
	{
		return $this->hasMany('App\Modules\Storage\Stock');
	}
	public function employees()
	{
		return $this->belongsToMany('App\Modules\HumanResources\Employee');
	}

	public function scopeName($query, $name){
		if (trim($name) != "") {
			$query->where('name', 'LIKE', "%$name%");
		}
	}
}