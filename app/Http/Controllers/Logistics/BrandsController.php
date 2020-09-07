<?php namespace App\Http\Controllers\Logistics;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Modules\Logistics\BrandRepo;
use App\Modules\Logistics\ModeloRepo;
use App\Modules\Logistics\ColorRepo;

class BrandsController extends Controller {

	protected $repo;
	protected $modeloRepo;
	protected $colorRepo;

	public function __construct(BrandRepo $repo, ModeloRepo $modeloRepo, ColorRepo $colorRepo) {
		$this->repo = $repo;
		$this->modeloRepo = $modeloRepo;
		$this->colorRepo = $colorRepo;
	}

	public function index()
	{
		$models = $this->repo->index('name', \Request::get('name'));
		return view('partials.index',compact('models'));
	}

	public function create()
	{
		return view('partials.create');
	}

	public function store()
	{
		$this->repo->save(\Request::all());
		return \Redirect::route('brands.index');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$model = $this->repo->findOrFail($id);
		return view('partials.edit', compact('model'));
	}

	public function update($id)
	{
		$this->repo->save(\Request::all(), $id);
		return \Redirect::route('brands.index');
	}

	public function destroy($id)
	{
		$model = $this->repo->destroy($id);
		if (\Request::ajax()) {	return $model; }
		return redirect()->route('logistics.brands.index');
	}

	public function colorsByModelo($modelo_id)
	{
		$colors = $this->colorRepo->colorsByModelo($modelo_id);
		return \Response::json($colors);
	}
	public function modelosByWarehouse($warehouse_id)
	{
		$modelos = $this->modeloRepo->modelosByWarehouse($warehouse_id);
		return \Response::json($modelos);
	}
}