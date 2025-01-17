<?php 

namespace App\Models;

use Illuminate\Support\Arr;

class Post {
    public static function all(){
        return [
            [
                'id' => 1,
                'slug' => 'title-article-1',
                'title' => 'Title Article 1',
                'author' => 'Saura Dwikana',
                'body' => 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Quia ducimus natus aut aliquid ad, nam voluptate voluptatum ab amet autem recusandae? Nulla iusto pariatur culpa animi dolorem dolor natus optio!'
            ],
            [
                'id' => 2,
                'slug' => 'title-article-2',
                'title' => 'Title Article 2',
                'author' => 'Saura Dwikana',
                'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatibus illum molestias animi deleniti ex dignissimos tempora nisi explicabo sapiente repellat. Necessitatibus asperiores amet tempore vel voluptas! Dignissimos hic obcaecati consequuntur!'
            ]
        ];
    }

    public static function find($slug): array {
        // return Arr::first(static::all(), function($post) use ($slug) {
        //     return $post['id'] == $slug;
        // });
        $post =  Arr::first(static::all(), fn($post) => $post['slug'] == $slug);

        if(!$post) {
            abort(404);
        }
        return $post;
    }
}