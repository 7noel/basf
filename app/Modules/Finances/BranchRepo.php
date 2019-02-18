<?php 

namespace App\Modules\Finances;

use App\Modules\Base\BaseRepo;
use App\Modules\Finances\Branch;

class BranchRepo extends BaseRepo{

	public function getModel(){
		return new Branch;
	}
	public function prepareData($data)
	{
		$data['name'] = trim($data['name']);
		return $data;
	}
	public function getListByCompany($company_id)
	{
		return [""=>"Seleccionar"] + Branch::where('company_id', $company_id)->pluck('name', 'id')->toArray();
	}
	
	public function getListGroup($group = 'company', $name='name', $id='id')
	{
		foreach (Branch::with('company.provider')->get() as $key => $u) {
			$r[$u->company->provider->company_name][$u->$id] = $u->company->company_name.' | '.$u->$name;
		}
		if (isset($r)) {
			return [''=>'Seleccionar'] + $r;
		} else {
			return [''=>'Seleccionar'];
		}
		
	}
}