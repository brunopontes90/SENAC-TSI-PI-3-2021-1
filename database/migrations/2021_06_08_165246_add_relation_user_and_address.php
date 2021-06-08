<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationUserAndAddress extends Migration
{

    public function up()
    {
        Schema::create('user_address', function (Blueprint $table) {
            $table->integer('user_id');
            $table->integer('address_id');
        });
    }


    public function down()
    {
        Schema::dropIfExists('user_address');
    }
}
