<?php

function embedVideo($url)
{
    if (str_contains($url, 'youtu')) {
        preg_match('/(youtu\.be\/|v=)([^?&]+)/', $url, $matches);
        return isset($matches[2])
            ? 'https://www.youtube.com/embed/' . $matches[2]
            : null;
    }

    return null;
}

if (!function_exists('hexToRgb')) {
    function hexToRgb(string $hex): array
    {
        $hex = ltrim($hex, '#');

        if (strlen($hex) === 3) {
            $hex = "{$hex[0]}{$hex[0]}{$hex[1]}{$hex[1]}{$hex[2]}{$hex[2]}";
        }

        return [
            hexdec(substr($hex, 0, 2)),
            hexdec(substr($hex, 2, 2)),
            hexdec(substr($hex, 4, 2)),
        ];
    }
}

if (!function_exists('getContrastColor')) {
    function getContrastColor(string $hex): string
    {
        [$r, $g, $b] = hexToRgb($hex);

        // Relative luminance (WCAG)
        $luminance = (0.299 * $r + 0.587 * $g + 0.114 * $b);

        return $luminance > 150 ? '#000000' : '#ffffff';
    }
}

if (!function_exists('categoryBadgeStyle')) {
    function categoryBadgeStyle(?string $color): array
    {
        if (!$color) {
            return [
                'background' => '#e5e7eb', // gray-200
                'text'       => '#111827', // gray-900
                'ring'       => '#d1d5db',
            ];
        }

        return [
            'background' => $color,                 // FULL COLOR
            'text'       => getContrastColor($color), // AUTO CONTRAST
            'ring'       => $color,
        ];
    }
}
