@extends('app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Bienvenido</div>

                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-3">
                            <a href="{{ route('quotes.filter') }}" class="thumbnail">ORDENES DE COMPRA
                                <img src="/img/ocompra.png" alt="...">
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <a href="{{ route('orders.filter') }}" class="thumbnail">DESPACHOS
                                <img src="/img/despacho.png" alt="...">
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <a href="{{ route('clients.index') }}" class="thumbnail">FACTURACIÓN
                                <img src="/img/invoice.png" alt="...">
                            </a>
                        </div>
                        <div class="col-xs-6 col-sm-3">
                            <a href="{{ route('products.index') }}" class="thumbnail">STOCK
                                <img src="/img/stock.png" alt="...">
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
