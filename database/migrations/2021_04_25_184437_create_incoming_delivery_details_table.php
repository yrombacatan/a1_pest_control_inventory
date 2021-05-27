<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomingDeliveryDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoming_delivery_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ref_no');
            $table->unsignedBigInteger('product_id');
            $table->integer('quantity');
            $table->string('unit_type');
            $table->float('buying_price')->nullable()->default(0);
            $table->float('total_cost')->nullable()->default(0);
            $table->tinyInteger('is_active')->default(1);
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
        Schema::dropIfExists('incoming_delivery_details');
    }
}
