<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\User;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create();

        Category::create([
            'fullName' => '山田 太郎',
            'gender' => '男性',
            'email' => 'test@example.com',
            'inquiry_type' => '商品の交換について',
            'detail' => '届いた商品が注文した商品ではありませんでした。商品の取り替えをお願いします。'
        ]);

        Category::factory(35)->create([
            'user_id' => $user->id,
        ]);
    }
}
