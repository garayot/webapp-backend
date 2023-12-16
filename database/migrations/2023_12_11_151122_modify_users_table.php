<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name');
            $table->renameColumn('name', 'last_name');
            $table->string('profile_image')->nullable();
            $table->enum('role', ['admin', 'user']);
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('national_ID')->unique()->nullable();
        });
    }


    public function down()
    {
        // Schema::table('users', function (Blueprint $table) {
        //     $table->dropColumn([
        //         'role',
        //         'first_name', 
        //         'profile_image',
        //         'phone',
        //         'address',
        //         'gender',
        //         'date_of_birth',
        //         'national_ID'
        //     ]);

        //     $table->renameColumn('last_name', 'name');
        // });
    }
};
