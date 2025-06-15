<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TestimonialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Testimonial::insert([
            [
                'title' => 'Testimonial Title',
                'name' => 'John Doe',
                'image' => 'https://example.com/image.jpg',
                'star' => '5',
                'date' => now()->format('Y-m-d'),
            ],
            [
                'title' => 'Another Testimonial Title',
                'name' => 'Jane Smith',
                'image' => 'https://example.com/image2.jpg',
                'star' => '4',
                'date' => now()->subDays(10)->format('Y-m-d'),
            ],
            [
                'title' => 'Third Testimonial Title',
                'name' => 'Alice Johnson',
                'image' => 'https://example.com/image3.jpg',
                'star' => '5',
                'date' => now()->subDays(20)->format('Y-m-d'),
            ],
            [
                'title' => 'Fourth Testimonial Title',
                'name' => 'Bob Brown',
                'image' => 'https://example.com/image4.jpg',
                'star' => '3',
                'date' => now()->subDays(30)->format('Y-m-d'),
            ],
            [
                'title' => 'Fifth Testimonial Title',
                'name' => 'Charlie Green',
                'image' => 'https://example.com/image5.jpg',
                'star' => '4',
                'date' => now()->subDays(40)->format('Y-m-d'),
            ],
            [
                'title' => 'Sixth Testimonial Title',
                'name' => 'Diana White',
                'image' => 'https://example.com/image6.jpg',
                'star' => '5',
                'date' => now()->subDays(50)->format('Y-m-d'),
            ],
        ]);
    }
}
