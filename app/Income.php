<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{

  protected $fillable = [
    'person_id', 'income_source', 'yearly_income',
  ];

  protected $table = 'income';

}
