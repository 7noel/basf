<div class="form-group form-group-sm">
	@if(count($clients)!=0)
	<div class="col-sm-2 has-success">
		{!! Form::label('company_id','TALLER', ['class'=>'control-label']) !!}
		{!! Form::select('company_id', $clients, null, ['class'=>'form-control', 'id'=>'company_id']); !!}
	</div>
	@endif
	<div class="col-sm-2 has-success">
		{!! Form::label('warehouse_id','SEDE', ['class'=>'control-label']) !!}
		{!! Form::select('warehouse_id', $warehouses, $filter->warehouse_id, ['class'=>'form-control', 'id'=>'warehouse_id']); !!}
	</div>
	<div class="col-sm-2">
		{!! Form::label('painter_id','Pintor', ['class'=>'control-label']) !!}
		{!! Form::select('painter_id', $painters, null, ['class'=>'form-control', 'id'=>'painter_id']); !!}
	</div>
</div>
<div class="form-group form-group-sm">
	<div class="col-sm-2">
		{!! Form::label('f1','Desde', ['class'=>'control-label']) !!}
		{!! Form::date('f1', null, ['class'=>'form-control', 'id'=>'f1']); !!}
	</div>
	<div class="col-sm-2">
		{!! Form::label('f2','Hasta', ['class'=>'control-label']) !!}
		{!! Form::date('f2', null, ['class'=>'form-control', 'id'=>'f2']); !!}
	</div>
	<div class="col-sm-2">
		{!! Form::label('status','Status', ['class'=>'control-label']) !!}
		{!! Form::select('status', ['' => 'Seleccionar'] + config('options.quote_status'), null, ['class'=>'form-control', 'id'=>'status']); !!}
	</div>
	<div class="col-sm-2">
		{!! Form::label('sn','Numero', ['class'=>'col-sm-1 control-label']) !!}
		{!! Form::text('sn', null, ['class'=>'form-control', 'id'=>'sn']); !!}
	</div>
</div>

