<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Order extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
     
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('address');
            $table->string('state');
            $table->string('city');
            $table->string('zip');
            $table->timestamp('ordered_at');
            $table->string('token');


   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
