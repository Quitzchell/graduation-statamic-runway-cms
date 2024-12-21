<?php

if (!function_exists('convertToEmbedYouTubeUrl')) {
    function convertToEmbedYouTubeUrl(string $url): string
    {
        $parsedUrl = parse_url($url);

        if (!isset($parsedUrl['host']) ||
            !str_contains($parsedUrl['host'], 'youtube.com') && !str_contains($parsedUrl['host'], 'youtu.be')) {
            return "Invalid YouTube URL";
        }

        if (isset($parsedUrl['query'])) {
            parse_str($parsedUrl['query'], $queryParams);
            if (isset($queryParams['v'])) {
                return "https://www.youtube.com/embed/" . $queryParams['v'];
            }
        }

        if (isset($parsedUrl['path'])) {
            $pathSegments = explode('/', trim($parsedUrl['path'], '/'));
            $videoId = current(array_reverse($pathSegments)); // Get the last segment

            $videoId = strtok($videoId, '?&');

            return "https://www.youtube.com/embed/" . $videoId;
        }

        return "Invalid YouTube URL";
    }
}
