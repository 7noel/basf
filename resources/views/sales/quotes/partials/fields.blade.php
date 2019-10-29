					{!! Form::hidden('with_tax', 0, ['id'=>'with_tax']) !!}
					{!! Form::hidden('currency_id', 1, ['id'=>'currency_id']) !!}
					{!! Form::hidden('order_type', 2) !!}
					{!! Form::hidden('my_company', session('my_company')->id) !!}
					<div class="form-group form-group-sm">
						<div class="col-sm-2">
							{!! Form::label('sn','Nro Seguimiento', ['class'=>'control-label']) !!}
							{!! Form::text('sn', null, ['class'=>'form-control text-center', 'readonly']) !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('txtWarehouse','Almacén', ['class'=>'control-label']) !!}
							{!! Form::select('warehouse_id', $warehouses, ((isset($model->warehouse_id)) ? $model->warehouse_id : null),['class'=>'form-control']); !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('txtPainter','Pintor', ['class'=>'control-label']) !!}
							{!! Form::select('painter_id', $painters, ((isset($model->painter_id)) ? $model->painter_id : null),['class'=>'form-control']); !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('txtTint','Matizador', ['class'=>'control-label']) !!}
							{!! Form::select('tint_id', $tints, ((isset($model->tint_id)) ? $model->tint_id : null),['class'=>'form-control']); !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('oc','O. Compra', ['class'=>'control-label']) !!}
							{!! Form::text('oc', null, ['class'=>'form-control']) !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('ot','O. Trabajo', ['class'=>'control-label']) !!}
							{!! Form::text('ot', null, ['class'=>'form-control']) !!}
						</div>
					</div>
					<div class="form-group form-group-sm">
						<div class="col-sm-2">
							{!! Form::label('placa','Placa', ['class'=>'control-label']) !!}
							{!! Form::text('placa', null, ['class'=>'form-control']) !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('brand_id','Marca', ['class'=>'control-label']) !!}
							{!! Form::select('brand_id', $painters, ((isset($model->brand_id)) ? $model->brand_id : null),['class'=>'form-control']); !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('model_id','Modelo', ['class'=>'control-label']) !!}
							{!! Form::select('model_id', $painters, ((isset($model->model_id)) ? $model->model_id : null),['class'=>'form-control']); !!}
						</div>
						<div class="col-sm-6">
							{!! Form::label('comment','Comentarios', ['class'=>'control-label']) !!}
							{!! Form::text('comment', null, ['class'=>'form-control uppercase']) !!}
						</div>
					</div>
					<div class="form-group form-group-sm">
						<div class="col-sm-2">
							{!! Form::label('code_color','Color 1', ['class'=>'control-label']) !!}
							{!! Form::text('code_color', null, ['class'=>'form-control uppercase']) !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('quantity_news','Paños Nuevos 1', ['class'=>'control-label']) !!}
							{!! Form::text('quantity_news', null, ['class'=>'form-control uppercase']) !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('quantity','Total Paños 1', ['class'=>'control-label']) !!}
							{!! Form::text('quantity', null, ['class'=>'form-control uppercase']) !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('code_color2','Color 2', ['class'=>'control-label']) !!}
							{!! Form::text('code_color2', null, ['class'=>'form-control uppercase']) !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('quantity_news2','Paños Nuevos 2', ['class'=>'control-label']) !!}
							{!! Form::text('quantity_news2', null, ['class'=>'form-control uppercase']) !!}
						</div>
						<div class="col-sm-2">
							{!! Form::label('quantity2','Total Paños 2', ['class'=>'control-label']) !!}
							{!! Form::text('quantity2', null, ['class'=>'form-control uppercase']) !!}
						</div>
					</div>
					@if(isset($model))
					<div class="form-group form-group-sm">
						<div class="col-sm-1">
							{!! Form::label('meta_gr_pintura','Meta pintura(gr)', ['class'=>'control-label']) !!}
							<p class="form-control-static">{{ $model->meta_gr_pintura }}</p>
						</div>
						<div class="col-sm-1">
							{!! Form::label('meta_soles_pintura','Meta pintura(S/)', ['class'=>'control-label']) !!}
							<p class="form-control-static">{{ $model->meta_soles_pintura }}</p>
						</div>
						<div class="col-sm-1">
							{!! Form::label('meta_soles_directos','Meta Directos(S/)', ['class'=>'control-label']) !!}
							<p class="form-control-static">{{ $model->meta_soles_directos }}</p>
						</div>
						<div class="col-sm-1">
							{!! Form::label('meta_soles_indirectos','Meta pintura(S/)', ['class'=>'control-label']) !!}
							<p class="form-control-static">{{ $model->meta_soles_indirectos }}</p>
						</div>
						<div class="col-sm-1">
							{!! Form::label('real_gr_pintura','Real pintura(gr)', ['class'=>'control-label']) !!}
							<p class="form-control-static">{{ $model->real_gr_pintura }}</p>
						</div>
						<div class="col-sm-1">
							{!! Form::label('real_soles_pintura','Real pintura(S/)', ['class'=>'control-label']) !!}
							<p class="form-control-static">{{ $model->real_soles_pintura }}</p>
						</div>
						<div class="col-sm-1">
							{!! Form::label('real_soles_directos','Real directos(S/)', ['class'=>'control-label']) !!}
							<p class="form-control-static">{{ $model->real_soles_directos }}</p>
						</div>
						<div class="col-sm-1">
							{!! Form::label('real_soles_indirectos','Real indirectos(S/)', ['class'=>'control-label']) !!}
							<p class="form-control-static">{{ $model->real_soles_indirectos }}</p>
						</div>
						<div class="col-sm-1">
							{!! Form::label('ahorro_pintura','Ahorro pintura(S/)', ['class'=>'control-label']) !!}
							<p class="form-control-static">{{ $model->ahorro_pintura }}</p>
						</div>
						<div class="col-sm-1">
							{!! Form::label('ahorro_directos','Ahorro directos(S/)', ['class'=>'control-label']) !!}
							<p class="form-control-static">{{ $model->ahorro_directos }}</p>
						</div>
						<div class="col-sm-1">
							{!! Form::label('ahorro_indirectos','Ahorro indirectos(S/)', ['class'=>'control-label']) !!}
							<p class="form-control-static">{{ $model->ahorro_indirectos }}</p>
						</div>
					</div>
					<div class="form-group form-group-sm">
						<div class="col-sm-2">
							{!! Form::label('cumpli_total','Cumpli Total', ['class'=>'control-label']) !!}
							<p class="form-control-static">{{ $model->cumpli_total}}</p>
						</div>
						<div class="col-sm-2">
							{!! Form::label('cumpli_panio','Cumpli Paño', ['class'=>'control-label']) !!}
							<p class="form-control-static">{{ $model->acumpli_panio }}</p>
						</div>
						<div class="col-sm-2">
							{!! Form::label('pintor_recibe','Premio/Penalidad', ['class'=>'control-label']) !!}
							<p class="form-control-static">{{ $model->pintor_recibe }}</p>
						</div>
						<div class="col-sm-2">
							{!! Form::label('status','Status:', ['class'=>'control-label']) !!}
							<p class="form-control-static">{{ $model->status }}</p>
						</div>
					</div>
					@endif