<?php

namespace Database\Seeders;

use App\Models\Contact;
use Illuminate\Database\Seeder;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contact::create([
            'fname' => 'John',
            'lname' => 'Doe',
            'email' => 'john.doe@example.com',
            'phone' => '+1234567890',
            'message' => 'This is a test message from John Doe. I would like to discuss a potential project.',
            'ip_address' => '127.0.0.1',
            'location_data' => null,
            'is_read' => false,
        ]);

        Contact::create([
            'fname' => 'Jane',
            'lname' => 'Smith',
            'email' => 'jane.smith@example.com',
            'phone' => '+1987654321',
            'message' => 'Hello! I am interested in your web design services. Please contact me for more details.',
            'ip_address' => '127.0.0.1',
            'location_data' => null,
            'is_read' => true,
        ]);

        Contact::create([
            'fname' => 'Mike',
            'lname' => 'Johnson',
            'email' => 'mike.johnson@example.com',
            'phone' => '+1555123456',
            'message' => 'I need help with my portfolio website. Can you provide a quote for the project?',
            'ip_address' => '127.0.0.1',
            'location_data' => null,
            'is_read' => false,
        ]);
    }
}
