<?php

use Illuminate\Database\Seeder;
use App\Channel;
class ChaneelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create(['title'=>'php']); 
        Channel::create(['title'=>'Laravel']); 
        Channel::create(['title'=>'Wordpress']); 
        Channel::create(['title'=>'Drupal']); 
        Channel::create(['title'=>'CI']); 
    }
}
