<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTodoLabelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todo_labels', function (Blueprint $table) {
            $table->id();
            $table->foreignId('todo_id')->references('id')->on('todos')->cascadeOnDelete();
            $table->tinyInteger('priority')->comment('low=0, medium=1, high=2')->nullable();
            $table->text('notes')->nullable();
            $table->dateTime('due_date')->nullable();
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
        Schema::dropIfExists('todo_labels');
    }
}
