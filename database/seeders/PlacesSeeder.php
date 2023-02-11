<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PlacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $places = [
        [
            'filter_name' => 'Hotel',
            'filter_code' => 'accommodation.hotel'
        ],
        [
            'filter_name' => 'Supermarket',
            'filter_code' => 'commercial.supermarket'
        ],
        [
            'filter_name' => 'Shopping Mall',
            'filter_code' => 'commercial.shoping_mall'
        ],
        [
            'filter_name' => 'Restaurant',
            'filter_code' => 'catering.restaurant'
        ],
        [
            'filter_name' => 'Fast Food',
            'filter_code' => 'catering.fast_food'
        ],
        [
            'filter_name' => 'Cafe',
            'filter_code' => 'catering.cafe'
        ],
        [
            'filter_name' => 'Entertainment',
            'filter_code' => 'entertainment'
        ],
        [
            'filter_name' => 'Hospital',
            'filter_code' => 'healthcare.hospital'
        ],
        [
            'filter_name' => 'Heritage',
            'filter_code' => 'heritage'
        ],
        [
            'filter_name' => 'Leisure',
            'filter_code' => 'leisure'
        ],
        [
            'filter_name' => 'Diplomatic',
            'filter_code' => 'office.diplomatic'
        ],
        [
            'filter_name' => 'Parking',
            'filter_code' => 'parking'
        ],
        [
            'filter_name' => 'Services',
            'filter_code' => 'service'
        ],
        [
            'filter_name' => 'Tourism',
            'filter_code' => 'tourism'
        ],
        [
            'filter_name' => 'Public Transport',
            'filter_code' => 'public_transport'
        ],
    ];
    

    public function run()
    {
        foreach ($this->places as $place) {
            DB::table('places_filters')->insert([
                'filter_name' => $place['filter_name'],
                'filter_code' => $place['filter_code'],
                'created_at'  => Carbon::now()->toDateTimeString(),
                'updated_at'  => Carbon::now()->toDateTimeString()
            ]);
        }
    }
}
