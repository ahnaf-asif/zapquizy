<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        DB::table('subjects')->insert(array('name' => 'mathematics'));
        DB::table('subjects')->insert(array('name' => 'english'));
        DB::table('subjects')->insert(array('name' => 'physics'));
        DB::table('subjects')->insert(array('name' => 'physics-2'));
        DB::table('subjects')->insert(array('name' => 'physics-1'));
        DB::table('subjects')->insert(array('name' => 'chemistry'));
        DB::table('subjects')->insert(array('name' => 'chemistry-1'));
        DB::table('subjects')->insert(array('name' => 'chemistry-2'));
        DB::table('subjects')->insert(array('name' => 'biology'));
        DB::table('subjects')->insert(array('name' => 'zoology'));
        DB::table('subjects')->insert(array('name' => 'botany'));
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
};
