<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User; 
use App\Models\Category; 
use App\Models\Post; 

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        

        // User::create([
        //     'name' => 'Alfa Rizki',
        //     'email' => 'pastikepo@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        // User::create([
        //     'name' => 'Anindita',
        //     'email' => 'Anindita@gmail.com',
        //     'password' => bcrypt('12345')
        // ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Web Progamming',
            'slug' => 'web-progamming',
            
        ]);

        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
            
        ]);

        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',

        ]);

        Post::factory(10)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, magni. Enim veniam minima cupiditate iste. Aperiam at rerum modi. Reiciendis consequatur minus unde minima beatae.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, magni. Enim veniam minima cupiditate iste. Aperiam at rerum modi. Reiciendis consequatur minus unde minima beatae. Voluptates consequatur ratione beatae magnam expedita fuga ducimus animi, error id magni blanditiis exercitationem illum nobis nam aut dolore sunt reprehenderit voluptate, vitae tempore laboriosam quae? Quidem in rerum provident unde possimus voluptatum officia quam veritatis praesentium consequatur quia odio, minima, optio placeat ullam. Cumque, dolorum voluptate. Placeat voluptas quis, culpa a nam porro fuga voluptatibus quidem obcaecati hic nulla nemo dolore eius in alias, minus quisquam. Beatae reiciendis dolore iusto odio unde sunt quasi!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Dua',
        //     'slug' => 'judul-ke-dua',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, magni. Enim veniam minima cupiditate iste. Aperiam at rerum modi. Reiciendis consequatur minus unde minima beatae.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, magni. Enim veniam minima cupiditate iste. Aperiam at rerum modi. Reiciendis consequatur minus unde minima beatae. Voluptates consequatur ratione beatae magnam expedita fuga ducimus animi, error id magni blanditiis exercitationem illum nobis nam aut dolore sunt reprehenderit voluptate, vitae tempore laboriosam quae? Quidem in rerum provident unde possimus voluptatum officia quam veritatis praesentium consequatur quia odio, minima, optio placeat ullam. Cumque, dolorum voluptate. Placeat voluptas quis, culpa a nam porro fuga voluptatibus quidem obcaecati hic nulla nemo dolore eius in alias, minus quisquam. Beatae reiciendis dolore iusto odio unde sunt quasi!',
        //     'category_id' => 1,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Tiga',
        //     'slug' => 'judul-ke-tiga',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, magni. Enim veniam minima cupiditate iste. Aperiam at rerum modi. Reiciendis consequatur minus unde minima beatae.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, magni. Enim veniam minima cupiditate iste. Aperiam at rerum modi. Reiciendis consequatur minus unde minima beatae. Voluptates consequatur ratione beatae magnam expedita fuga ducimus animi, error id magni blanditiis exercitationem illum nobis nam aut dolore sunt reprehenderit voluptate, vitae tempore laboriosam quae? Quidem in rerum provident unde possimus voluptatum officia quam veritatis praesentium consequatur quia odio, minima, optio placeat ullam. Cumque, dolorum voluptate. Placeat voluptas quis, culpa a nam porro fuga voluptatibus quidem obcaecati hic nulla nemo dolore eius in alias, minus quisquam. Beatae reiciendis dolore iusto odio unde sunt quasi!',
        //     'category_id' => 2,
        //     'user_id' => 1
        // ]);

        // Post::create([
        //     'title' => 'Judul Ke Empat',
        //     'slug' => 'judul-ke-empat',
        //     'excerpt' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, magni. Enim veniam minima cupiditate iste. Aperiam at rerum modi. Reiciendis consequatur minus unde minima beatae.',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Suscipit, magni. Enim veniam minima cupiditate iste. Aperiam at rerum modi. Reiciendis consequatur minus unde minima beatae. Voluptates consequatur ratione beatae magnam expedita fuga ducimus animi, error id magni blanditiis exercitationem illum nobis nam aut dolore sunt reprehenderit voluptate, vitae tempore laboriosam quae? Quidem in rerum provident unde possimus voluptatum officia quam veritatis praesentium consequatur quia odio, minima, optio placeat ullam. Cumque, dolorum voluptate. Placeat voluptas quis, culpa a nam porro fuga voluptatibus quidem obcaecati hic nulla nemo dolore eius in alias, minus quisquam. Beatae reiciendis dolore iusto odio unde sunt quasi!',
        //     'category_id' => 2,
        //     'user_id' => 2
        // ]);
    }
}
