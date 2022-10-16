<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zonal_access', function (Blueprint $table) {
            $table->primary(['user_id', 'zone_id']);
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('zone_id');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('zone_id')->references('id')->on('zones')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

        // TODO: Add cascade deletion via foreign keys:
//        Schema::create('user_zone', function (Blueprint $table) {
//            $table->primary(['user_id', 'zone_id']);
//            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
//            $table->foreignId('zone_id')->constrained()->cascadeOnDelete();
//            $table->timestamps();
//        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_zone');
    }
};
