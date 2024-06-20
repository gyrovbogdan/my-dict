<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dictionary>
 */
class DictionaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'words' =>
                json_encode([
                    ['word' => 'Слово', 'translation' => 'Word'],
                    ['word' => 'Собака', 'translation' => 'Dog'],
                    ['word' => 'Последствия', 'translation' => 'Consequences'],
                    ['word' => 'Ломать', 'translation' => 'Break']
                ])
        ];
    }
}
