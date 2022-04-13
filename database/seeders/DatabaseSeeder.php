<?php

namespace Database\Seeders;

use App\Http\Resources\Blog;
use App\Models\Blog as ModelsBlog;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
   * Seed the application's database.
   *
   * @return void
   */
  public function run()
  {
    ModelsBlog::factory(10)->make();
    $this->call(UserSeeder::class);
  }
}
