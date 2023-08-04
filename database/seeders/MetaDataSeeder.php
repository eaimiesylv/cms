<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MetaData;

class MetaDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $metaNames = [
            'description',
            'keywords',
            'author',
            'og:title',
            'og:description',
            'robots',
            'viewport',
            'og:url',
            
            // Add more meta names here as needed
        ];

        foreach ($metaNames as $name) {
            MetaData::create(['meta_name' => $name]);
        }

        echo "Meta data (meta_name) seeded successfully!";
    }
}
