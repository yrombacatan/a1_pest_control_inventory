<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutgoingOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outgoing_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transac_no');
            $table->dateTime('transac_date')->nullable();
            $table->unsignedBigInteger('order_by');
            $table->float('total_order_cost')->nullable()->default(0);
            $table->longText('remarks')->nullable();
            $table->tinyInteger('order_stat')->default(1);
            $table->softDeletes();
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
        Schema::dropIfExists('outgoing_order');
    }
}
