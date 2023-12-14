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
        Schema::create('dash_packages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->default(1);
            $table->string('title')->unique();
            $table->string('img');
            $table->string('slug')->unique();
            $table->string('rate_from');
            $table->string('duration');
            $table->longText('overview');
            $table->longText('table_price');
            $table->longText('include');
            $table->longText('exclude');
            $table->longText('important');
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
        Schema::dropIfExists('dash_packages');
    }
};
