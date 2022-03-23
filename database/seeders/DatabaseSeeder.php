<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Idea;
use App\Models\Category;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
use App\Models\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        User::factory()->create([
            'name' => 'AdminOne',
            'email' => 'admin1@email.com',
        ]);

        User::factory(19)->create();

        Category::factory()->create(['name' => 'Divide and conquer']);
        Category::factory()->create(['name' => 'Backtracking']);
        Category::factory()->create(['name' => 'Greedy Algorithms']);
        Category::factory()->create(['name' => 'Dynamic Programming']);
        Category::factory()->create(['name' => 'Random Algorithms']);

        Status::factory()->create(['name' => 'Open']);
        Status::factory()->create(['name' => 'Considering']);
        Status::factory()->create(['name' => 'In Progress']);
        Status::factory()->create(['name' => 'Implemented']);
        Status::factory()->create(['name' => 'Closed']);
        
        Idea::factory(10)->existing()->create();

         // Generate unique votes. Ensure idea_id and user_id are unique for each row
         foreach (range(1, 20) as $user_id) {
            foreach (range(1, 10) as $idea_id) {
                if ($idea_id % 2 === 0) {
                    Vote::factory()->create([
                        'user_id' => $user_id,
                        'idea_id' => $idea_id,
                    ]);
                }
            }
        }

        // Generate comments for ideas
        foreach (Idea::all() as $idea) {
            Comment::factory(5)->existing()->create(['idea_id' => $idea->id]);
        }
        
    }
}
