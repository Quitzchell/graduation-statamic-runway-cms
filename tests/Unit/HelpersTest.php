<?php

test('convertToEmbedUrl correctly converts YouTube URLs', function () {
    $testUrls = [
        ["https://www.youtube.com/watch?v=OAZWXUkrjPc", "https://www.youtube.com/embed/OAZWXUkrjPc"],
        ["https://youtu.be/OAZWXUkrjPc", "https://www.youtube.com/embed/OAZWXUkrjPc"],
        ["https://www.youtube.com/embed/OAZWXUkrjPc", "https://www.youtube.com/embed/OAZWXUkrjPc"],
        ["https://m.youtube.com/watch?v=OAZWXUkrjPc", "https://www.youtube.com/embed/OAZWXUkrjPc"],
        ["https://www.youtube.com/watch?v=OAZWXUkrjPc&feature=related", "https://www.youtube.com/embed/OAZWXUkrjPc"],
        ["https://youtube.com/watch?v=OAZWXUkrjPc", "https://www.youtube.com/embed/OAZWXUkrjPc"],
        ["invalid_url", "Invalid YouTube URL"],
    ];

    foreach ($testUrls as [$input, $expected]) {
        expect(convertToEmbedYouTubeUrl($input))->toBe($expected);
    }
});
