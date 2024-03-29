<?php
namespace App\Http\Controllers\Sales;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Modules\Sales\OrderRepo;
use App\Modules\Finances\PaymentConditionRepo;
use App\Modules\Finances\CompanyRepo;
use App\Modules\Base\CurrencyRepo;
use App\Modules\HumanResources\EmployeeRepo;
use App\Modules\Logistics\BrandRepo;
use App\Modules\Logistics\ModeloRepo;
use App\Modules\Logistics\ColorRepo;
use App\Modules\Storage\WarehouseRepo;
use App\Modules\Storage\StockRepo;
use App\Modules\Storage\Stock;

class OrdersController extends Controller {

	protected $repo;
	protected $paymentConditionRepo;
	protected $currencyRepo;
	protected $employeeRepo;
	protected $companyRepo;
	protected $brandRepo;
	protected $modeloRepo;
	protected $colorRepo;
	protected $warehouseRepo;

	public function __construct(EmployeeRepo $employeeRepo, OrderRepo $repo, PaymentConditionRepo $paymentConditionRepo, CurrencyRepo $currencyRepo, CompanyRepo $companyRepo, BrandRepo $brandRepo, ModeloRepo $modeloRepo, ColorRepo $colorRepo, WarehouseRepo $warehouseRepo) {
		$this->repo = $repo;
		$this->paymentConditionRepo = $paymentConditionRepo;
		$this->currencyRepo = $currencyRepo;
		$this->employeeRepo = $employeeRepo;
		$this->companyRepo = $companyRepo;
		$this->brandRepo = $brandRepo;
		$this->modeloRepo = $modeloRepo;
		$this->colorRepo = $colorRepo;
		$this->warehouseRepo = $warehouseRepo;
	}
	public function filter()
	{
		// $warehouses = $this->warehouseRepo->getList();
		// dd($warehouses);
		//$w = (array_keys($warehouses)[0]=='') ? '' : $this->warehouseRepo->find(array_keys($warehouses[array_keys($warehouses)[0]])[0])->company->provider->id;
		//dd($warehouses[array_keys($warehouses)[1]]);
		//dd($warehouses);
		if (explode('.', \Request::route()->getName())[0] == 'quotes') {
			$order_type = 2;
		} else {
			$order_type = 1;
		}
		
		$filter = (object) \Request::all();
		//dd($filter);
		if( !((array) $filter) ) {
			$filter->company_id = '';
			$filter->warehouse_id = '';
			$filter->sn = '';
			$filter->painter_id = '';
			$filter->status = '';
			$filter->f2 = date('Y-m-d');
			$filter->f1 = date('Y-m-d',strtotime($filter->f2."- 1 month")); ;
		}
		if ($filter->warehouse_id > 0) {
			session(['sede' => $this->warehouseRepo->find($filter->warehouse_id)]);
		}
		//dd(session('sede'));
		$ws = $this->warehouseRepo->getMySedes();
		$clients = $this->companyRepo->getListClientsBySedes($ws);
		if ($filter->company_id != '') {
			$ws = $ws->where('company_id', $filter->company_id);
		}
		$warehouses = $this->warehouseRepo->getSedesByClient($filter->company_id);
		
		$models = $this->repo->filter($filter, $ws, $order_type);

		$painters = ['' => 'Seleccionar'];
		// $painters = $this->employeeRepo->getListByJobWarehouse(3);
		$payment_conditions = $this->paymentConditionRepo->getList();
		return view('partials.filter',compact('models', 'filter', 'painters', 'warehouses', 'clients'));
	}
	public function index()
	{
		$models = $this->repo->index('name', \Request::get('name'));
		return view('partials.index',compact('models'));
	}

	public function create()
	{
		$my_companies = $this->companyRepo->getListMyCompany();
		$payment_conditions = $this->paymentConditionRepo->getList();
		$currencies = $this->currencyRepo->getList('symbol');
		$warehouses = $this->warehouseRepo->getList();
		$w = (array_keys($warehouses)[0]=='') ? '' : $this->warehouseRepo->find(array_keys($warehouses[array_keys($warehouses)[0]])[0])->company->provider->id;
		//$painters = $this->employeeRepo->getListByJobWarehouse(3, array_keys($warehouses)[0]);
		$painters = $this->employeeRepo->getListByJobWarehouse(3, session('sede')->id);
		//$tints = $this->employeeRepo->getListByJobWarehouse(2, array_keys($warehouses)[0]);
		$tints = $this->employeeRepo->getListByJobWarehouse(2, session('sede')->id);
		$brands = $this->brandRepo->getList();
		$colors = ['' => 'Seleccionar'];
		$modelos = $this->modeloRepo->modelosByWarehouse(session('sede')->id);
		return view('partials.create', compact('payment_conditions', 'currencies', 'my_companies', 'warehouses', 'w', 'painters', 'tints', 'brands', 'modelos', 'colors'));
	}

	public function store()
	{
		$model = $this->repo->save(\Request::all());
		//$this->sendAlert($model);
		return \Redirect::route(explode('.', \Request::route()->getName())[0].'.filter');
	}

