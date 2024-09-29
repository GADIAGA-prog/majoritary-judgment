<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAstreintesTable extends Migration
{
    public function up()
    {
        Schema::create('astreintes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('montant');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
