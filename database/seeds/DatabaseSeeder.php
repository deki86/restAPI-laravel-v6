<?php

use App\Models\User;
use App\Models\Product;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        DB::table('category_product')->truncate();


        $usersQuantitty = 200;
        $categoriesQuantitty = 30;
        $producstQuantitty = 1000;
        $transactionsQuantitty = 200;


        factory(User::class, $usersQuantitty)->create();
        factory(Category::class, $categoriesQuantitty)->create();
        factory(Product::class, $producstQuantitty)->create()->each(
            function ($product){
                $categories = Category::all()->random(mt_rand(1,5))->pluck('id');
                $product->category()->attach($categories);
            }
        );
        factory(Transaction::class, $transactionsQuantitty)->create();


    }
}