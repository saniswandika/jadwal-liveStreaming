<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class AbsensiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        $names = [];

        for ($i = 0; $i < 10; $i++) {
            $name = $faker->name;
            $names[] = $name;
        }

        foreach ($names as $name) {
            for ($i = 0; $i < 10; $i++) {
                $periode = $faker->numberBetween(1, 12);
                $tanggalAbsen = $faker->date();
                $namaAcara = $faker->sentence(3);
                $buktiAbsen = $faker->imageUrl(200, 200);
                $namaPJ = $faker->name;
                $attendance = $faker->boolean;
                $keterangan = $faker->paragraph;

                DB::table('absensi')->insert([
                    'periode' => $periode,
                    'tanggal_absen' => $tanggalAbsen,
                    'name' => $name,
                    'nama_acara' => $namaAcara,
                    'bukti_absen' => $buktiAbsen,
                    'nama_pj' => $namaPJ,
                    'attendance' => $attendance,
                    'keterangan' => $keterangan,
                ]);
            }
        }
    }
}
