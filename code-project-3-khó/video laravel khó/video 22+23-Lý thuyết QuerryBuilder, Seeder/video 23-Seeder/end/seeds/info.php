<?php

use Illuminate\Database\Seeder;

class info extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info')->insert([
            ['id'=> 1, 'id_number'=>'174444','address'=>'Thường tín','phone'=>'4444444','users_id'=>4],
            ['id'=> 2, 'id_number'=>'174222','address'=>'Hưng yên','phone'=>'2222222','users_id'=>2],
            ['id'=> 3, 'id_number'=>'174111','address'=>'Nghệ an','phone'=>'1111111','users_id'=>1],
            ['id'=> 4, 'id_number'=>'174333','address'=>'Thanh hoá','phone'=>'3333333','users_id'=>3],
        ]);
    }
}
