<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::truncate();
        Category::truncate();
       $front= Category::factory()->create(['name'=>'frontend']);
       $back=  Category::factory()->create(['name'=>'backend']);
       
        Blog::factory(2)->create(['category_id'=>$front->id]);
         Blog::factory(2)->create(['category_id'=>$back->id]);
        // \App\Models\User::factory(10)->create();
       
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
