<?php

use App\Staff;
use Illuminate\Database\Seeder;

class StaffsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $staff = new Staff();
        $staff->id = 1;
        $staff->group_id = 1;
        $staff->name = 'Long';
        $staff->birthday = '1993-07-03';
        $staff->gender = 'Nam';
        $staff->phone = '012144';
        $staff->idCard = '230472342';
        $staff->email = 'long@gmail.com';
        $staff->address = 'HaNoi';
        $staff->save();
    }
}
