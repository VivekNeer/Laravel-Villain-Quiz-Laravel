<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ImageService
{
    private $unsplashAccessKey;
    private $villains = [
        'vlad' => 'Vlad the Impaler historical portrait',
        'rasputin' => 'Rasputin historical portrait',
        'genghis' => 'Genghis Khan historical portrait',
        'lucrezia' => 'Lucrezia Borgia historical portrait',
        'attila' => 'Attila the Hun historical portrait'
    ];

    public function __construct()
    {
        $this->unsplashAccessKey = env('UNSPLASH_ACCESS_KEY');
    }

    public function fetchAndSaveImages()
    {
        if (!$this->unsplashAccessKey) {
            throw new \Exception('Unsplash API key not found. Please add UNSPLASH_ACCESS_KEY to your .env file');
        }

        foreach ($this->villains as $villain => $query) {
            $this->fetchAndSaveImage($villain, $query);
        }
    }

    private function fetchAndSaveImage($villain, $query)
    {
        $response = Http::withHeaders([
            'Authorization' => 'Client-ID ' . $this->unsplashAccessKey
        ])->get('https://api.unsplash.com/photos/random', [
            'query' => $query,
            'orientation' => 'portrait'
        ]);

        if ($response->successful()) {
            $imageUrl = $response->json()['urls']['regular'];
            $imageContent = file_get_contents($imageUrl);

            // Save the image
            Storage::disk('public')->put("images/{$villain}.jpg", $imageContent);

            return true;
        }

        return false;
    }
}
