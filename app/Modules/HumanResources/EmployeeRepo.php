<?php 

namespace App\Modules\HumanResources;

use App\Modules\Base\BaseRepo;
use App\Modules\HumanResources\Employee;

class EmployeeRepo extends BaseRepo{

	public function getModel(){
		return new Employee;
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
			return [\Auth::user()->employee->id => \Auth::user()->employee->full_name];
		} elseif ($warehouse_id==0) {
			return [""=>"Seleccionar"];
		} else {
			return [""=>"Seleccionar"] + Employee::where('job_id', 3)->whereHas('warehouses', function($q) use ($warehouse_id){$q->where('warehouse_id', $warehouse_id);})->pluck('full_name', 'id')->toArray();
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
	public function toWarehouses($company_id)
	{
		//dd($company_id);
		//return Employee::where(function($query) use ($company_id) {$query->where('job_id', '3')->where('company_id', $company_id);})->get();
		return Employee::where('job_id','!=',3)->orWhere(function($query) use ($company_id) {$query->where('job_id', '3')->where('company_id', $company_id);})->get();
	}
}