<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CountrySateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Check if the 'countries' table is empty
        if (DB::table('countries')->count() === 0) {
            DB::table('countries')->insert([
                [
                    'name' => 'United States',
                    'slug' => 'united-states'
                ]
            ]);
        }

        // Set country ID for the states below
        $country_id = DB::table('countries')->where('slug', 'united-states')->value('id');

        //States Array
        $states = [
            'Alaska' => ['abv' => 'AK', 'slug' => Str::slug('Alaska')],
            'Alabama' => ['abv' => 'AL', 'slug' => Str::slug('Alabama')],
            'Arkansas' => ['abv' => 'AR', 'slug' => Str::slug('Arkansas')],
            'Arizona' => ['abv' => 'AZ', 'slug' => Str::slug('Arizona')],
            'California' => ['abv' => 'CA', 'slug' => Str::slug('California')],
            'Colorado' => ['abv' => 'CO', 'slug' => Str::slug('Colorado')],
            'Connecticut' => ['abv' => 'CT', 'slug' => Str::slug('Connecticut')],
            'District of Columbia' => ['abv' => 'DC', 'slug' => Str::slug('District of Columbia')],
            'Delaware' => ['abv' => 'DE', 'slug' => Str::slug('Delaware')],
            'Florida' => ['abv' => 'FL', 'slug' => Str::slug('Florida')],
            'Georgia' => ['abv' => 'GA', 'slug' => Str::slug('Georgia')],
            'Hawaii' => ['abv' => 'HI', 'slug' => Str::slug('Hawaii')],
            'Iowa' => ['abv' => 'IA', 'slug' => Str::slug('Iowa')],
            'Idaho' => ['abv' => 'ID', 'slug' => Str::slug('Idaho')],
            'Illinois' => ['abv' => 'IL', 'slug' => Str::slug('Illinois')],
            'Indiana' => ['abv' => 'IN', 'slug' => Str::slug('Indiana')],
            'Kansas' => ['abv' => 'KS', 'slug' => Str::slug('Kansas')],
            'Kentucky' => ['abv' => 'KY', 'slug' => Str::slug('Kentucky')],
            'Louisiana' => ['abv' => 'LA', 'slug' => Str::slug('Louisiana')],
            'Massachusetts' => ['abv' => 'MA', 'slug' => Str::slug('Massachusetts')],
            'Maryland' => ['abv' => 'MD', 'slug' => Str::slug('Maryland')],
            'Maine' => ['abv' => 'ME', 'slug' => Str::slug('Maine')],
            'Michigan' => ['abv' => 'MI', 'slug' => Str::slug('Michigan')],
            'Minnesota' => ['abv' => 'MN', 'slug' => Str::slug('Minnesota')],
            'Missouri' => ['abv' => 'MO', 'slug' => Str::slug('Missouri')],
            'Mississippi' => ['abv' => 'MS', 'slug' => Str::slug('Mississippi')],
            'Montana' => ['abv' => 'MT', 'slug' => Str::slug('Montana')],
            'North Carolina' => ['abv' => 'NC', 'slug' => Str::slug('North Carolina')],
            'North Dakota' => ['abv' => 'ND', 'slug' => Str::slug('North Dakota')],
            'Nebraska' => ['abv' => 'NE', 'slug' => Str::slug('Nebraska')],
            'New Hampshire' => ['abv' => 'NH', 'slug' => Str::slug('New Hampshire')],
            'New Jersey' => ['abv' => 'NJ', 'slug' => Str::slug('New Jersey')],
            'New Mexico' => ['abv' => 'NM', 'slug' => Str::slug('New Mexico')],
            'Nevada' => ['abv' => 'NV', 'slug' => Str::slug('Nevada')],
            'New York' => ['abv' => 'NY', 'slug' => Str::slug('New York')],
            'Ohio' => ['abv' => 'OH', 'slug' => Str::slug('Ohio')],
            'Oklahoma' => ['abv' => 'OK', 'slug' => Str::slug('Oklahoma')],
            'Oregon' => ['abv' => 'OR', 'slug' => Str::slug('Oregon')],
            'Pennsylvania' => ['abv' => 'PA', 'slug' => Str::slug('Pennsylvania')],
            'Rhode Island' => ['abv' => 'RI', 'slug' => Str::slug('Rhode Island')],
            'South Carolina' => ['abv' => 'SC', 'slug' => Str::slug('South Carolina')],
            'South Dakota' => ['abv' => 'SD', 'slug' => Str::slug('South Dakota')],
            'Tennessee' => ['abv' => 'TN', 'slug' => Str::slug('Tennessee')],
            'Texas' => ['abv' => 'TX', 'slug' => Str::slug('Texas')],
            'Utah' => ['abv' => 'UT', 'slug' => Str::slug('Utah')],
            'Virginia' => ['abv' => 'VA', 'slug' => Str::slug('Virginia')],
            'Vermont' => ['abv' => 'VT', 'slug' => Str::slug('Vermont')],
            'Washington' => ['abv' => 'WA', 'slug' => Str::slug('Washington')],
            'Wisconsin' => ['abv' => 'WI', 'slug' => Str::slug('Wisconsin')],
            'West Virginia' => ['abv' => 'WV', 'slug' => Str::slug('West Virginia')],
            'Wyoming' => ['abv' => 'NV', 'slug' => Str::slug('Wyoming')],
        ];

        // Check if the 'states' table is empty
        if (DB::table('states')->count() === 0) {
            foreach ($states as $state => $data) {
                DB::table('states')->insert([
                    'name' => $state,
                    'abv' => $data['abv'],
                    'slug' => $data['slug'],
                    'country_id' => $country_id
                ]);
            }
        }
    }
}
