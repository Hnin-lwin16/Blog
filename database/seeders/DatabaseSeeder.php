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
        $mgmg = User::factory()->create([
            'name'=>'mgmg',
            'username'=>'mgmg'
        ]);
         $aungaung = User::factory()->create([
            'name'=>'aungaung',
            'username'=>'aungaung'
        ]);
       $front= Category::factory()->create(['name'=>'frontend','slug'=>'fronted']);
       $back=  Category::factory()->create(['name'=>'backend','slug'=>'backend']);
       
        Blog::factory(2)->create(['category_id'=>$front->id,'user_id'=>$mgmg->id]);
         Blog::factory(2)->create(['category_id'=>$back->id,'user_id'=>$aungaung->id]);
        // \App\Models\User::factory(10)->create();
       
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
