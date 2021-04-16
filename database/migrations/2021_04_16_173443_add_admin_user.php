<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdminUser extends Migration
{

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
           // SE CRIAR UM USUARIO E FOR PADRÃO, SERA FALSO
            $table->boolean('isAdmin')->default(0);
        });
    }


    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('isAdmin');
        });
    }
}
