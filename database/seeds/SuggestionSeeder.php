<?php

use App\Models\Suggestion;
use Illuminate\Database\Seeder;

class SuggestionSeeder extends Seeder
{
    public function run()
    {
        factory(Suggestion::class, 25)->create();
    }
}
