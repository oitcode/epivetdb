<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocalBodyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_body', function (Blueprint $table) {
            $table->increments('local_body_id');
            $table->string('name')->unique();
            $table->string('type');

            /*
             * District to which this local body belongs to. This is the
             * foreign key to district table.
             */
            $table->integer('district_id')->unsigned();

            $table->timestamps();
            $table->string('comment', 255)->nullable();
        });

        Schema::table('local_body', function (Blueprint $table) {
            /* Add foreign key to district table. */
            $table->foreign('district_id', 'fk_local_body_district')
                ->references('district_id')
                ->on('district');
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
        Schema::table('local_body', function (Blueprint $table) {
            $table->dropForeign('fk_local_body_district');
        });

        /* Drop table. */
        Schema::dropIfExists('local_body');
    }
}
