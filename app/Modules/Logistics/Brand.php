<?php namespace App\Modules\Logistics;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Brand extends Model implements Auditable {

	use \OwenIt\Auditing\Auditable;
	use SoftDeletes;

	protected $fillable = ['name', 'description', 'is_car'];

	public function scopeName($query, $name){
		if (trim($name) != "") {
			$query->where('name', 'LIKE', "%$name%");
		}
	}
	
	public function modelos()
	{
		return $this->hasMany('App\Modules\Logistics\Modelo');
	}
	public function colors()
	{
		return $this->hasMany('App\Modules\Logistics\Color');
	}
	public function companies()
	{
		return $this->belongsToMany('App\Modules\Finances\Company');
	}
}
