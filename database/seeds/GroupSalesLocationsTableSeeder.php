<?php

use Illuminate\Database\Seeder;

class GroupSalesLocationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_sales_locations')->delete();

        $groupSalesLocations = array(
          [
            'id' => 1,
            'group_details_id' => 1,
            'sales_location' => 'Village Market',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
          ],

          [
            'id' => 2,
            'group_details_id' => 1,
            'sales_location' => 'Town Market',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
          ],

          [
            'id' => 3,
            'group_details_id' => 1,
            'sales_location' => 'District Market',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
          ],

          [
            'id' => 4,
            'group_details_id' => 2,
            'sales_location' => 'Village Market',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
          ],

          [
            'id' => 5,
            'group_details_id' => 2,
            'sales_location' => 'National Market',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
          ],

          [
            'id' => 6,
            'group_details_id' => 2,
            'sales_location' => 'International Market',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
          ],

          [
            'id' => 7,
            'group_details_id' => 3,
            'sales_location' => 'Regional Market',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
          ],

        );

        DB::table('group_sales_locations')->insert($groupSalesLocations);

    }
}
