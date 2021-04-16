<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSoftdeleteTags extends Migration
{

    public function up()
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::table('tags', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
