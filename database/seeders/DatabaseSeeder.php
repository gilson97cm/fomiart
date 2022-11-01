<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\User;
use App\Models\Page;
use App\Models\ProductCategory;
use App\Models\Product;
use App\Models\Service;
use App\Models\Banner;
use App\Models\Information;
use App\Models\Comment;
use App\Models\Picture;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        // $this->call(UsersTableSeeder::class);
        $user_password = Hash::make('root1234');
        $shortDescription = $faker->sentence(50, true);
        $longDescription = $faker->sentence(200, true);


        $user = User::create([

                'name' => 'Georgina',
                'lastname' => 'Serrano',
                'email' => 'admin@email.com',
                'phone' => '0123456789',
                'password' => $user_password,
                'urlImage' => 'images/user.jpg'
            ]
        );

        Page::create([
            'aboutUs' => '',
            'urlImage' => 'images/placeholder.jpg',
            'abstract' => '',
            'mission' => '',
            'vision' => ''
        ]);

        Information::create([
            'email' => '',
            'phone' => '',
            'cellphone' => '',
            'address' => '',
            'wtp' => '',
            'fb' => '',
            'ig' => '',
            'tw' => '',
            'urlLogo' => 'images/placeholder.jpg',
        ]);

        //FAKE DATA
        for ($i = 0; $i < 10; $i++) {
            $category = ProductCategory::create([
                'name' => $faker->Company,
                'shortDescription' => $shortDescription,
                'status' => 1
            ]);
        }


        for ($i = 0; $i < 20; $i++) {
            $product = Product::create([
                'categoryId' => rand(1, 10),
                'name' => $faker->Company,
                'shortDescription' => $shortDescription,
                'longDescription' => $longDescription,
                'discountRate' => rand(10, 80),
                'price' => $faker->numerify('##.##'),
                'urlImage' => 'images/placeholder.jpg',
                'unit' => 'c/u',
                'code' => 'PO'.$i,
                'status' => 1,
            ]);

            for ($j = 0; $j < 10; $j++) {
                $name = $faker->firstNameMale;
                $lastname = $faker->lastname;
                $profile = substr($name, 0, 1).substr($lastname, 0, 1);
                $arrayColor = ['#84b6f4','#f9a59a','#fa5f49','#bc98f3','#f47e8e','#ff9c9c','#f45572','#6a9eda','#84b6f4','#c0a0c3'];
                $bgProfile = array_rand($arrayColor, 1);
                $comment = new Comment([
                    'name' => $name,
                    'lastname' => $lastname,
                    'profile' => $profile,
                    'bgProfile' => $arrayColor[$bgProfile],
                    'email' => 'client@email.com',
                    'rating' => rand(0, 5),
                    'message' => $shortDescription,
                    'status' => 1
                ]);
                $product->comments()->save($comment);
            }

            for ($k = 0; $k < 2; $k++) {
                $imageUpload = new Picture([
                    'urlImage' => 'images/placeholder.jpg',
                ]);
                $product->pictures()->save($imageUpload);
            }
        }


        for ($i = 0; $i < 20; $i++) {
            $service = Service::create([
                'name' => $faker->Company,
                'shortDescription' => $shortDescription,
                'longDescription' => $longDescription,
                'urlImage' => 'images/placeholder.jpg',
                'status' => 1,
            ]);
        }

        for ($i = 0; $i < 10; $i++) {
            $banner = Banner::create([
                'urlImage' => 'images/placeholder.jpg',
                'status' => 1,
            ]);
        }

        for ($i = 0; $i < 20; $i++) {
            $message = \App\Models\Message::create([
                'name' => $faker->Company,
                'email' => 'client@email.com',
                'message' => $shortDescription,
                'read' => 1,
                'status' => 1
            ]);
        }

    }
}
