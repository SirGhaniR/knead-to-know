<?php

namespace Database\Seeders;

use App\Models\ContactInfo;
use Date;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ContactInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contactInfo = [
            "email" => "tastyfood@gmail.com",
            "phone" => "+62 812 3456 7890",
            "address" => "Kota Bandung, Jawa Barat",
            "created_at" => Date::now(),
            "updated_at" => Date::now(),
        ];

        ContactInfo::insert($contactInfo);
    }
}
