<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{

  protected $fillable = [
    'last_name', 'first_name', 'middle_name', 'sex', 'nrc_number', 'cellphone_number', 'spouse_name', 'males_under_59_months', 'females_under_59_months',
    'males_6_to_14', 'females_6_to_14', 'males_15_to_18', 'females_15_to_18', 'male_adults', 'female_adults', 'total_household_size',
  ];

  protected $table = "person";

}
