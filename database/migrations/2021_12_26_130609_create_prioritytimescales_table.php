<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrioritytimescalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('prioritytimescales')) {
        Schema::create('prioritytimescales', function (Blueprint $table) {
            $table->id('prioritytimescales_id');
            $table->string('prioritytimescales_desc',50)->nullable();
            $table->string('prioritytimescales_abbr',50)->nullable();
            $table->integer('pt_value')->default(0);

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
        Schema::dropIfExists('prioritytimescales');
    }
}
