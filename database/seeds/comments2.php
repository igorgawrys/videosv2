<?php

use Illuminate\Database\Seeder;
use App\comments;
class comments2 extends Seeder
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
            		$comments = new comments();
            	        $comments->content = $faker->text;
            	          $comments->id_ower = 1;
            	          $comments->id_video = $i;
                      	$comments->save();
            }
    }
}
