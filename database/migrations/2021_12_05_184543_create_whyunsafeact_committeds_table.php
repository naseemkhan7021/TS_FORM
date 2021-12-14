<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWhyunsafeactCommittedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('whyunsafeact_committeds')) {
        Schema::create('whyunsafeact_committeds', function (Blueprint $table) {
            $table->id('whyunsafeact_committeds_id');
            $table->string('whyunsafeact_committeds_description',100);
            $table->string('whyunsafeact_committeds_abbr',20);


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
        Schema::dropIfExists('whyunsafeact_committeds');
    }
}
