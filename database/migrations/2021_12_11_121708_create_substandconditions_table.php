<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubstandconditionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('substandconditions', function (Blueprint $table) {
            $table->id('substandcondition_id');
            $table->string('substandcondition_description', 150);
            $table->string('substandcondition_abbr',20);

             // general values
             $table->boolean('bactive')->default(true);
             $table->integer('user_created')->default(0);
             $table->integer('user_updated')->default(0);
             $table->timestamp('created_at')->useCurrent();
             $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('substandconditions');
    }
}
