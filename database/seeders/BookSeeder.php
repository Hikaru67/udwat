<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 2; $i <= 20; $i++) {
            Book::updateOrCreate([
                'id' => $i,
                'title' => 'Nothing here',
                'category_id' => 1,
                'total_quantity' => rand(0,9),
            ]);
        }
    }
}
