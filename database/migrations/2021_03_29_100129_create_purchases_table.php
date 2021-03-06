<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('supplier_id');
            $table->integer('category_id');
            $table->integer('product_id');
            $table->string('purchase_no');
            $table->date('date');
            $table->string('description')->nullable();
            $table->double('buying_qnty');
            $table->double('unit_price');
            $table->double('buying_price');
            $table->tinyInteger('status')->default('0')->comment('0=Pending,1=Approved');
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
        Schema::dropIfExists('purchases');
    }
}
