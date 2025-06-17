<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('category');
            $table->string('slug')->unique();
            $table->longText('description');
            $table->decimal('price', 9, 4);
            $table->integer('quantity')->default(0);
            $table->enum('status', ['in_stock', 'out_stock', 'pre_order'])->default(('in_stock'));
            $table->date("available_from")->nullable();
            $table->index('category');
            $table->index('price');
            //$table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
