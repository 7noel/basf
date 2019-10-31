<?php namespace App\Http\Controllers\Storage;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Modules\Storage\WarehouseRepo;
use App\Modules\HumanResources\EmployeeRepo;
use App\Modules\HumanResources\JobRepo;
use App\Modules\Base\UbigeoRepo;

use App\Http\Requests\Storage\FormWarehouseRequest;

class WarehousesController extends Controller {

	protected $repo;
	protected $ubigeoRepo;
	protected $employeeRepo;
	protected $jobRepo;

	public function __construct(WarehouseRepo $repo, EmployeeRepo $employeeRepo, JobRepo $jobRepo, UbigeoRepo $ubigeoRepo) {
		$this->repo = $repo;
		$this->employeeRepo = $employeeRepo;
		$this->jobRepo = $jobRepo;
		$this->ubigeoRepo = $ubigeoRepo;
	}

	public function index()
	{
		$models = $this->repo->index('name', \Request::get('name'));
		return view('partials.index',compact('models'));
	}

	public function create()
	{
		$employees = $this->employeeRepo->all();
		$jobs = $this->jobRepo->all();
		$ubigeo = $this->ubigeoRepo->listUbigeo();
		return view('partials.create', compact('employees', 'jobs', 'ubigeo'));
	}

	public function store(FormWarehouseRequest $request)
	{
		$this->repo->save(\Request::all());
		return \Redirect::route('warehouses.index');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$model = $this->repo->findOrFail($id);
		$employees = $this->employeeRepo->toWarehouses($model->company_id);
		//dd($employees);
		$employees = $employees->diff($model->employees);
		$jobs = $this->jobRepo->all();
		$ubigeo = $this->ubigeoRepo->listUbigeo($model->ubigeo_id);
		return view('partials.edit', compact('model', 'employees', 'jobs', 'ubigeo'));
	}

	public function update($id, FormWarehouseRequest $request)
	{
		$this->repo->save(\Request::all(), $id);
		return \Redirect::route('warehouses.index');
	}

	public function destroy($id)
	{
		$model = $this->repo->destroy($id);
		if (\Request::ajax()) {	return $model; }
		return redirect()->route('warehouses.index');
	}
	public function ajaxList()
	{
		$ajax = $this->repo->ajaxList();
		return \Response::json($ajax);
	}
	public function getWarehouse($warehouse_id)
	{
		//return $this->repo->getDistribuidorAjax($warehouse_id);
		return \Response::json($this->repo->find($warehouse_id));
	}
}
