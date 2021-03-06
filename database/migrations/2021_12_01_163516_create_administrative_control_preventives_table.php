<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministrativeControlPreventivesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('administrative_control_preventives')) {
        Schema::create('administrative_control_preventives', function (Blueprint $table) {
            $table->id('administrative_control_preventive_id');
            $table->tinyInteger('administrative_control_preventive_value');
            $table->string('administrative_control_preventive_description', 150);
            $table->string('administrative_control_preventive_abbr',20);

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
        Schema::dropIfExists('administrative_control_preventives');
    }
}
