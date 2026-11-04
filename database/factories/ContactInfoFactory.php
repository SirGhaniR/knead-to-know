<?php

namespace Database\Factories;

use App\Models\ContactInfo;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<ContactInfo>
 */
class ContactInfoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = ContactInfo::class;

    public function definition(): array
    {
        return [
            'email' => fake()->companyEmail(),
            'phone' => fake()->phoneNumber(),
            'address' => fake()->address(),
        ];
    }
}
