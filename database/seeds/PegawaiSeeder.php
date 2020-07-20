<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        date_default_timezone_set('Asia/Jakarta');
        $rows = 1000000;
        for($i = 0;  $i < $rows; $i++) {
        DB::table('transaksis')->insert([
            'id_pasien' => 3,
            'data' => 'DUMMIES',
            'cash' => 50000,
            'kembali' => 500,
            'total' => 49500,
            'status' => 'berhasil',
            'created_at' => now(),
            'updated_at' => now(),
            'day' => 'sabtu'
        ]);
        }
    }
}
