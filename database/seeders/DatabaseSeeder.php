<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
    //* リレーションを設定する時は、並び順を親から並べること（1対多）などは1が先
    $this->call([
      TestSeeder::class,
      UserSeeder::class,
      AreaSeeder::class,
      ShopSeeder::class,
      RouteSeeder::class,
      RouteShopSeeder::class,
    ]);

    //* Factoryを使ってダミーデータを作成する
    \App\Models\ContactForm::factory(100)->create();

    // \App\Models\User::factory()->create([
    //     'name' => 'Test User',
    //     'email' => 'test@example.com',
    // ]);
  }
}
