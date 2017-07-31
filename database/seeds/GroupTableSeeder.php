<?php

use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->delete();

        $groups = array(
          [
            'id' => 1,
            'name' => 'Group 1',
            'area_program' => 'AP 1',
            'village_name' => 'Village 1',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
          ],

          [
            'id' => 2,
            'name' => 'Group 2',
            'area_program' => 'AP 2',
            'village_name' => 'Village 2',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
          ],

          [
            'id' => 3,
            'name' => 'Group 3',
            'area_program' => 'AP 3',
            'village_name' => 'Village 3',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
          ]
        );

        DB::table('groups')->insert($groups);

    }
}
