<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConstOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('const_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('const_name');
            $table->string('place', 100);
            $table->string('genre', 50);
            $table->bigInteger('user_id');
            $table->string('status', 50);
            $table->date('order_date')->nullable();
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
        Schema::dropIfExists('const_orders');
    }
}
