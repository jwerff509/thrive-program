<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;


class TagController extends Controller
{

  public function find(Request $request)
  {
      $term = trim($request->q);

      if (empty($term)) {
          return \Response::json([]);
      }

      $tags = Tag::search($term)->limit(5)->get();

      $formatted_tags = [];

      foreach ($tags as $tag) {
          $formatted_tags[] = ['id' => $tag->id, 'text' => $tag->name];
      }

      return \Response::json($formatted_tags);
  }

}
