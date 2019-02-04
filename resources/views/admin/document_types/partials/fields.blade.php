					<div class="form-group  form-group-sm">
						{!! Form::label('name','Documento', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-4">
						{!! Form::text('name', null, ['class'=>'form-control uppercase']) !!}
						</div>
						{!! Form::label('code','Código', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-4">
						{!! Form::select('code', config('options.table_sunat.tipo_comprobante'), null, ['class'=>'form-control uppercase']) !!}
						</div>
					</div>
					<div class="form-group  form-group-sm">
						{!! Form::label('description','Descripcion', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
						{!! Form::text('description', null, ['class'=>'form-control']) !!}
						</div>
					</div>
					<div class="form-group  form-group-sm">
						{!! Form::label('','Para', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
							<label class="checkbox-inline">
								{!! Form::checkbox('to_sales', '1') !!} ventas
							</label>
							<label class="checkbox-inline">
								{!! Form::checkbox('to_purchases', '1') !!} compras
							</label>
						</div>
					</div>