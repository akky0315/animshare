<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class AnimSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 11; $i++)
        {
            for ($j =1; $j < 4; $j++)
            {
                DB::table('anims')->insert([
                    'title' => 'Anim'. $i. $j,
                    'profile_id' => $i,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ]);
            }
        }
    }
}
