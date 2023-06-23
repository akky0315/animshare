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
        for ($p = 1; $p < 11; $p++)
        {
            for ($a = 0; $a < 3; $a++)
            {
                DB::table('anims')->insert([
                    
                    'title' => 'Anim'. $p. $a,
                    'profile_id' => $p,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ]);
            }
        }
    }
}
