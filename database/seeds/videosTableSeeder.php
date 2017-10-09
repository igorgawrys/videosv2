<?php

use Illuminate\Database\Seeder;
use App\videos;
class videosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          $faker = Faker\Factory::create();
            for($i=0;$i<100;$i++)
            {
            		$videos = new videos();
 $videos->name = $faker->company;
            	          	$videos->description = $faker->text;
            	          	  	$videos->creator_id = "1";
            	          	  		$videos->images = "img/1.png";
            	          	  			$videos->videos = "videos/1.mp4";
            	          	$videos->save();
            	        
}
            
    }
}
