<?php 

namespace App\Modules\Finances;

use App\Modules\Base\BaseRepo;
use App\Modules\Finances\Company;
use App\Modules\Storage\WarehouseRepo;

class CompanyRepo extends BaseRepo{

	public function getModel(){
		return new Company;
	}

	public function index($filter = false, $search = false)
	{
		$current_company = \Auth::user()->employee->company_id;
		$ids=Company::where('provider_id', $current_company)->orWhere('id', $current_company)->pluck('id')->toArray();
		if ($filter and $search) {
			if ($current_company == 1 or $current_company == 0) { // Si es un usuario administrador de todo el sistema
				return Company::where($this->getType(), 1)->$filter($search)->orderBy("$filter", 'ASC')->paginate();
			} else {
				return Company::whereIn('id', $ids)->where($this->getType(), 1)->$filter($search)->orderBy("$filter", 'ASC')->paginate();
			}
			
			//return Company::where($this->getType(), 1)->$filter($search)->where('provider_id',10)->orderBy("$filter", 'ASC')->paginate();
		} else {
			if ($current_company == 1 or $current_company == 0) { // Si es un usuario administrador de todo el sistema
				return Company::where($this->getType(), 1)->orderBy('id', 'DESC')->paginate();
			} else {
				return Company::whereIn('id', $ids)->where($this->getType(), 1)->orderBy('id', 'DESC')->paginate();
			}
			return Company::where($this->getType(), 1)->orderBy('id', 'DESC')->paginate();
			//return Company::where($this->getType(), 1)->where('provider_id',10)->orderBy('id', 'DESC')->paginate();
		}
	}
	public function autocomplete($term)
	{
		return Company::where('company_name','like',"%$term%")->orWhere('doc','like',"%$term%")->with('id_type', 'provider')->get();
	}
	public function prepareData($data)
	{
		$data['company_name'] = trim($data['company_name']);
		$data['brand_name'] = trim($data['brand_name']);
		$data['paternal_surname'] = trim($data['paternal_surname']);
		$data['maternal_surname'] = trim($data['maternal_surname']);
		if($data['id_type_id'] != 1 and $data['id_type_id'] != 6){
			$data['company_name'] = $data['paternal_surname'].' '.$data['maternal_surname'].' '.$data['name'];
		}
		if ( $this->getType() ) {
			$data[$this->getType()] = 1;
		}
		// if(!isset($data['is_my_company'])){
		// 	$data['is_my_company'] = false;
		// }
		if (isset($data['country_id']) and $data['country_id'] != 1465) {
			$data['ubigeo_id'] = 1868;
		}
		return $data;
	}

	public function save($data, $id=0)
	{
		$data = $this->prepareData($data);
		$model = parent::save($data, $id);

		if (isset($data['warehouses'])) {
			$warehouseRepo= new WarehouseRepo;
			$warehouseRepo->saveMany($data['warehouses'], ['key'=>'company_id', 'value'=>$model->id]);
		}


		if (!isset($data['brands'])) {
			$data['brands'] = [];
		}
		$model->brands()->sync($data['brands']);

		return $model;
	}

	public function getListMyCompany()
	{
		return [""=>"Seleccionar"] + Company::where('is_my_company','1')->pluck('company_name', 'id')->toArray();
	}
	public function getOtherCompanies($id=1)
	{
		return Company::where('is_my_company','1')->where('id', '!=', $id)->get();
	}
	public function getType()
	{
		$a = explode('.', \Request::route()->getName())[0];
		$array = array('clients' => 'is_client', 'providers' => 'is_provider', 'shippers' => 'is_shipper', 'companies' => 'is_my_company');
		if (isset($array[$a])) {
			return $array[$a];
		} else {
			return false;
		}
	}
	public function getProviders()
	{
		return ['' => 'Seleccionar'] + Company::where('is_provider','1')->pluck('company_name', 'id')->toArray();
	}

	public function getListClientsBySedes($ws)
	{
		return ['' => 'Seleccionar'] + Company::where('is_client', '1')->whereIn('id', $ws->pluck('company_id'))->pluck('company_name', 'id')->toArray();
	}
}
