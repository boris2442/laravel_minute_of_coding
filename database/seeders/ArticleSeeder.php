<?php

namespace Database\Seeders;

use App\Models\Article;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Article::create([
            'title'=>'Article seeder',
            'description'=>'description seeder',
            'image'=>'images/default.jpg',
            'author_id'=>3,
            "category_id"=>2,
        ]);
        Article::create([
            'title'=>'Article seeder 2',
            'description'=>'description seeder 2',
            'image'=>'images/default.jpg',
            'author_id'=>3,
            "category_id"=>2,
        ]);
        Article::factory()->count(20)->create();
    }
}
