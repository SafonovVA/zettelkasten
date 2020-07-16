<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notes', function (Blueprint $table) {
            $table->id();
            $table->string('parent_number')->nullable()->default(null);
            $table->integer('self_number')->nullable()->default(null);
            $table->string('common_number')->nullable()->default(null);
            $table->string('title');
            $table->text('content');
            $table->foreignId('parent_id')->nullable()->constrained('notes')->onDelete('cascade');
            $table->boolean('has_child')->default(false);
            $table->foreignId('user_id')->constrained();
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
        Schema::dropIfExists('notes');
    }
}
