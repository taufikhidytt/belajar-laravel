<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EdulevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('edulevels')->insert([
            'name' => 'TK Sederajat',
            'desc' => 'Umur 4 Sampai 6 Tahun',
        ]);
    }
}
