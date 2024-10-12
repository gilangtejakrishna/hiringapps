
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreatePekerjaansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerjaans', function (Blueprint $table) {
            $table->id('id_pekerjaan');
            $table->string('nama');
            $table->enum('status', ['aktif', 'non-aktif'])->default('aktif');
            $table->timestamps();
        });

        // Insert data pekerjaan
        DB::table('pekerjaans')->insert([
            ['nama' => 'Software Engineer', 'status' => 'aktif', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Data Analyst', 'status' => 'aktif', 'created_at' => now(), 'updated_at' => now()],
            ['nama' => 'Product Manager', 'status' => 'aktif', 'created_at' => now(), 'updated_at' => now()],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pekerjaans');
    }
}
