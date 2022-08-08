<?php

namespace App\Services;

use App\Models\Article;

class ArticleService
{
  public static function load($filter)
    {
      $index = $filter ? $filter['pageIndex'] : 1;
      $pageSize = $filter ? $filter['pageSize'] : 10;

      $articles = Article::select(['id', 'title_ar', 'title_en']);

      if($filter['title_ar']){
        $articles->where('title_ar','like','%'.$filter['title_ar'].'%');
      }

      if($filter['title_en']){
        $articles->where('title_en','like','%'.$filter['title_en'].'%');
      }

      $articles->orderBy('id', 'desc');
      $result['total'] = $articles->count();

      $skip = $index == 1 ? 0 : (($index -1) * 10);
      $result['data'] = $articles->take($pageSize)->skip($skip)->get();

      return $result;
    }

    public static function loadById($id){
      $result = Article::with(['user' => function($query){
        $query->addSelect('id','email','name');
      }])
      ->where('id','=',$id)
      ->get()
      ->first();
      return $result;
    }

    public static function saveUpdate($user){
      return Article::updateOrCreate(
        ['id'=>$user['id']],
        ['id'=>$user['id'],
        'title_ar'=> $user['title_ar'],
        'title_en'=> $user['title_en'],
        'content_ar'=> $user['content_ar'],
        'content_en'=> $user['content_en'],
        'user_id'=> $user['user_id'],
        // 'active'=> $user['active'],
        ]);
    }

    public static function delete($id){
      return Article::where('id','=',$id)->delete();
    }
}