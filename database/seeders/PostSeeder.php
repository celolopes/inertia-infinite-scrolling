<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Post::factory()->count(100)
            ->state(new Sequence(function (Sequence $sequence) {
                return [
                    'created_at' => now()->addDays($sequence->index),
                ];
            }))
            ->create();
    }
}
