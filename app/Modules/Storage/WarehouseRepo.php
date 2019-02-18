<?php 

namespace App\Modules\Storage;

use App\Modules\Base\BaseRepo;
use App\Modules\Storage\Warehouse;

class WarehouseRepo extends BaseRepo{

	public function getModel(){
		return new Warehouse;
	}
	public function index($filter = false, $search = false)
	{
		if ($filter and $search) {
			return Warehouse::$filter($search)->with('ubigeo')->orderBy("$filter", 'ASC')->paginate();
		} else {
			return Warehouse::with('ubigeo')->orderBy('id', 'DESC')->paginate();
		}
	}
	public function ajaxList()
	{
		$ajax = Warehouse::select('id','name')->get();
		return $ajax;
	}
	public function getList($name='name', $id='id')
	{
		return $this->model->pluck($name, $id)->toArray();
	}
	
	public function getListGroup($group = 'company', $name='name', $id='id')
	{
		foreach (Warehouse::with('company.provider')->get() as $key => $u) {
			$r[$u->company->provider->company_name][$u->$id] = $u->company->company_name.' | '.$u->$name;
		}
		if (isset($r)) {
			return [''=>'Seleccionar'] + $r;
		} else {
			return [''=>'Seleccionar'];
		}
		
	}
}