<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
                    DB::table('users')->insert([
                        'name' => $faker->name,
                        'email' => $faker->email,
                        'affiliate_link' => str_replace(" ", "", $faker->name)."_".Str::random(8),
                        'mem_package'    => $faker->randomElement(['Basic', 'Business', 'Premium']),
                        'password' => bcrypt('123456'),
                    ]);
            }
    }
}
