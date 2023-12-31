<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSharesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shares', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('code');
            $table->string('name');
            $table->string('buy_date');
            $table->double('buy_salary');
            $table->string('sell_date');
            $table->double('sell_salary');
            $table->integer('no_cookies');

            //opreation from above
            $table->boolean('status');
            $table->string('profit');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shares');
    }
}