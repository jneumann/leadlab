<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leads', function (Blueprint $table) {
            $table->increments('id');
						$table->integer('owner');
						$table->string('first_name', 50)->nullable();
						$table->string('last_name', 50)->nullable();
						$table->string('email', 50)->nullable();
						$table->string('phone1', 10)->nullable();
						$table->string('phone2', 10)->nullable();
						$table->string('address1')->nullable();
						$table->string('address2')->nullable();
						$table->string('city')->nullable();
						$table->string('state')->nullable();
						$table->string('zip')->nullable();
						$table->string('source', 50)->nullable();
						$table->float('income', 7, 2)->nullable();
						$table->string('status')->nullable();
						$table->text('notes')->nullable();
						$table->timestamp('created');
						$table->timestamp('updated')->nullable();
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
        Schema::dropIfExists('leads');
    }
}
