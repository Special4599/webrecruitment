<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->text('avt')->nullable();
            $table->string('phone')->nullable();
            $table->enum('gender',['nam','nu'])->nullable();
            $table->integer('student_code')->nullable();
            $table->date('dob')->nullable();
            $table->integer('group')->nullable();
            $table->text('random_key')->nullable();
            $table->dateTime('key_time')->nullable();
            $table->integer('active')->default(0);
            $table->rememberToken();
            $table->string('user_add')->nullable();
            $table->timestamp('created_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->nullable()->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the mi
     * grations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
