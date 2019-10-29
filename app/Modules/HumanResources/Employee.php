<?php namespace App\Modules\HumanResources;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model implements Auditable {

	use \OwenIt\Auditing\Auditable;
	use SoftDeletes;

	protected $fillable = ['name', 'paternal_surname', 'maternal_surname', 'full_name', 'id_type_id', 'doc', 'job_id', 'gender', 'address', 'ubigeo_id', 'phone_personal', 'mobile_personal', 'phone_company', 'mobile_company', 'email_personal', 'email_company', 'user_id', 'signature', 'other_id', 'company_id'];

	// public function warehouse()
	// {
	// 	return $this->belongsTo('App\Modules\Storage\Warehouse');
	// }
	public function warehouses()
	{
		return $this->belongsToMany('App\Modules\Storage\Warehouse');
	}

	public function id_type()
	{
		return $this->belongsTo('App\Modules\Base\IdType');
	}
	public function job()
	{
		return $this->belongsTo('App\Modules\HumanResources\Job');
	}
	public function company()
	{
		return $this->belongsTo('App\Modules\Finances\Company');
	}
	public function ubigeo()
	{
		return $this->belongsTo('App\Modules\Base\Ubigeo');
	}
	public function user()
	{
		return $this->belongsTo('App\Modules\Security\User');
	}
	public function scopeName($query, $name){
		if (trim($name) != "") {
			$query->where('full_name', 'LIKE', "%$name%");
		}
	}
}
