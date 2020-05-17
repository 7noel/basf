<?php namespace App\Modules\Logistics;

use App\Modules\Base\BaseRepo;
use App\Modules\Logistics\Brand;
use App\Modules\Logistics\ModeloRepo;
use App\Modules\Logistics\ColorRepo;

class BrandRepo extends BaseRepo{

	public function getModel(){
		return new Brand;
	}

	public function prepareData($data)
	{
		// dd($data);
		if (!isset($data['is_car'])) {
			$data['is_car'] = false;
		}
		if (isset($data['colors'])) {
			foreach ($data['colors'] as $key => $color) {
				if (!isset($color['is_tricapa'])) {
					$data['colors'][$key]['is_tricapa'] = false;
				}
				if (!isset($color['has_brillo_directo'])) {
					$data['colors'][$key]['has_brillo_directo'] = false;
				}
			}
		}
		return $data;
	}

	public function getList2($name='name', $id='id')
	{
		return Brand::where('is_car',true)->pluck($name, $id)->toArray();
	}
	public function save($data, $id=0){
		$data = $this->prepareData($data);
		//dd($data);
		$colorRepo= new ColorRepo;
		$modeloRepo= new ModeloRepo;
		$model = parent::save($data, $id);
		if (isset($data['colors'])) {
			$colorRepo->saveMany($data['colors'], ['key' => 'brand_id', 'value' => $model->id]);
		}
		if (isset($data['modelos'])) {
			$modeloRepo->saveMany($data['modelos'], ['key' => 'brand_id', 'value' => $model->id]);
		}
		return $model;
	}

}