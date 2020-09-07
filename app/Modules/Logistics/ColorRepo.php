<?php namespace App\Modules\Logistics;

use App\Modules\Base\BaseRepo;
use App\Modules\Logistics\Color;
use App\Modules\Logistics\Modelo;

class ColorRepo extends BaseRepo{

	public function getModel(){
		return new Color;
	}
	public function index($filter = false, $search = false)
	{
		if ($filter and $search) {
			return Color::$filter($search)->with('brand')->orderBy("$filter", 'ASC')->paginate();
		} else {
			return Color::with('brand')->orderBy('id', 'DESC')->paginate();
		}
	}
	public function colorsByModelo($modelo_id)
	{
		$modelo = Modelo::find($modelo_id);
		if (\Request::ajax()) {
			return Color::select('code')->where('brand_id' ,$modelo->brand_id)->orderBY('code', 'ASC')->get();
		}
		return ['' => 'Seleccionar']+Color::select('code')->where('brand_id' ,$modelo->brand_id)->orderBY('code', 'ASC')->pluck('code', 'code')->toArray();
	}
}