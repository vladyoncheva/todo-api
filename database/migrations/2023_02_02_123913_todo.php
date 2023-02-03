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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string("title", 50);
            $table->string("description", 500);
            $table->smallInteger("states");
            $table->unsignedBigInteger("project_id");
            $table->unsignedBigInteger("user_id");
            $table->integer("count");
            $table->foreign('project_id')
                ->references('id')->on('projects') ->onDelete('cascade');
            $table->foreign('user_id')
                ->references('id')->on('users') ->onDelete('cascade');
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
