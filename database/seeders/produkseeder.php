<?php

namespace Database\Seeders;
use App\Models\produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
// use Illuminate\Support\Int;

class produkseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = \Faker\Factory::create('id_ID');
        for($i = 0; $i < 10; $i++) {
            produk::create([
                'nama_produk'   => $faker->sentence,
                'harga'         => 5000,
                'keterangan'    => Str::random(10). 'lambang'
            ]);
        }
    }
}
