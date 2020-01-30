<?php

use Illuminate\Database\Seeder;
use App\Registration;

class RegistrationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Registration::create([
            'name' => 'Muhammad',
            'no_hp' => '6285819910714',
            'email' => 'agielnara17@gmail.com',
            'program_id' => 1,
            'status' => 'registrasi',
        ]);

        Registration::create([
            'name' => 'Andi',
            'no_hp' => '6285819910714',
            'email' => 'agielnara17@gmail.com',
            'program_id' => 2,
            'status' => 'bayar',
        ]);

    }
}
