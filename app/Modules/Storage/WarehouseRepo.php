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
	public function getMySedes($value='')
	{
		$current_company = \Auth::user()->employee->company_id;
		$my_ws = \Auth::user()->employee->warehouses;
		$ids=Warehouse::where('provider_id', $current_company)->orWhere('company_id', $current_company)->pluck('id')->toArray();
		$ws = (\Auth::user()->is_superuser) ? Warehouse::with('company')->get() : \Auth::user()->employee->warehouses;
		// $ws = (\Auth::user()->is_superuser) ? Warehouse::with('company')->get() : \Auth::user()->employee->warehouses;
		if (\Auth::user()->is_superuser) {
			$ws = Warehouse::with('company')->get();
		} elseif ($my_ws->isNotEmpty()) {
			$ws = $my_ws;
		} else {
			$ws=Warehouse::where('provider_id', $current_company)->orWhere('company_id', $current_company)->get();
		}
		return $ws;
	}
	public function getSedesByClient($company_id)
	{
		if ($company_id == '') {
			return ['' => 'Seleccionar'];
		}
		$ws = $this->getMySedes()->where('company_id', $company_id);
		//$ws = Warehouse::where('client_id', $client_id)->get();
		if (\Request::ajax()) {
			return $ws;
		}
		if ($ws->count() == 1) {
			return $ws->pluck('name', 'id')->toArray();
		}
		return ['' => 'Seleccionar'] + $ws->pluck('name', 'id')->toArray();
	}
	public function getList($name='name', $id='id')
	{
		$ws = $this->getMySedes();
		//dd($ws[0]);
		$r = [];
		if (null == session('sede')) {
            $c = new Warehouse;
            session(['sede' => $ws[0]]);
        }
        //dd(session('sede'));
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