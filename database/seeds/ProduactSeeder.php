<?php

use App\Model\Produact;
use Illuminate\Database\Seeder;

class ProduactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Produact::class, 10)->create();

    }
}