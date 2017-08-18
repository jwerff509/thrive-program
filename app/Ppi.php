<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ppi extends Model
{

    protected $fillable = [
      'nrc_number', 'report_term_desc', 'year', 'report_term_date', 'question_1', 'question_2', 'question_3',
      'question_4', 'question_5', 'question_6', 'question_7', 'question_8', 'question_9', 'question_10', 'total_ppi_score',
    ];

    protected $table = "ppi_scores";

}
