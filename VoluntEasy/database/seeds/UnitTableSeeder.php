<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Unit as Unit;

class UnitTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     * Use php artisan db:seed to run the seed files.
     *
     * @return void
     */
    public function run()
    {
        Unit::create([
            'description' => 'root',
            'comments' => 'Root unit',
        ]);

	DB::table('units_users')->delete();

	DB::table('units_users')->insert(array(
		'user_id' => '1',
		'unit_id' => '1',
	));
    }

}
