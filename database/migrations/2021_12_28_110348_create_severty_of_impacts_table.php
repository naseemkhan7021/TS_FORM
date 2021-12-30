<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSevertyOfImpactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if (!Schema::hasTable('severty_of_impacts')) {
            # code...
            Schema::create('severty_of_impacts', function (Blueprint $table) {
                $table->id('severty_of_impact_id');
                $table->tinyInteger('severty_of_impact_value');
                $table->string('severty_of_impact_description', 150);
                $table->string('severty_of_impact_abbr', 20);
                $table->string('severty_of_impact_detail', 600);

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
        Schema::dropIfExists('severty_of_impacts');
    }
}
