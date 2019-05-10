<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistrictTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('district', function (Blueprint $table) {
            $table->increments('district_id');
            $table->string('name')->unique();

            /*
             * State to which this district belongs to. This is the foreign key
             * to state table.
             */
            $table->integer('state_id')->unsigned();

            $table->timestamps();
            $table->string('comment', 255)->nullable();
        });

        Schema::table('district', function (Blueprint $table) {
            /* Add foreign key to state table. */
            $table->foreign('state_id', 'fk_district_state')
                ->references('state_id')
                ->on('state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /* Drop the foreign key constraint. */
        Schema::table('district', function (Blueprint $table) {
            $table->dropForeign('fk_district_state');
        });

        Schema::dropIfExists('district');
    }
}
