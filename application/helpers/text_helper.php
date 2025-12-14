<?php
if (!function_exists('clean_excerpt')) {
    function clean_excerpt($str)
    {
        // Hapus tag HTML
        $str = strip_tags($str);
        // Ganti entitas HTML seperti &nbsp; dengan spasi
        $str = html_entity_decode($str, ENT_QUOTES, 'UTF-8');
        // Ganti beberapa entitas HTML khusus jika diperlukan
        $str = str_replace(['&nbsp;', '&ensp;', '&emsp;'], ' ', $str);
        // Hapus spasi berlebihan
        $str = preg_replace('/\s+/', ' ', $str);
        return trim($str);
    }
}

if (!function_exists('word_limiter')) {
    function word_limiter($str, $limit = 50, $end_char = '…')
    {
        if (trim($str) === '') {
            return $str;
        }

        $words = explode(' ', $str);
        if (count($words) <= $limit) {
            return $str;
        }

        $truncated = array_slice($words, 0, $limit);
        return implode(' ', $truncated) . $end_char;
    }
}
