<?php

if (!function_exists('getUid')) {
    /**
     * Generates a unique identifier using random bytes and base64 encoding.
     *
     * @return string
     */
    function getUid()
    {
        $bytes = random_bytes(10);
        $base64 = base64_encode($bytes);
        return rtrim(strtr($base64, '+/', '-_'), '=');
    }
}
