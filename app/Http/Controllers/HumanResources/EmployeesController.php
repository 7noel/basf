<?php namespace App\Http\Controllers\HumanResources;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Modules\Base\IdTypeRepo;
use App\Modules\HumanResources\EmployeeRepo;
use App\Modules\HumanResources\JobRepo;
use App\Modules\Base\UbigeoRepo;
use App\Modules\Finances\CompanyRepo;

use App\Http\Requests\HumanResources\FormEmployeeRequest;

class EmployeesController extends Controller {

	protected $repo;
	protected $jobRepo;
	protected $ubigeoRepo;
	protected $idTypeRepo;
	protected $companyRepo;

	public function __construct(EmployeeRepo $repo, JobRepo $jobRepo, UbigeoRepo $ubigeoRepo, IdTypeRepo $idTypeRepo, CompanyRepo $companyRepo) {
		$this->repo = $repo;
		$this->jobRepo = $jobRepo;
		$this->ubigeoRepo = $ubigeoRepo;
		$this->idTypeRepo = $idTypeRepo;
		$this->companyRepo = $companyRepo;
	}

	public function index()
	{
		$models = $this->repo->index('name', \Request::get('name'));
		return view('partials.index',compact('models'));
	}

	public function create()
	{
		$jobs = $this->jobRepo->getList();
		$id_types = $this->idTypeRepo->getList2('symbol');
		$ubigeo = $this->ubigeoRepo->listUbigeo();
		$companies = $this->companyRepo->getList('company_name');
		return view('partials.create', compact('jobs', 'id_types','ubigeo', 'companies'));
	}

	public function store(FormEmployeeRequest $request)
	{
		$this->repo->save(\Request::all());
		return \Redirect::route('employees.index');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$model = $this->repo->findOrFail($id);
		$jobs = $this->jobRepo->getList();
		$id_types = $this->idTypeRepo->getList2('symbol');
		$ubigeo = $this->ubigeoRepo->listUbigeo($model->ubigeo_id);
		$companies = $this->companyRepo->getList('company_name');
		return view('partials.edit', compact('model', 'jobs', 'id_types', 'ubigeo', 'companies'));
	}

	public function update($id, FormEmployeeRequest $request)
	{
		$this->repo->save(\Request::all(), $id);
		return \Redirect::route('employees.index');
	}

	public function destroy($id)
	{
		$model = $this->repo->destroy($id);
		if (\Request::ajax()) {	return $model; }
		return redirect()->route('employees.index');
	}

	public function ajaxAutocompleteSellers()
	{
		$term = \Input::get('term');
		$models = $this->repo->autocompleteSeller($term);
		$result = [];
		foreach ($models as $model) {
			$result[]=[
				'value' => $model->full_name,
				'id' => $model->id,
				'label' => $model->full_name
			];
		}
		return \Response::json($result);
	}

	public function employeesByWarehouse($warehouse_id)
	{
		return \Response::json($this->repo->getByWarehouse($warehouse_id));
	}

}
