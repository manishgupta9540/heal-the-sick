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
        Schema::create('about_coins', function (Blueprint $table) {
            $table->id();
            $table->string('title',200)->nullable();
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->text('coin_types')->nullable();
            $table->tinyInteger('status')->default('1')->comment('0 => Inactive, 1 => Active, 2 => Deleted')->nullable();
            $table->timestamps();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about_coins');
    }
};
