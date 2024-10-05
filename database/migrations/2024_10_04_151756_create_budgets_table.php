<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('budgets', function (Blueprint $table) {
            $table->id(); // AUTO_INCREMENT primary key
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key
            $table->foreignId('category_id')->constrained()->onDelete('cascade'); // Foreign key
            $table->decimal('budget_amount', 10, 2); // NOT NULL
            $table->date('start_date'); // NOT NULL
            $table->date('end_date'); // NOT NULL
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('budgets');
    }
};
