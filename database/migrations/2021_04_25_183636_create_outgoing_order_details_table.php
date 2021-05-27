<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOutgoingOrderDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('outgoing_order_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('transac_no');
            $table->unsignedBigInteger('product_id');
            $table->float('prod_qty')->nullable()->default(0);
            $table->float('prod_price')->nullable()->default(0);
            $table->float('prod_total')->nullable()->default(0);
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
        Schema::dropIfExists('outgoing_order_details');
    }
}
