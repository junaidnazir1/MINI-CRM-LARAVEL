<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompanysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companys', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('logo');
             $table->string('website');
            $table->timestamps();
        });
        DB::table('companys')->insert(['id' => 760, 'name'=>'test', 'email' => 'whatever@.com', 'logo' => 'test', 'website'=>'abc.com' ]);
        DB::table('companys')->where('id', 760)->delete();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companys');
    }
}
