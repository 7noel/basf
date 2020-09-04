<?php 

namespace App\Modules\Storage;

use App\Modules\Base\BaseRepo;
use App\Modules\Storage\Warehouse;
use App\Modules\Finances\Company;

class WarehouseRepo extends BaseRepo{

	public function getModel(){
		return new Warehouse;
	}
	public function save($data, $id=0)
	{
		$model = parent::save($data,$id);
		if (!isset($data['employees'])) {
			$data['employees'] = [];
		}
		$model->employees()->sync($data['employees']);
		
		return $model;
	}
	public function index($filter = false, $search = false)
	{
		$current_company = \Auth::user()->employee->company_id;
		$ids = Company::where('provider_id', $current_company)->orWhere('id', $current_company)->pluck('id')->toArray();
		if ($filter and $search) {
			if ($current_company == 1 or $current_company == 0) { // Si es un usuario administrador de todo el sistema
				return Warehouse::$filter($search)->with('ubigeo')->orderBy("$filter", 'ASC')->paginate();
			} else {
				return Warehouse::$filter($search)->whereIn('company_id', $ids)->with('ubigeo')->orderBy("$filter", 'ASC')->paginate();
			}
			
		} else {
			if ($current_company == 1 or $current_company == 0) { // Si es un usuario administrador de todo el sistema
				return Warehouse::with('ubigeo')->orderBy('id', 'DESC')->paginate();
			} else {
				return Warehouse::with('ubigeo')->whereIn('company_id', $ids)->orderBy('id', 'DESC')->paginate();
			}
			
		}
	}
	public function ajaxList()
	{
		$ajax = Warehouse::select('id','name')->get();
		return $ajax;
	}
	public function getList($name='name', $id='id')
	{
		$ws = (\Auth::user()->is_superuser) ? Warehouse::with('company')->get() : \Auth::user()->employee->warehouses;
		$r = [];
		if (null == session('sede')) {
            $c = new Warehouse;
            session(['sede' => $ws[0]]);
        }
        //dd(session('sede')->id);
		foreach ($ws as $key => $u) {
			$r[$u->company->company_name][$u->$id] = $u->$name;
		}
		if (count($ws)==1) {
			return $r;
		}
		return [''=>'Seleccionar'] + $r;		
	}
	
	public function getListGroup2($group = 'company', $name='name', $id='id')
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
	public function getDistribuidorAjax($id)
	{
		return \Response::json(Warehouse::find($id));
	}
}