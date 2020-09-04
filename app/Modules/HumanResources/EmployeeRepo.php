<?php 

namespace App\Modules\HumanResources;

use App\Modules\Base\BaseRepo;
use App\Modules\HumanResources\Employee;
use App\Modules\Finances\Company;

class EmployeeRepo extends BaseRepo{

	public function getModel(){
		return new Employee;
	}

	public function index($filter = false, $search = false)
	{
		$current_company = \Auth::user()->employee->company_id;
		$ids=Company::where('provider_id', $current_company)->orWhere('id', $current_company)->pluck('id')->toArray();
		//dd($ids);
		if ($filter and $search) {
			if ($current_company == 1 or $current_company == 0) { // Si es un usuario administrador de todo el sistema
				return $this->model->$filter($search)->orderBy("$filter", 'ASC')->paginate();
			} else { // Otro caso
				return $this->model->$filter($search)->whereIn('company_id', $ids)->orderBy("$filter", 'ASC')->paginate();
			}
			
			//return $this->model->$filter($search)->where('company_id',10)->orderBy("$filter", 'ASC')->paginate();
		} else {
			if ($current_company == 1 or $current_company == 0) { // Si es un usuario administrador de todo el sistema
				return $this->model->orderBy("id", 'DESC')->paginate();
			} else { // Otro caso
				return $this->model->whereIn('company_id', $ids)->orderBy('id', 'DESC')->paginate();
			}
			//return $this->model->where('company_id',10)->orderBy('id', 'DESC')->paginate();
		}
	}
	public function autocomplete($term)
	{
		return Employee::where('full_name','like',"%$term%")->get();
	}
	public function autocompleteSeller($term)
	{
		return Employee::where("job_id","2")->where('full_name','like',"%$term%")->get();
	}
	public function save($data, $id=0)
	{
		$model = parent::save($data, $id);
		if (isset($data['signature'])) {
			$this->saveFile('img', $data['signature']);
		}

		return $model;
	}
	public function prepareData($data)
	{
		$data['full_name'] = $data['paternal_surname'].' '.$data['maternal_surname'].' '.$data['name'];
		$data = $this->prepareDataImage($data, ['signature']);
		
		return $data;
	}
	public function getListPainters($warehouse_id=0)
	{
		if (\Auth::user()->employee->job_id==3) {
			$r = [\Auth::user()->employee->id => \Auth::user()->employee->full_name];
		} else {
			$r = Employee::where('job_id', 3)->whereHas('warehouses', function($q) use ($warehouse_id){$q->where('warehouse_id', $warehouse_id);})->pluck('full_name', 'id')->toArray();
		}
		if (count($r)==1) {
			return $r;
		} else {
			return [""=>"Seleccionar"] + $r;
		}
		
		
	}
	public function getListTints($warehouse_id=0)
	{
		if (\Auth::user()->employee->job_id==2) {
			return [\Auth::user()->employee->id => \Auth::user()->employee->full_name];
		} elseif ($warehouse_id==0) {
			return [""=>"Seleccionar"];
		} else {
			return [""=>"Seleccionar"] + Employee::where('job_id', 2)->whereHas('warehouses', function($q) use ($warehouse_id){$q->where('warehouse_id', $warehouse_id);})->pluck('full_name', 'id')->toArray();
		}
		
	}
	public function getListByJobWarehouse($job_id, $warehouse_id=0)
	{
		if (\Auth::user()->employee->job_id==$job_id) {
			$r = [\Auth::user()->employee->id => \Auth::user()->employee->full_name];
		} else {
			$r = Employee::where('job_id', $job_id)->whereHas('warehouses', function($q) use ($warehouse_id){$q->where('warehouse_id', $warehouse_id);})->pluck('full_name', 'id')->toArray();
		}
		if (count($r)==1) {
			return $r;
		} else {
			return [""=>"Seleccionar"] + $r;
		}
		
		
	}
	public function getByWarehouse($warehouse_id)
	{
		return Employee::select('id', 'full_name', 'job_id')->whereHas('warehouses', function($q) use ($warehouse_id){$q->where('warehouse_id', $warehouse_id);})->get();
	}
	//public function toWarehouses($company_id)
	public function toWarehouses($company_id, $provider_id)
	{
		//dd($company_id);
		//return Employee::where(function($query) use ($company_id) {$query->where('job_id', '3')->where('company_id', $company_id);})->get();
		//return Employee::where('job_id','!=',3)->orWhere(function($query) use ($company_id) {$query->where('job_id', '3')->where('company_id', $company_id);})->get();
		return Employee::where('company_id', $company_id)->orWhere('company_id', $provider_id)->get();
	}
}