<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // AUTO_INCREMENT primary key
            $table->foreignId('expense_id')->constrained()->onDelete('cascade'); // Foreign key
            $table->string('payment_method'); // NOT NULL
            $table->decimal('amount', 10, 2); // NOT NULL
            $table->date('date'); // NOT NULL
            $table->timestamps(); // created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('payments');
    }
};
