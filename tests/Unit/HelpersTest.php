<?php

test('convertToEmbedYouTubeUrl correctly converts YouTube URLs', function () {
    $testUrls = [
        ['https://www.youtube.com/watch?v=OAZWXUkrjPc', 'https://www.youtube.com/embed/OAZWXUkrjPc'],
        ['https://youtu.be/OAZWXUkrjPc', 'https://www.youtube.com/embed/OAZWXUkrjPc'],
        ['https://www.youtube.com/embed/OAZWXUkrjPc', 'https://www.youtube.com/embed/OAZWXUkrjPc'],
        ['https://m.youtube.com/watch?v=OAZWXUkrjPc', 'https://www.youtube.com/embed/OAZWXUkrjPc'],
        ['https://www.youtube.com/watch?v=OAZWXUkrjPc&feature=related', 'https://www.youtube.com/embed/OAZWXUkrjPc'],
        ['https://youtube.com/watch?v=OAZWXUkrjPc', 'https://www.youtube.com/embed/OAZWXUkrjPc'],
    ];

    foreach ($testUrls as [$input, $expected]) {
        expect(convertToEmbedYouTubeUrl($input))->toBe($expected);
    }
});

test('convertToEmbedYouTubeUrl throws when incorrect Youtube URL is given', function () {
    $testUrls = [
        'Invalid YouTube URL',
        'https://www.example.com/not_a_youtube_video',
    ];
    foreach ($testUrls as $url) {
        // Assert: Expect the exception to be thrown
        expect(fn () => convertToEmbedYouTubeUrl($url))
            ->toThrow(InvalidArgumentException::class, 'Invalid YouTube URL');
    }
});
