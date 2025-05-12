<?php

namespace App\Services;

class ImageService
{
    protected $unsplashApiKey;
    protected $query = 'villain character';

    public function __construct()
    {
        $this->unsplashApiKey = env('UNSPLASH_ACCESS_KEY');
    }

    public function fetchAndSaveImages()
    {
        $images = $this->fetchImagesFromUnsplash();

        if (empty($images)) {
            throw new \Exception("No images found from Unsplash.");
        }

        $savePath = public_path('images');

        if (!is_dir($savePath)) {
            mkdir($savePath, 0755, true);
        }

        foreach ($images as $index => $imageUrl) {
            $imageData = $this->downloadImage($imageUrl);

            if ($imageData === false) {
                throw new \Exception("Failed to download image from: $imageUrl");
            }

            $filename = $savePath . '/villain_' . $index . '.jpg';
            file_put_contents($filename, $imageData);
        }
    }

    protected function fetchImagesFromUnsplash()
    {
        $url = "https://api.unsplash.com/search/photos?query=" . urlencode($this->query) . "&per_page=5";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Client-ID ' . $this->unsplashApiKey
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $data = json_decode($response, true);

        if (!isset($data['results'])) {
            return [];
        }

        return array_map(function ($result) {
            return $result['urls']['regular']; // Use 'regular' image URL
        }, $data['results']);
    }

    protected function downloadImage($url)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, 'LaravelApp/1.0');
        $data = curl_exec($ch);
        curl_close($ch);

        return $data;
    }
}
