<?php namespace App\Modules\Logistics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Modelo extends Model {

	use SoftDeletes;

	protected $fillable = ['name', 'description', 'brand_id'];

	public function scopeName($query, $name){
		if (trim($name) != "") {
			$query->where('name', 'LIKE', "%$name%");
		}
	}
	
	public function brand()
	{
		return $this->belongsto('App\Modules\Logistics\Brand');
	}

}
