<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWidgetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('widgets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('brand');
            $table->text('description');
            $table->text('information');
            $table->text('color');
            $table->string('overview',150);
            $table->text('size');
            $table->float('price');
            $table->string('image')->nullable();
            $table->boolean('availability')->default('1');
            $table->boolean('onSale')->default('0');
            $table->float('discount')->nullable();

            $table->integer('categoryw_id')->unsigned();
            /*$table->foreign('widgcategory_id')
                    ->references('id')
                    ->on('widgcategories');*/
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
        Schema::dropIfExists('widgets');
    }
}
