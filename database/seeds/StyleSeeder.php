<?php

use App\Guide;
use App\Style;

use Illuminate\Database\Seeder;

class StyleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guide = new Guide;
        $guide->name = "2015 BJCP Style Guidelines";
        $guide->description = "The 2015 BJCP Style Guidelines are a major revision from the 2008 edition. The goals of the new edition are to better address world beer styles as found in their local markets, keep pace with emerging craft beer market trends, describe historical beers now finding a following, better describe the sensory characteristics of modern brewing ingredients, take advantage of new research and references, and help competition organizers better manage the complexity of their events.";
        $guide->url = "https://bjcp.org/stylecenter.php";
        $guide->save();

        if (($handle = fopen(resource_path("/assets/bjcp/2015_guides.csv"), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                $style = new Style;
                $style->type = $data[0];
                $style->category = $data[1];
                $style->category_name = $data[2];
                $style->subcategory = $data[3];
                $style->subcategory_name = $data[4];
                $style->entry_instructions = $data[5] == "NULL" ? NULL : $data[5];
                $style->guide_id = $guide->id;
                $style->save();
            }
            fclose($handle);
        }

    }
}
