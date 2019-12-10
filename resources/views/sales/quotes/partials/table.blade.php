					<table class="table table-hover table-condensed">
						<tr>
							<th>#OS</th>
							<th>Fec_Orden</th>
							<th>#OT</th>
							<th>Tipo OT</th>
							<th>Marca-Modelo</th>
							<th>Placa</th>
							<th>Color</th>
							<th>Fec_Cierre</th>
							<th>Total</th>
							<th>Estado</th>
							<th>Acciones</th>
						</tr>
						@foreach($models as $model)
						<tr data-id="{{ $model->id }}">
							<td>{{ $model->oc }}</td>
							<td>{{ $model->created_at->formatLocalized('%d/%m/%Y') }}</td>
							<td>{{ $model->ot }}</td>
							<td>{{ config('options.ot_types.'.$model->type_ot) }}</td>
							<td>{{ $model->modelo->brand->name."-".$model->modelo->name }} </td>
							<td>{{ $model->placa }}</td>
							<td>{{ $model->color_code }}</td>
							<td>{{ $model->created_at->formatLocalized('%d/%m/%Y') }}</td>
							<td>{{ $model->currency->symbol." ".$model->total}} </td>
							<td>{{ $model->status }}</td>
							<td>
								@if(0 == 0)
								<a href="{{ route('create_order_by_quote', $model->id) }}" target="_blank" class="btn btn-default btn-xs" title="Generar Despacho">{!! config('options.icons.invoice') !!}</a>
								@endif
								@if($model->checked_at)
								<a href="{{ route( 'print_order' , $model->id ) }}" target="_blank" class="btn btn-success btn-xs" title="Imprimir">{!! config('options.icons.printer') !!} </a>
								@else
								<a href="#" class="btn btn-success btn-xs" title="Imprimir" disabled="disabled">{!! config('options.icons.printer') !!}</a>
								@endif
								<a href="{{ route( 'quotes.edit' , $model) }}" class="btn btn-primary btn-xs" title="Editar">{!! config('options.icons.edit') !!}</a>
								<a href="#" class="btn-delete btn btn-danger btn-xs" title="Eliminar">{!! config('options.icons.remove') !!}</a>
							</td>
						</tr>
						@endforeach
					</table>