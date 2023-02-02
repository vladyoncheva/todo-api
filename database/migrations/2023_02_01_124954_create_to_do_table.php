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
        Schema::create('to_do', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("title", 50);
            $table->string("description", 500);
            $table->smallInteger("states");
            $table->integer("project_id");
            $table->integer("user_id");
            $table->integer("count");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('to_do');
    }
};
