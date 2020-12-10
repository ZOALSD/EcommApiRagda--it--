<?php

use App\Token;
use Illuminate\Database\Seeder;

class TokenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Token::create([
        'tokenable_type' => 'App\User',
        'tokenable_id' => 1,
        'name' => 'HUAWEIDUB-LX1',
        'token' => 'bada576f746a5343f6cad2b59219fd788828bd417c7daee2c304638e66ec8e32',
        'abilities' => '["*"]' 
        ]);
    }
}