	public function show($id)
	{
		//
	}

	public function edit($id)
	{
		$model = $this->repo->findOrFail($id);
		$my_companies = $this->companyRepo->getListMyCompany();
		$payment_conditions = $this->paymentConditionRepo->getList();
		$currencies = $this->currencyRepo->getList('symbol');
		$warehouses = $this->warehouseRepo->getList();
		$painters = $this->employeeRepo->getListByJobWarehouse(3, $model->warehouse_id);
		$tints = $this->employeeRepo->getListByJobWarehouse(2, $model->warehouse_id);
		$brands = $this->brandRepo->getList();
		//$modelos = $this->modeloRepo->getListGroup('brand');
		$modelos = $this->modeloRepo->modelosByWarehouse($model->warehouse_id);
		$colors = $this->colorRepo->colorsByModelo($model->modelo_id);
		return view('partials.edit', compact('model', 'payment_conditions', 'currencies', 'my_companies', 'warehouses', 'painters', 'tints', 'brands', 'modelos', 'colors'));
	}

	public function update($id)
	{
		$this->repo->save(\Request::all(), $id);
		return \Redirect::route(explode('.', \Request::route()->getName())[0].'.index');
	}

	public function destroy($id)
	{
		$model = $this->repo->destroy($id);
		if (\Request::ajax()) {	return $model; }
		return redirect()->route(explode('.', \Request::route()->getName())[0].'.filter');
	}

	/**
	 * CREA UN PDF EN EL NAVEGADOR
	 * @param  [integer] $id [Es el id de la cotizacion]
	 * @return [pdf]     [Retorna un pdf]
	 */
	public function print($id)
	{
		$model = $this->repo->findOrFail($id);
		\PDF::setOptions(['isPhpEnabled' => true]);
		$pdf = \PDF::loadView('pdfs.order', compact('model'));
		//$pdf = \PDF::loadView('pdfs.order_pdf', compact('model'));
		return $pdf->stream();
	}
	/**
	 * Envía Correo al generar cotización
	 * @param  Obj $model Modelo de la cotización
	 * @return boolean        Retorna true indicando que se envió con exito
	 */
	private function sendAlert($model)
	{
		$data['model'] = $model;
        \Mail::send('emails.notificacion', $data, function($message)
        {
            $message->to('jchu@ddmmedical.com');
            $message->cc(['onavarro@ddmmedical.com', 'asistente@ddmmedical.com']);
            $message->subject('Verificar Cotización');
            $message->from(env('CONTACT_MAIL'), env('CONTACT_NAME'));
        });
	}
	public function createByCompany($company_id)
	{
		$payment_conditions = $this->paymentConditionRepo->getList();
		$currencies = $this->currencyRepo->getList('symbol');
		$sellers = $this->employeeRepo->getListSellers();
		$company = $this->companyRepo->findOrFail($company_id);
		return view('partials.create', compact('payment_conditions', 'currencies', 'sellers', 'company'));
	}
	public function createByQuote($quote_id)
	{
		$model = $this->repo->findOrFail($quote_id);
		$order_id = $model->id;
		$my_companies = $this->companyRepo->getListMyCompany();
		$payment_conditions = $this->paymentConditionRepo->getList();
		$currencies = $this->currencyRepo->getList('symbol');
		$warehouses = $this->warehouseRepo->getList();
		$painters = $this->employeeRepo->getListByJobWarehouse(3, $model->warehouse_id);
		$tints = $this->employeeRepo->getListByJobWarehouse(2, $model->warehouse_id);
		$brands = $this->brandRepo->getList();
		$modelos = $this->modeloRepo->getListGroup('brand');
		$colors = $this->colorRepo->getList('code', 'code');
		$favorites = Stock::where('warehouse_id', 1)->where('is_favorite', 1)->with('product.sub_category', 'product.unit')->get();
		//dd($favorites);
		return view('sales.orders.create_by_oc', compact('model', 'payment_conditions', 'currencies', 'my_companies', 'warehouses', 'painters', 'tints', 'brands', 'modelos', 'favorites', 'colors', 'order_id'));

		// $model = $this->repo->findOrFail($id);
		// $my_companies = $this->companyRepo->getListMyCompany();
		// $payment_conditions = $this->paymentConditionRepo->getList();
		// $currencies = $this->currencyRepo->getList('symbol');
		// $warehouses = $this->warehouseRepo->getList();
		// //dd($warehouses);
		// // $w = (count($warehouses)) ? a : b ;
		// $painters = $this->employeeRepo->getListPainters($model->warehouse_id);
		// $tints = $this->employeeRepo->getListTints($model->warehouse_id);
		// $brands = $this->brandRepo->getList();
		// $modelos = $this->brandRepo->getListByBrand($model->brand_id);
		// return view('partials.edit', compact('model', 'payment_conditions', 'currencies', 'my_companies', 'warehouses', 'painters', 'tints', 'brands', 'modelos'));
	}
}