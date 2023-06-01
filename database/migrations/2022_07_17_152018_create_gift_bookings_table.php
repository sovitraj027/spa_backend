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
        Schema::create('gift_bookings', function (Blueprint $table) {
            $table->id();
            $table->string('from_name')->nullable();
            $table->string('email')->nullable();
            $table->string('from_phone')->nullable();
            $table->foreignId('gift_id')->nullable()->constrained('clients')->nullOnDelete();
            $table->string('package_name')->nullable();
            $table->text('message')->nullable();
            $table->date('booking_date')->nullable();
            $table->string('to_name')->nullable();
            $table->string('to_phone')->nullable();
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
        Schema::dropIfExists('gift_bookings');
    }
};
