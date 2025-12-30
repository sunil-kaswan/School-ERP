<?php
namespace Database\Seeders;

use App\Models\ClassType;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class MyClassesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('my_classes')->delete();
        $ct = ClassType::pluck('id')->all();

        $data = [
            ['name' => 'LKG', 'class_type_id' => $ct[2]],
            ['name' => 'UKG', 'class_type_id' => $ct[2]],
            ['name' => 'Nursery', 'class_type_id' => $ct[2]],
            ['name' => 'I', 'class_type_id' => $ct[4]],
            ['name' => 'II', 'class_type_id' => $ct[4]],
            ['name' => 'III', 'class_type_id' => $ct[4]],
            ['name' => 'IV', 'class_type_id' => $ct[4]],
            ['name' => 'V', 'class_type_id' => $ct[4]],
            ['name' => 'VI', 'class_type_id' => $ct[5]],
            ['name' => 'VII', 'class_type_id' => $ct[5]],
            ['name' => 'VIII', 'class_type_id' => $ct[5]],
            ['name' => 'IX', 'class_type_id' => $ct[6]],
            ['name' => 'X', 'class_type_id' => $ct[6]],
            ['name' => 'XI', 'class_type_id' => $ct[6]],
            ['name' => 'XII', 'class_type_id' => $ct[6]],
            ];

        DB::table('my_classes')->insert($data);

    }
}
