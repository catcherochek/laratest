<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Share extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    	Schema::create('shares', function (Blueprint $table) {
    		$table->increments('id');
    		$table->string('share_name');
    		$table->integer('share_price');
    		$table->integer('share_qty');
    		$table->string('share_photo');
    		$table->timestamps();
    	});//
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
