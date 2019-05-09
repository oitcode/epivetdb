<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnimalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animal', function (Blueprint $table) {
            $table->increments('animal_id');
            $table->string('name')->unique();
            $table->string('short_name')->unique();
            $table->string('code')->unique();
            $table->timestamps();

            /*
             * User who created this record. This is the foreign key to user
             * table.
             */
            $table->integer('creator_id')->unsigned();

            $table->string('comment', 255)->nullable();
        });

        Schema::table('animal', function (Blueprint $table) {
            /* Add foreign key to user table. */
            $table->foreign('creator_id', 'fk_animal_user')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animal');
    }
}
