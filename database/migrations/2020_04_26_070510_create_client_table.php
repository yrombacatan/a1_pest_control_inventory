<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client', function (Blueprint $table) {
            $table->id();
            $table->string('customer')->nullable();
            $table->string('abnnum')->nullable();
            $table->string('faxnum')->nullable();
            $table->text('address');
            $table->string('bill_attntion')->nullable();
            $table->text('bill_address');
            $table->string('bill_city')->nullable();
            $table->string('bill_state')->nullable();
            $table->string('bill_pcode')->nullable();
            $table->string('bill_cntry')->nullable();
            $table->string('bill_taxrate')->nullable();
            $table->string('bill_payment')->nullable();
            $table->tinyInteger('is_active')->default(1);
            $table->string('profile_image')->nullable();
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
        Schema::dropIfExists('client');
    }
}
