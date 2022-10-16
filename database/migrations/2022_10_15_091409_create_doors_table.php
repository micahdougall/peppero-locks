<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('doors', static function (Blueprint $table) {
            $table->id();
            $table->foreignId('zone_id');
            $table->string('name');
//            $table->unsignedBigInteger('zone_id');
            $table->timestamps();

//            $table->foreign('zone_id')->references('id')->on('zones')
//                ->onDelete('cascade')
//                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('doors');
    }
};
