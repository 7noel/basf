<div>

  <!-- Nav tabs -->
  <ul class="nav nav-tabs" role="tablist">
    <li role="presentation" class="active"><a href="#tab_1" aria-controls="tab_1" role="tab" data-toggle="tab">Modelos</a></li>
    <li role="presentation"><a href="#tab_2" aria-controls="tab_2" role="tab" data-toggle="tab">Colores</a></li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div role="tabpanel" class="tab-pane active" id="tab_1">
						@php $i=0; @endphp
						
						<table class="table table-condensed">
							<thead>
								<tr>
									<th>Nombre</th>
									<th>Descripción</th>
									<th>Acciones</th>
								</tr>
							</thead>
							<tbody id="tableModelos">
							@if(isset($model->modelos))
							@foreach($model->modelos as $modelo)
								<tr data-id="{{ $modelo->id }}">
									{!! Form::hidden("modelos[$i][id]", $modelo->id, ['class'=>'modeloId','data-modeloId'=>'']) !!}
									<td>{!! Form::text("modelos[$i][name]", $modelo->name, ['class'=>'form-control input-sm name uppercase', 'data-name'=>'']) !!}</td>
									<td>{!! Form::text("modelos[$i][description]", $modelo->description, ['class'=>'form-control input-sm description uppercase', 'data-description'=>'']) !!}</td>

									<td class="text-center form-inline">
										<div class="checkbox">
											<label><input type="checkbox" name="modelos[{{$i}}][is_deleted]" data-isdeleted class="isdeleted"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></label>
										</div>
									</td>
								</tr>
								@php $i++; @endphp
							@endforeach
							@endif
							</tbody>
						</table>
						<template id="template-row-modelo">
							<tr>
								<td>{!! Form::text('data1', null, ['class'=>'form-control input-sm name uppercase', 'data-name'=>'']) !!}</td>
								<td>{!! Form::text('data2', null, ['class'=>'form-control input-sm description uppercase', 'data-description'=>'']) !!}</td>
								<td class="text-center form-inline">
									<div class="checkbox">
										<label><input type="checkbox" name="data7" data-isdeleted class="isdeleted"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></label>
									</div>
								</td>
							</tr>
						</template>
						{!! Form::hidden('items_1', $i, ['id'=>'items_1']) !!}
						<a href="#" id="btnAddModelo" class="btn btn-success btn-sm" title="Agregar Modelo">{!! config('options.icons.add') !!} Agregar Modelo</a>
    </div>
    <div role="tabpanel" class="tab-pane" id="tab_2">
						@php $i=0; @endphp
						
						<table class="table table-condensed">
							<thead>
								<tr>
									<th class="col-sm-1">Codigo</th>
									<th class="col-sm-1">Codigo 2</th>
									<th class="col-sm-5">Descripción</th>
									<th class="col-sm-1">Modelos</th>
									<th class="col-sm-1">Tricapa</th>
									<th class="col-sm-1">Brillo</th>
									<th class="col-sm-1">Acciones</th>
								</tr>
							</thead>
							<tbody id="tableColors">
							@if(isset($model->colors))
							@foreach($model->colors as $color)
								<tr data-id="{{ $color->id }}">
									{!! Form::hidden("colors[$i][id]", $color->id, ['class'=>'colorId','data-colorId'=>'']) !!}
									<td>{!! Form::text("colors[$i][code]", $color->code, ['class'=>'form-control input-sm code uppercase', 'data-code'=>'', 'required'=>'required']) !!}</td>
									<td>{!! Form::text("colors[$i][description]", $color->description, ['class'=>'form-control input-sm other_code uppercase', 'data-OtherCode'=>'']) !!}</td>
									<td>{!! Form::text("colors[$i][description]", $color->description, ['class'=>'form-control input-sm description', 'data-description'=>'']) !!}</td>
									<td>{!! Form::text("colors[$i][modelos]", $color->modelos, ['class'=>'form-control input-sm modelos', 'data-modelos'=>'']) !!}</td>
									<td>{!! Form::checkbox("colors[$i][is_tricapa]", '1', ($color->is_tricapa)? true : false, ['class'=>'is_tricapa', 'data-isTricapa'=>'']) !!}</td>
									<td>{!! Form::checkbox("colors[$i][has_brillo_directo]", '1', ($color->has_brillo_directo)? true : false, ['class'=>'has_brillo_directo', 'data-hasBrillo'=>'']) !!}</td>

									<td class="text-center form-inline">
										<div class="checkbox">
											<label><input type="checkbox" name="colors[{{$i}}][is_deleted]" data-isdeleted class="isdeleted"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></label>
										</div>
									</td>
								</tr>
								@php $i++; @endphp
							@endforeach
							@endif
							</tbody>
						</table>
						<template id="template-row-color">
							<tr>
								<td>{!! Form::text('data1', null, ['class'=>'form-control input-sm code uppercase', 'data-code'=>'', 'required'=>'required']) !!}</td>
								<td>{!! Form::text('data2', null, ['class'=>'form-control input-sm other_code uppercase', 'data-otherCode'=>'']) !!}</td>
								<td>{!! Form::text('data3', null, ['class'=>'form-control input-sm description', 'data-description'=>'']); !!}</td>
								<td>{!! Form::text('data4', null, ['class'=>'form-control input-sm modelos', 'data-modelos'=>'']) !!}</td>
								<td>{!! Form::checkbox('data5', '1', false, ['class'=>'is_tricapa', 'data-isTricapa'=>'']) !!}</td>
								<td>{!! Form::checkbox('data6', '1', false, ['class'=>'has_brillo_directo', 'data-hasBrillo'=>'']) !!}</td>
								<td class="text-center form-inline">
									<div class="checkbox">
										<label><input type="checkbox" name="data7" data-isdeleted class="isdeleted"> <span class="glyphicon glyphicon-trash" aria-hidden="true"></span></label>
									</div>
								</td>
							</tr>
						</template>
						{!! Form::hidden('items_2', $i, ['id'=>'items_2']) !!}

						<a href="#" id="btnAddColor" class="btn btn-success btn-sm" title="Agregar Color">{!! config('options.icons.add') !!} Agregar Color</a>
    	
    </div>
  </div>

</div>