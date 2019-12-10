<?php namespace App\Modules\Logistics;

use App\Modules\Base\BaseRepo;
use App\Modules\Logistics\Color;

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
}