<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Contact>
 */
class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Contact::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->safeEmail(),
            'subject' => fake()->sentence(3),
            'message' => fake()->paragraphs(2, true),
            'is_read' => false,
        ];
    }

    public function read(): static
    {
        return $this->state(fn () => ['is_read' => true]);
    }

    public function unread(): static
    {
        return $this->state(fn () => ['is_read' => false]);
    }
}
