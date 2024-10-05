<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id(); // AUTO_INCREMENT primary key
            $table->string('name'); // NOT NULL
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key
            $table->timestamps(); // created_at and updated_at
            $table->unique(['user_id', 'name']); // UNIQUE constraint
        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
};
