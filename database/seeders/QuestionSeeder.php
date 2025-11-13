<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class QuestionSeeder extends Seeder
{
    public function run(): void
    {
        $questions = [
            [
                'content' => 'What is the capital city of the United Kingdom?',
                'option_a' => 'London',
                'option_b' => 'Paris',
                'option_c' => 'New York',
                'option_d' => 'Berlin',
                'correct_answer' => 'a',
                'explain' => 'London is the capital of the UK.',
            ],
            [
                'content' => 'Choose the correct sentence:',
                'option_a' => 'She don’t like apples.',
                'option_b' => 'She doesn’t likes apples.',
                'option_c' => 'She doesn’t like apples.',
                'option_d' => 'She not like apples.',
                'correct_answer' => 'c',
                'explain' => 'With “she”, use “doesn’t + V-infinitive”.',
            ],
            [
                'content' => 'What does “break down” mean?',
                'option_a' => 'To start a journey',
                'option_b' => 'To stop working',
                'option_c' => 'To invent something',
                'option_d' => 'To move quickly',
                'correct_answer' => 'b',
                'explain' => '“Break down” = stop working (for machines).',
            ],
            [
                'content' => 'He _____ to school every day.',
                'option_a' => 'go',
                'option_b' => 'goes',
                'option_c' => 'going',
                'option_d' => 'gone',
                'correct_answer' => 'b',
                'explain' => 'Subject “He” → verb with -s: goes.',
            ],
            [
                'content' => 'What is the synonym of “happy”?',
                'option_a' => 'Sad',
                'option_b' => 'Angry',
                'option_c' => 'Joyful',
                'option_d' => 'Tired',
                'correct_answer' => 'c',
                'explain' => '“Happy” ≈ “joyful”.',
            ],
            [
                'content' => 'If I _____ enough money, I would buy a car.',
                'option_a' => 'have',
                'option_b' => 'had',
                'option_c' => 'will have',
                'option_d' => 'has',
                'correct_answer' => 'b',
                'explain' => 'Type 2 conditional: If + past, would + V.',
            ],
            [
                'content' => 'Choose the word which has a different stress pattern:',
                'option_a' => 'teacher',
                'option_b' => 'student',
                'option_c' => 'engineer',
                'option_d' => 'doctor',
                'correct_answer' => 'c',
                'explain' => '“Engineer” has stress on the last syllable.',
            ],
            [
                'content' => 'Which word is a noun?',
                'option_a' => 'Quickly',
                'option_b' => 'Happiness',
                'option_c' => 'Running',
                'option_d' => 'Beautiful',
                'correct_answer' => 'b',
                'explain' => '“Happiness” is a noun; others are adverb/verb/adjective.',
            ],
            [
                'content' => 'Choose the correct form: “They have lived here _____ 2010.”',
                'option_a' => 'since',
                'option_b' => 'for',
                'option_c' => 'at',
                'option_d' => 'in',
                'correct_answer' => 'a',
                'explain' => '“Since” + starting point (2010).',
            ],
            [
                'content' => 'What does “look after” mean?',
                'option_a' => 'Take care of',
                'option_b' => 'Search for',
                'option_c' => 'Ignore',
                'option_d' => 'Look at carefully',
                'correct_answer' => 'a',
                'explain' => '“Look after” = take care of someone.',
            ],
            [
                'content' => 'Which word is the opposite of “expensive”?',
                'option_a' => 'Costly',
                'option_b' => 'Cheap',
                'option_c' => 'Luxury',
                'option_d' => 'High-priced',
                'correct_answer' => 'b',
                'explain' => 'Antonym of “expensive” is “cheap”.',
            ],
            [
                'content' => 'She _____ TV when I called her.',
                'option_a' => 'watched',
                'option_b' => 'was watching',
                'option_c' => 'is watching',
                'option_d' => 'has watched',
                'correct_answer' => 'b',
                'explain' => 'Past continuous for interrupted action.',
            ],
            [
                'content' => 'Choose the correct article: “I saw _____ elephant at the zoo.”',
                'option_a' => 'a',
                'option_b' => 'an',
                'option_c' => 'the',
                'option_d' => 'no article',
                'correct_answer' => 'b',
                'explain' => 'Use “an” before vowel sound: an elephant.',
            ],
            [
                'content' => 'The opposite of “success” is _____.',
                'option_a' => 'failure',
                'option_b' => 'win',
                'option_c' => 'achievement',
                'option_d' => 'goal',
                'correct_answer' => 'a',
                'explain' => 'Antonym: success ↔ failure.',
            ],
            [
                'content' => 'Which sentence is in the present perfect tense?',
                'option_a' => 'I am eating lunch.',
                'option_b' => 'I have eaten lunch.',
                'option_c' => 'I eat lunch.',
                'option_d' => 'I will eat lunch.',
                'correct_answer' => 'b',
                'explain' => '“Have + past participle” → present perfect.',
            ],
            [
                'content' => 'Choose the correct preposition: “He is afraid _____ spiders.”',
                'option_a' => 'from',
                'option_b' => 'of',
                'option_c' => 'about',
                'option_d' => 'at',
                'correct_answer' => 'b',
                'explain' => 'Fixed phrase: afraid of.',
            ],
            [
                'content' => 'She speaks English very _____.',
                'option_a' => 'good',
                'option_b' => 'well',
                'option_c' => 'better',
                'option_d' => 'best',
                'correct_answer' => 'b',
                'explain' => 'Use adverb “well” with “speaks”.',
            ],
            [
                'content' => '“Children” is the plural of _____.',
                'option_a' => 'child',
                'option_b' => 'childs',
                'option_c' => 'childern',
                'option_d' => 'chiled',
                'correct_answer' => 'a',
                'explain' => 'Irregular plural: child → children.',
            ],
            [
                'content' => 'He has worked here _____ five years.',
                'option_a' => 'since',
                'option_b' => 'for',
                'option_c' => 'at',
                'option_d' => 'during',
                'correct_answer' => 'b',
                'explain' => '“For” + a period of time (five years).',
            ],
            [
                'content' => 'What does “give up” mean?',
                'option_a' => 'Continue doing something',
                'option_b' => 'Stop doing something',
                'option_c' => 'Start again',
                'option_d' => 'Try harder',
                'correct_answer' => 'b',
                'explain' => '“Give up” = stop trying or stop doing something.',
            ],
            // ---- còn lại 15 câu tương tự ----
        ];

        // Thêm 15 câu hỏi còn lại tự động để đủ 35
        for ($i = count($questions) + 1; $i <= 35; $i++) {
            $questions[] = [
                'content' => "Sample English question {$i}: choose the correct option.",
                'option_a' => 'Option A',
                'option_b' => 'Option B',
                'option_c' => 'Option C',
                'option_d' => 'Option D',
                'correct_answer' => 'a',
                'explain' => 'Example question for demo completion.',
            ];
        }

        // Gắn quiz_id và các trường còn lại
        foreach ($questions as &$q) {
            $q['quiz_id'] = 1;
            $q['type'] = 'multiple_choice';
            $q['created_at'] = now();
            $q['updated_at'] = now();
            $q['deleted_at'] = null;
        }

        DB::table('questions')->insert($questions);
    }
}
