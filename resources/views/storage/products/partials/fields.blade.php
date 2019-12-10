					<div class="form-group form-group-sm">
						<div class="col-sm-4">
							{!! Form::label('name','Nombre', ['class'=>'control-label']) !!}
							{!! Form::text('name', null, ['class'=>'form-control uppercase', 'required'=>'required']) !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('sub_category_id','SubCategoría', ['class'=>'control-label']) !!}
							{!! Form::select('sub_category_id', $sub_categories, ((isset($model->sub_category_id)) ? $model->sub_category_id : null),['class'=>'form-control', 'id'=>'lstSubCategories', 'required'=>'required']); !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('brand','Marca', ['class'=>'control-label']) !!}
							{!! Form::text('brand', null, ['class'=>'form-control']) !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('intern_code','Codigo Interno', ['class'=>'control-label']) !!}
							{!! Form::text('intern_code', null, ['class'=>'form-control uppercase']) !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('provider_code','Codigo de Proveedor', ['class'=>'control-label']) !!}
							{!! Form::text('provider_code', null, ['class'=>'form-control uppercase']) !!}
						</div>
					</div>
					@if(1==0)
					<div class="form-group form-group-sm">
						<div class="col-sm-12">
							{!! Form::label('description','Descripción', ['class'=>'control-label']) !!}
							{!! Form::textarea('description', null, ['class'=>'form-control', 'rows' => 3]) !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('country_id','País', ['class'=>'control-label']) !!}
							{!! Form::select('country_id', $countries, null, ['class'=>'form-control']); !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('status','Status', ['class'=>'control-label']) !!}
							{!! Form::select('status', config('options.product_status'), ((isset($model->status)) ? $model->status : 1),['class'=>'form-control', 'id'=>'lstUnit', 'required'=>'required']); !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('manufacturer_code','Codigo de Fabricante', ['class'=>'control-label']) !!}
							{!! Form::text('manufacturer_code', null, ['class'=>'form-control uppercase']) !!}
						</div>
					</div>
					@endif
					<div class="form-group form-group-sm">
						<div class="col-sm-2">
							{!! Form::label('last_purchase','Costo (S/.)', ['class'=>'control-label']) !!}
							{!! Form::text('last_purchase', 0.00, ['class'=>'form-control']) !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('presentacion','Presentación', ['class'=>'control-label']) !!}
							{!! Form::text('presentacion', null, ['class'=>'form-control']) !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('unit_id','Unidad de Presentación', ['class'=>'control-label']) !!}
							{!! Form::select('unit_id', $units, ((isset($model)) ? $model->unit_id : 1),['class'=>'form-control', 'id'=>'unit_id', 'required'=>'required']) !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('divisor','Divisor', ['class'=>'control-label']) !!}
							{!! Form::text('divisor', null, ['class'=>'form-control']) !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('density','Densidad', ['class'=>'control-label']) !!}
							{!! Form::text('density', null, ['class'=>'form-control']) !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('unit_dispatch_id','Unidad de Despacho', ['class'=>'control-label']) !!}
							{!! Form::select('unit_dispatch_id', $units, ((isset($model)) ? $model->unit_dispatch_id : 1),['class'=>'form-control', 'id'=>'unit_dispatch_id', 'required'=>'required']) !!}
						</div>
					</div>
					<div class="form-group form-group-sm">
					</div>

					@if(isset($model) or 1==1)
						@include('storage.products.partials.accordion')
					@endif
