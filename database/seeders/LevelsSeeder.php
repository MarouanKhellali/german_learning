<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;

class LevelsSeeder extends Seeder
{
    public function run()
    {
        $levels = [
            ['name' => 'A1'],
            ['name' => 'A2'],
            ['name' => 'B1'],
            ['name' => 'B2'],
            ['name' => 'C1'],
            ['name' => 'C2'],
        ];
        

        foreach ($levels as $level) {
            Level::create($level);
        }
    }
}
