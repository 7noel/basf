<?php

namespace App\Modules\Sales;

use OwenIt\Auditing\Contracts\Auditable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model implements Auditable
{
	use \OwenIt\Auditing\Auditable;
	use SoftDeletes;

	protected $fillable = ['mov', 'sn', 'order_type', 'type_op', 'my_company', 'company_id', 'warehouse_id', 'shipper_id', 'currency_id', 'type_ot', 'placa', 'oc', 'ot', 'brand', 'modelo_id', 'painter_id', 'tint_id', 'color_code', 'color_code2', 'quantity', 'quantity_news', 'meta_gr_pintura', 'meta_soles_pintura', 'meta_soles_directos', 'meta_soles_indirectos', 'real_gr_pintura', 'real_soles_pintura', 'real_soles_directos', 'real_soles_indirectos', 'ahorro_pintura', 'ahorro_directos', 'ahorro_indirectos', 'cumpli_total', 'cumpli_panios', 'pintor_recibe', 'approved_at', 'checked_at', 'invoiced_at', 'sent_at', 'canceled_at', 'status', 'subtotal', 'tax', 'total', 'amortization', 'exchange', 'exchange_sunat', 'order_id', 'user_id', 'comment'];

            
	public function scopeName($query, $name){
		if (trim($name) != "") {
			$query->where('number', 'LIKE', "%$name%")->orWhere('created_at', 'LIKE', "%name%");
		}
	}

	public function proof()
	{
		return $this->belongsTo('App\Modules\Finances\Proof');
	}
	public function quote()// orden de compra
	{
		return $this->belongsTo('App\Modules\Sales\Order');
	}
	public function orders()// despachos
	{
		return $this->hasMany('App\Modules\Sales\Order');
	}
	public function mycompany()
	{
		return $this->hasOne('App\Modules\Finances\Company','id','my_company');
	}
	public function company()
	{
		return $this->hasOne('App\Modules\Finances\Company','id','company_id');
	}
	public function shipper()
	{
		return $this->hasOne('App\Modules\Finances\Company','id','shipper_id');
	}
	public function user()
	{
		return $this->hasOne('App\Modules\Security\Company','id','user_id');
	}
	public function document_type()
	{
		return $this->hasOne('App\Modules\Base\DocumentType','id','document_type_id');
	}
	public function currency()
	{
		return $this->hasOne('App\Modules\Base\Currency','id','currency_id');
	}
	public function payment_condition()
	{
		return $this->hasOne('App\Modules\Finances\PaymentCondition','id','payment_condition_id');
	}
	public function seller()
	{
		return $this->hasOne('App\Modules\HumanResources\Employee','id','seller_id');
	}
	public function details()
	{
		return $this->hasMany('App\Modules\Sales\OrderDetail');
	}
	public function attributes()
	{
		return $this->morphMany('App\Modules\Base\Attribute', 'attribute');
	}
	public function modelo()
	{
		return $this->belongsto('App\Modules\Logistics\Modelo');
	}
	public function color()
	{
		return $this->belongsto('App\Modules\Logistics\Color');
	}
}
