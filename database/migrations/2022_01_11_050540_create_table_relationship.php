<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateTableRelationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
			$table->foreign('p_category_id')->references('id')->on('categories')->onUpdate('cascade')->onDelete('cascade');
		});        
        Schema::table('product_details', function (Blueprint $table) {
			$table->foreign('p_id')->references('id')->on('products')->onUpdate('cascade')->onDelete('cascade');
		});
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
		Schema::dropIfExists('products');
		Schema::dropIfExists('product_details');
		DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
