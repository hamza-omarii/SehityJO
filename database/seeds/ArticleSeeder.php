<?php

use App\Models\Article;
use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        factory(Article::class, 2000)->create();
    }
}
