<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReferGuidewordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('refer_guidewords', function (Blueprint $table) {
            $table->id('refer_guidewords_id');
            $table->string('refer_guidewords_desc');
            $table->string('refer_guidewords_abbr');

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
        Schema::dropIfExists('refer_guidewords');
    }
}
