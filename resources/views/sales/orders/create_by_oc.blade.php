@extends('app')

@section('content')
<div class="container">

	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading panel-heading-custom">{{ config($labels['create'] .'.panel') . $model->name }}</div>

				<div class="panel-body">
					@include('partials.messages')

					{!! Form::model($model, ['route'=>$routes['store'], 'method'=>'POST', 'class'=>'form-horizontal', 'enctype'=>"multipart/form-data"]) !!}

					@if(Request::url() != URL::previous())
					<input type="hidden" name="last_page" value="{{ URL::previous() }}">
					@endif
					
					@include( $views['fields'] )
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<button type="submit" class="btn btn-primary" id="submit">{!! config('options.icons.save') !!} {{ config($labels['create'] .'.create') }}</button>
						</div>
					</div>
					{!! Form::close() !!}
				</div>
			</div>
			@include('partials.delete')
		</div>
	</div>
</div>
@endsection

@section('scripts')

@include( $views['scripts'] )

@endsection