<?php

use Illuminate\Database\Seeder;
use App\Helpers\Generator;
use App\Driver;

class DriversTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $driver = new Driver;
        $driver->id = Generator::id();
        $driver->first_name = 'Mang Jose';
        $driver->middle_name = 'Partida';
        $driver->surname = 'Naka-Pikit';
        $driver->save();

        $driver = new Driver;
        $driver->id = Generator::id();
        $driver->first_name = 'Mang Pito';
        $driver->middle_name = 'Walang';
        $driver->surname = 'Lisensiya';
        $driver->save();

        $driver = new Driver;
        $driver->id = Generator::id();
        $driver->first_name = 'Mang Juan';
        $driver->middle_name = 'Dy';
        $driver->surname = 'Marunong';
        $driver->save();

        $driver = new Driver;
        $driver->id = Generator::id();
        $driver->first_name = 'Mang Pedro';
        $driver->middle_name = 'Dy';
        $driver->surname = 'Maaasahan';
        $driver->save();

        $driver = new Driver;
        $driver->id = Generator::id();
        $driver->first_name = 'Mang Patrisiyo';
        $driver->middle_name = 'Dy';
        $driver->surname = 'Makakita';
        $driver->save();

        $driver = new Driver;
        $driver->id = Generator::id();
        $driver->first_name = 'Mang Tonio';
        $driver->middle_name = 'Nang';
        $driver->surname = 'Iiwan';
        $driver->save();
    }
}
