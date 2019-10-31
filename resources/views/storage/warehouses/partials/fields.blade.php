					<div class="form-group form-group-sm">
						{!! Form::label('txtcompany','Taller:', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-4">
							@if(isset($company))
								{!! Form::hidden('company_id', $company->id, ['id'=>'company_id']) !!}
								{!! Form::text('company', $company->company_name, ['class'=>'form-control', 'id'=>'txtCompany', 'required']) !!}
							@else
								{!! Form::hidden('company_id', null, ['id'=>'company_id']) !!}
								{!! Form::text('company', ((isset($model->company_id)) ? $model->company->company_name : null), ['class'=>'form-control', 'id'=>'txtCompany', 'required']) !!}
							@endif
						</div>
						{!! Form::label('provider_id','Distribuidor:', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-4">
								{!! Form::hidden('provider_id', null, ['id'=>'provider_id']) !!}
								<p class="form-control-static" id="txtProvider">{{ isset($model) ? $model->provider->company_name : '' }}</p>
						</div>
					</div>
					<div class="form-group  form-group-sm">
						{!! Form::label('name','Nombres', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
						{!! Form::text('name', null, ['class'=>'form-control uppercase']) !!}
						</div>
					</div>
					<div class="form-group  form-group-sm">
						{!! Form::label('ubigeo_id','Distrito', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
							<div class="form-inline">
							{!! Form::hidden('ubigeo_id', null, ['class'=>'form-control']) !!}
								{!! Form::select('departamento',$ubigeo['departamento'],$ubigeo['value']['departamento'],['class'=>'form-control','id'=>'lstDepartamento','required'=>'required']) !!}
								{!! Form::select('provincia',$ubigeo['provincia'],$ubigeo['value']['provincia'],['class'=>'form-control','id'=>'lstProvincia','required'=>'required']) !!}
								{!! Form::select('ubigeo_id',$ubigeo['distrito'],$ubigeo['value']['distrito'],['class'=>'form-control','id'=>'lstDistrito','required'=>'required']) !!}
								
								
							</div>
						</div>
					</div>
					<div class="form-group  form-group-sm">
						{!! Form::label('address','Direccion', ['class'=>'col-sm-2 control-label']) !!}
						<div class="col-sm-10">
						{!! Form::text('address', null, ['class'=>'form-control uppercase']) !!}
						</div>
					</div>

					
					<div class="form-group">
						<div class="col-sm-4 col-sm-offset-1">
							<label>Empleados No Autorizados</label>
							<select name="origen[]" id="origen" multiple size="10" class="form-control">
								@foreach($employees as $employee)
								<option value="{{ $employee->id }}" class="groupx group_{{ $employee->job_id }}">{{ $employee->full_name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-sm-3 btn-group-vertical" role="group">
							<select name="" id="groups" class="form-control">
								<option value="">TODOS LOS TIPOS</option>
								@foreach($jobs as $job)
								<option value="{{ $job->id }}">{{ $job->name }}</option>
								@endforeach			
							</select>
							<br>
							<input type="button" class="btn btn-default pasar izq" value="Pasar »">
							<input type="button" class="btn btn-default quitar der" value="« Quitar">
							<input type="button" class="btn btn-default pasartodos izq" value="Todos »">
							<input type="button" class="btn btn-default quitartodos der" value="« Ninguno">
						</div>
						<div class="col-sm-4">
							<label>Empleados Autorizados</label>
							<select name="employees[]" id="destino" multiple size="10" class="form-control">
								@if(isset($model))
									@foreach($model->employees as $employee)
									<option value="{{ $employee->id }}" class="groupx group_{{ $employee->job_id }}">{{ $employee->full_name }}</option>
									@endforeach
								@endif
							</select>
						</div>
					</div>