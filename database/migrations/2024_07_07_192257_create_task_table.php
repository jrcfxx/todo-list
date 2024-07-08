<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskTable extends Migration
{
    /**
     * Run the migrations.
     * 
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->id();
            //$table->foreignId('user_id')->constrained();
            $table->string('title', 100);
            $table->longText('description');
            $table->integer('priority');
            $table->dateTime('due_date', 0);
            $table->dateTime('completeness_date', 0);
            $table->dateTime('delete_date', 0);
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
        Schema::dropIfExists('task');
    }
}
