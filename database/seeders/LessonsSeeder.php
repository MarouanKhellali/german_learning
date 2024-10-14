<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Level;
use App\Models\Lesson;
use App\Models\Question;
use Illuminate\Support\Facades\Storage;

class LessonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define the path to the JSON files
        $path = resource_path('data/lessons');

        // Get all JSON files in the directory
        $files = glob($path . '/*.json');

        foreach ($files as $file) {
            // Get the file content
            $json = file_get_contents($file);
            $data = json_decode($json, true);

            // Create or retrieve the level
            $level = Level::firstOrCreate(['name' => $data['level']]);

            foreach ($data['lessons'] as $lessonData) {
                // Create the lesson
                $lesson = Lesson::create([
                    'level_id' => $level->id,
                    'title' => $lessonData['title'],
                    'content' => json_encode($lessonData['content']),
                ]);

                // Create associated questions
                foreach ($lessonData['questions'] as $questionData) {
                    Question::create([
                        'lesson_id' => $lesson->id,
                        'question_text' => $questionData['question_text'],
                        'options' => json_encode($questionData['options']),
                        'correct_option' => $questionData['correct_option'],
                    ]);
                }
            }
        }
    }
}
