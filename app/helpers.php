<?php

use Statamic\Facades\AssetContainer;

if (!function_exists('convertToEmbedYouTubeUrl')) {
    function convertToEmbedYouTubeUrl(string $url): string
    {
        $parsedUrl = parse_url($url);

        if (!isset($parsedUrl['host']) ||
            !str_contains($parsedUrl['host'], 'youtube.com') && !str_contains($parsedUrl['host'], 'youtu.be')) {
            throw new InvalidArgumentException('Invalid YouTube URL');
        }

        if (isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $queryParams);
            if (isset($queryParams['v'])) {
                return 'https://www.youtube.com/embed/' . $queryParams['v'];
            }
        }

        if (isset($parsedUrl['path'])) {
            $pathSegments = explode('/', trim($parsedUrl['path'], '/'));
            $videoId = current(array_reverse($pathSegments)); // Get the last segment

            $videoId = strtok($videoId, '?&');

            return 'https://www.youtube.com/embed/' . $videoId;
        }

        throw new InvalidArgumentException('Invalid YouTube URL');
    }
}

if (!function_exists('assetFocusPoints')) {
    function assetFocusPoints(string $containerName, string $assetPath): ?array
    {
        $asset = AssetContainer::find($containerName)
            ->assets()
            ->where('path', $assetPath)
            ->first();

        if (!$asset) {
            return null;
        }

        $focusData = $asset->data()['focus'] ?? null;

        if (!$focusData) {
            return null;
        }

        $coordinates = array_slice(explode('-', $focusData), 0, 2);

        return array_map(fn($coord) => $coord . '%', $coordinates);
    }
}


