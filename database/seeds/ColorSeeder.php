<?php

use App\Model\Color;
use Illuminate\Database\Seeder;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       // factory(Color::class ,10)->create();

   for($i=1 ; $i<=13 ; $i++){

            if($i == 1){
                     Color::create([
                        'name' => 'white',
               ]); }

               if($i == 2){
               Color::create([
                  'name' => 'black',
               ]); }


            if ($i==3){
               for($z = 1 ; $z<= 5 ;$z++){ 
               Color::create([
                  'name' => 'red['.$z.'00]',
               ]); }}

            if ($i==4){
               for($z = 1 ; $z<= 5 ;$z++){
               Color::create([
                  'name' => 'yellow['.$z.'00]',
               ]);}}


            if( $i==5){
               for($z = 1 ; $z<= 5 ;$z++){
               Color::create([
                  'name' => 'green['.$z.'00]',
               ]);}}


            if( $i==6){
               for($z = 1 ; $z<= 5 ;$z++){
               Color::create([
                  'name' => 'orange['.$z.'00]',
               ]); }}


            if( $i==7){
               for($z = 1 ; $z<= 5 ;$z++){
               Color::create([
                  'name' => 'blue['.$z.'00]',
               ]); }}


            if( $i==8){
               for($z = 1 ; $z<= 5 ;$z++){
               Color::create([
                  'name' => 'brown['.$z.'00]',
               ]); }}



            if( $i==9){
               for($z = 1 ; $z<= 5 ;$z++){
               Color::create([
                  'name' => 'purple['.$z.'00]',
               ]);}}



            if( $i==10){
               for($z = 1 ; $z<= 5 ;$z++){
               Color::create([
                  'name' => 'cyan['.$z.'00]',
               ]);}}


            if( $i==11){
               for($z = 1 ; $z<= 5 ;$z++){

               ;
               Color::create([
                  'name' => 'grey['.$z.'00]',
               ]); }}


            if( $i==12){
               for($z = 1 ; $z<= 5 ;$z++){

               ;
               Color::create([
                  'name' => 'pink['.$z.'00]',
               ]);}
               }


            if( $i==13){
               for($z = 1 ; $z<= 5 ;$z++){
               Color::create([
                  'name' => 'teal['.$z.'00]',
               ]); }
               }

        }

    }
}