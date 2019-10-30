<?php namespace App\Modules\Logistics;

use App\Modules\Base\BaseRepo;
use App\Modules\Logistics\Modelo;

class ModeloRepo extends BaseRepo{

	public function getModel(){
		return new Modelo;
	}
	public function index($filter = false, $search = false)
	{
		if ($filter and $search) {
			return Modelo::$filter($search)->with('brand')->orderBy("$filter", 'ASC')->paginate();
		} else {
			return Modelo::with('brand')->orderBy('id', 'DESC')->paginate();
		}
	}
}