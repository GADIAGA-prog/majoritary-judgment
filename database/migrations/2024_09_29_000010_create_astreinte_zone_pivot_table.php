<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAstreinteZonePivotTable extends Migration
{
    public function up()
    {
        Schema::create('astreinte_zone', function (Blueprint $table) {
            $table->unsignedBigInteger('astreinte_id');
            $table->foreign('astreinte_id', 'astreinte_id_fk_10153650')->references('id')->on('astreintes')->onDelete('cascade');
            $table->unsignedBigInteger('zone_id');
            $table->foreign('zone_id', 'zone_id_fk_10153650')->references('id')->on('zones')->onDelete('cascade');
        });
    }
}
