<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRealStatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('real_states', function (Blueprint $table) {
            $table->id();
            $table->string('title_1')->nullable();
            $table->string('feature_image')->nullable();
            $table->text('description')->nullable();
            $table->longText('description_2')->nullable();
            $table->text('description_3')->nullable();
            $table->longText('description_4')->nullable();
            $table->string('client')->nullable();
            $table->string('year')->nullable();
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade')->nullable();
            $table->string('location')->nullable();
            $table->string('roi')->nullable();
            $table->string('social_link_1')->nullable();
            $table->string('social_link_2')->nullable();
            $table->string('social_link_3')->nullable();
            $table->text('related_images')->nullable();
            $table->string('banner_image')->nullable();
            $table->boolean('same_as_portfolio')->default(1);
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
        Schema::dropIfExists('real_states');
    }
}
