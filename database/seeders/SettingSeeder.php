<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            'site_title' => 'Aakrithi - Modern Fashion',
            'site_description' => 'Discover curated artisanal clothing designed for comfort and elegance.',
            'meta_keywords' => 'saree, silk, fashion, ethnic wear',
            'instagram_url' => 'https://instagram.com/aakrithi',
            'facebook_url' => 'https://facebook.com/aakrithi',
            'twitter_url' => 'https://twitter.com/aakrithi',
        ];

        foreach ($settings as $key => $value) {
            Setting::updateOrCreate(['key' => $key], ['value' => $value]);
        }
    }
}
