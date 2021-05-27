<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomingDeliveryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoming_delivery', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('ref_no');
            $table->dateTime('transac_date')->nullable();
            $table->unsignedBigInteger('supplier_id');
            $table->float('total_prod_costs')->nullable()->default(0);
            $table->longText('remarks')->nullable();
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
        Schema::dropIfExists('incoming_delivery');
    }
}
