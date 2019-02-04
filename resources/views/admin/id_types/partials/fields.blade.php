					<div class="form-group  form-group-sm">
						{!! Form::label('name','Documento', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-4">
						{!! Form::text('name', null, ['class'=>'form-control uppercase']) !!}
						</div>
						{!! Form::label('code','Código', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-4">
						{!! Form::select('code', config('options.table_sunat.cliente_tipo_de_documento'), null, ['class'=>'form-control uppercase']) !!}
						</div>
					</div>
					<div class="form-group  form-group-sm">
					</div>
					<div class="form-group  form-group-sm">
						{!! Form::label('description','Descripcion', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
						{!! Form::text('description', null, ['class'=>'form-control']) !!}
						</div>
					</div>