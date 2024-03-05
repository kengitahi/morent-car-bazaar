<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('slug');

            $table->text('short_description');
            $table->decimal('rating', 2, 1)->default(1.0); //

            $table->string('type');
            $table->integer('capacity');
            $table->string('steering')->default('manual');

            $table->integer('regular_price')->default(100);
            $table->integer('discounted_price')->default(90);

            $table->string('fuel')->default('gasoline'); //Can also be electric
            $table->integer('fuel_capacity')->nullable(); //If gasoline
            $table->integer('range')->nullable(); //If electric

            $table->boolean("is_available")->default(true); //Car is only available if it is not rented
            $table->date('rent_date')->nullable(); //Should be at least today, someone should bot be able to rent a car in the past
            $table->date('return_date')->nullable(); //Should be today or in the future, someone should bot be able to return a car in the past

            $table->boolean("is_featured")->default(false); //Car can be featured or not

            $table->text('images');
            $table->timestamps();
        });

        DB::raw('(fuel = "gasoline" AND fuel_capacity IS NOT NULL) OR (fuel = "electric" AND range IS NOT NULL)');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
