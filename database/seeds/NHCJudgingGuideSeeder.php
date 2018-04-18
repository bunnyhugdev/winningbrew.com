<?php

use App\Guide;
use App\Style;
use App\JudgingGuide;
use App\JudgingCategory;
use App\JudgingCategoryMapping;

use Illuminate\Database\Seeder;

class NHCJudgingGuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $guide = new JudgingGuide;
        $guide->name = "2018 National Homebrew Competition (NHC) Styles";
        $guide->description = "The National Homebrew Competition (NHC) styles are determined by the AHA Competition Subcommittee using the Beer Judge Certification Program’s 2015 Style Guidelines and previous years’ data.";
        $guide->url = "https://www.homebrewersassociation.org/from-the-director/2018-national-homebrew-competition-styles/";
        $guide->save();

        $bjcp = Guide::where('name', '2015 BJCP Style Guidelines')->first();

        if (($handle = fopen(resource_path("/assets/bjcp/2018_NHC_Mappings.csv"), "r")) !== FALSE) {
            $last_cat = NULL;
            $sort = 0;
            while (($data = fgetcsv($handle, 0, ",")) !== FALSE) {
                if (count($data) == 2) {
                    $cat = new JudgingCategory;
                    $cat->judging_guide_id = $guide->id;
                    $cat->ordinal = $data[0];
                    $cat->name = $data[1];
                    $cat->sort_order = $data[0];
                    $cat->include_boty = TRUE;
                    $cat->include_coty = TRUE;
                    $cat->save();
                    $last_cat = $cat;
                    $sort = 0;
                } else {
                    $map = new JudgingCategoryMapping;
                    $map->judging_category_id = $last_cat->id;
                    $style = Style::where([
                        ['guide_id', '=', $bjcp->id],
                        ['subcategory', '=', $data[0]]
                    ])->first();
                    $map->style_id = $style->id;
                    $map->sort_order = $sort;
                    $sort++;
                    $map->save();
                }

            }
            fclose($handle);
        }

    }
}
