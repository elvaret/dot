<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Str;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $timestamp = \Carbon\Carbon::now()->toDateTimeString();
        DB::table('transaksis')->insert([
            'jenis_transaksi'  => 'client',
            'nominal_transaksi'  => '2000',
            'created_at' => $timestamp,
            'updated_at' => $timestamp
        ]);
    }
}
