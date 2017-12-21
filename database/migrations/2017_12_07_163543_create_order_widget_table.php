<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderWidgetTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_widget', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('widget_id')->unsigned();
            $table->integer('order_id')->unsigned();

            $table->integer('qty');
            $table->float('total');
            
            $table->foreign('widget_id')
                    ->references('id')
                    ->on('widgets');

            $table->foreign('order_id')
                    ->references('id')
                    ->on('orders');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_widget');
    }
}
