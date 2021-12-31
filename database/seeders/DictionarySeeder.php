<?php

namespace Database\Seeders;

use App\Models\Dictionary;
use Illuminate\Database\Seeder;

class DictionarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fileName = 'password.txt';
        $fp = @fopen($fileName, 'r'); 

        // Add each line to an array
        if ($fp) {
            $passwords = explode("\n", fread($fp, filesize($fileName)));
        }

        for ($i = 1; $i < count($passwords); $i++) {
            Dictionary::updateOrCreate(
                ['id' => $i],
                [
                    'password' => $passwords[$i],
                ]);
        }
    }
}
