<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDurationOfExposuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('duration_of_exposures')) {
        Schema::create('duration_of_exposures', function (Blueprint $table) {
            $table->id('duration_of_exposure_id');
            $table->tinyInteger('duration_of_exposure_value');
            $table->string('duration_of_exposure_description', 150);
            $table->string('duration_of_exposure_abbr',20);

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
        Schema::dropIfExists('duration_of_exposures');
    }
}
