<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('mov');
            $table->string('sn'); // numero correlativo para cotizaciones y pedidos para las 3 empresas
            $table->integer('order_type')->unsigned(); // typo de documento {1=>'despacho', 2=>'orden de compra'}
            $table->string('type_op'); // segun ello afecta el valor promedio
            $table->integer('my_company')->unsigned(); // xxxxxxxxxxxxxxx
            $table->integer('company_id')->unsigned(); // distribuidor
            $table->integer('warehouse_id')->unsigned(); // almacen
            $table->integer('shipper_id')->unsigned();
            $table->integer('currency_id')->unsigned();

            $table->integer('type_ot'); // tipo de ot
            $table->string('placa');
            $table->string('oc');
            $table->string('ot');
            $table->integer('brand_id')->unsigned();
            $table->integer('modelo_id')->unsigned();
            $table->integer('painter_id')->unsigned();
            $table->integer('tint_id')->unsigned();
            $table->string('color_code');
            $table->string('color_code2');
            $table->decimal('quantity', 12, 2);
            $table->decimal('quantity2', 12, 2);
            $table->decimal('quantity_news', 12, 2);
            $table->decimal('quantity_news2', 12, 2);

            $table->decimal('meta_gr_pintura', 12, 4);
            $table->decimal('meta_soles_pintura', 12, 4);
            $table->decimal('meta_soles_directos', 12, 4);
            $table->decimal('meta_soles_indirectos', 12, 4);
            $table->decimal('real_gr_pintura', 12, 4);
            $table->decimal('real_soles_pintura', 12, 4);
            $table->decimal('real_soles_directos', 12, 4);
            $table->decimal('real_soles_indirectos', 12, 4);
            $table->decimal('ahorro_pintura', 12, 4);
            $table->decimal('ahorro_directos', 12, 4);
            $table->decimal('ahorro_indirectos', 12, 4);
            $table->decimal('cumpli_total', 12, 4);
            $table->decimal('cumpli_panios', 12, 4);
            $table->string('pintor_recibe');

            $table->dateTime('approved_at')->nullable();
            $table->dateTime('checked_at')->nullable();
            $table->dateTime('invoiced_at')->nullable();
            $table->dateTime('sent_at')->nullable();
            $table->dateTime('canceled_at')->nullable();
            $table->string('status', 20);
            $table->decimal('subtotal', 12,2);
            $table->decimal('tax', 12,2);
            $table->decimal('total', 12,2);
            $table->decimal('amortization', 12,2);
            $table->decimal('exchange', 12,2);
            $table->decimal('exchange_sunat', 12,2);
            $table->integer('order_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->text('comment');

            $table->foreign('company_id')->references('id')->on('companies');
            $table->foreign('currency_id')->references('id')->on('currencies');
            //$table->foreign('matizador_id')->references('id')->on('employees');
            //$table->foreign('pintor_id')->references('id')->on('employees');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
