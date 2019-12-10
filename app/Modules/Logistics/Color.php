<?php namespace App\Modules\Logistics;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Color extends Model {

	use SoftDeletes;

	protected $fillable = ['description', 'brand_id', 'code', 'other_code', 'modelos', 'is_tricapa', 'has_brillo_directo'];


	public function scopeName($query, $name){
		if (trim($name) != "") {
			$query->where('description', 'LIKE', "%$name%");
		}
	}
	
	public function brand()
	{
		return $this->belongsto('App\Modules\Logistics\Brand');
	}

}
