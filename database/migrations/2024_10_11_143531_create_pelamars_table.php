<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class CreatePelamarsTable extends Migration
{
    public function up()
    {
        Schema::create('pelamars', function (Blueprint $table) {
            $table->id('id_pelamar');
            $table->string('password');
            $table->string('nama_lengkap');
            $table->string('email')->unique();
            $table->timestamps();
        });

        // Insert data pelamar
        DB::table('pelamars')->insert([
            [
                'password' => Hash::make('password'),
                'nama_lengkap' => 'John Doe',
                'email' => 'johndoe@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'password' => Hash::make('password'),
                'nama_lengkap' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'password' => Hash::make('password'),
                'nama_lengkap' => 'Michael Johnson',
                'email' => 'michaeljohnson@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('pelamars');
    }
}

