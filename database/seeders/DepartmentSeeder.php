<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use DB;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->delete();
        $deps = [
            ['name'=>'Finance Department'],
            ['name'=>'Operations Department'],
            ['name'=>'Marketing Department'],
            ['name'=>'IT Department'],
            ['name'=>'Procurement Department'],
            ['name'=>'Customer Support'],
            ['name'=>'Dev Ops'],
            ['name'=>'Research and Development Department']
        ];
        DB::table('departments')->insert($deps);
    }
}
