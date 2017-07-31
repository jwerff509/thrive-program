<?php

use Illuminate\Database\Seeder;
//use Illuminate\Database\Eloquent\Model;

class GroupDetailsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('group_details')->delete();

        $groupDetails = array(
          [
            'id' => 1,
            'group_id' => 1,
            'report_term' => 1,
            'report_term_description' => 'Jan. - Mar.',
            'year' => '2017',
            'savings_group' => '0',
            'account_balance' => '0.00',
            'producers_group' => '0',
            'value_chain' => 'Value Chain 1',
            'value_chain_unit' => '$',
            'sales_price' => '49.99',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
          ],

          [
            'id' => 2,
            'group_id' => 2,
            'report_term' => 2,
            'report_term_description' => 'Apr. - Jun.',
            'year' => '2017',
            'savings_group' => '1',
            'account_balance' => '1000.00',
            'producers_group' => '0',
            'value_chain' => 'Value Chain 2',
            'value_chain_unit' => '$',
            'sales_price' => '25.99',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
          ],

          [
            'id' => 3,
            'group_id' => 1,
            'report_term' => 3,
            'report_term_description' => 'Jul. - Sep.',
            'year' => '2017',
            'savings_group' => '1',
            'account_balance' => '500.00',
            'producers_group' => '1',
            'value_chain' => 'Value Chain 3',
            'value_chain_unit' => '$',
            'sales_price' => '19.99',
            'created_at' => new DateTime,
            'updated_at' => new DateTime,
          ]
        );

        DB::table('group_details')->insert($groupDetails);

    }
}
