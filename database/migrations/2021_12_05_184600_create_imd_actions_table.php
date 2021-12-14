<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImdActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('imd_actions')) {
        Schema::create('imd_actions', function (Blueprint $table) {
            $table->id('imd_actions_id');
            $table->string('imd_actions_description',100);
            $table->string('imd_actions_abbr',20);


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
        Schema::dropIfExists('imd_actions');
    }
}
