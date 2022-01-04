<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUploaddocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('uploaddocuments')) {
        Schema::create('uploaddocuments', function (Blueprint $table) {
            $table->id('uploaddocuments_id');

            // main value
            $table->string('uploaddocuments_name');
            $table->string('uploaddocuments_title');
            $table->string('uploaddocuments_location');
            $table->integer('forms16_id')->require;
            $table->integer('forms17_id')->require;


            // general values
            $table->boolean('bactive')->default(true);
            $table->integer('user_created')->default(0);
            $table->integer('user_updated')->default(0);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('uploaddocuments');
    }
}
