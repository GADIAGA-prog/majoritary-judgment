<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAstreinteEmploiPivotTable extends Migration
{
    public function up()
    {
        Schema::create('astreinte_emploi', function (Blueprint $table) {
            $table->unsignedBigInteger('astreinte_id');
            $table->foreign('astreinte_id', 'astreinte_id_fk_10153649')->references('id')->on('astreintes')->onDelete('cascade');
            $table->unsignedBigInteger('emploi_id');
            $table->foreign('emploi_id', 'emploi_id_fk_10153649')->references('id')->on('emplois')->onDelete('cascade');
        });
    }
}
