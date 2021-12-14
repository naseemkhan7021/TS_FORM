<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGendersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('genders')) {
            Schema::create('genders', function (Blueprint $table) {
                $table->id('gender_id');
                $table->string('gender_description', 20);
                $table->string('gender_abbr', 10);
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
        Schema::dropIfExists('genders');
    }
}
