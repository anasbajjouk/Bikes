<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();

            $table->string('password');
            $table->string('image')->nullable();
            $table->date('birthDate')->nullable();

            $table->string('gender')->nullable();
            $table->text('address')->nullable();
            $table->string('phone',20)->nullable();

            $table->string('role',15)->default('user');
            $table->tinyInteger('subscriber')->default('0');

            $table->string('stripe_id')->nullable();
            $table->string('card_brand')->nullable();
            $table->string('card_last_four')->nullable();
            $table->timestamp('trial_ends_at')->nullable();

            $table->timestamp('last_login_at')->nullable();
            $table->ipAddress('last_login_ip')->nullable();

            $table->string('token')->nullable();

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
