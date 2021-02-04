<?php
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
        $this->call([

            ColorSeeder::class,
            SizeSeeder::class,
            CategoriesSeeder::class,
            // AdminDataInfo::class,
            UserSeeder::class,
            ProduactSeeder::class,
            PermissionsDemoSeeder::class,
            AdsSeeder::class,
            //QRcodeOrderSeeder::class,
            // CardSeeder::class,
            AreaSeeder::class,
            VillageSeeder::class,
            // CardRequestSeeder::class,
            // CardDataSeeder::class,

        ]);
    }
}
