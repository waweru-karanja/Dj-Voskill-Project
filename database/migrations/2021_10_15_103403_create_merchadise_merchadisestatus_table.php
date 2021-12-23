<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchadiseMerchadisestatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchadise_merchadisestatus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('merchadisestatus_id');
            $table->foreign('merchadisestatus_id')->references('id')->on('merchadisestatuses')->onDelete('cascade');
            $table->unsignedBigInteger('merchadise_id');
            $table->foreign('merchadise_id')->references('id')->on('merchadises')->onDelete('cascade');
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
        Schema::dropIfExists('merchadise_merchadisestatus');
    }
}
