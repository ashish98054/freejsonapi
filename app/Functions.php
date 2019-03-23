<?php

if (! function_exists('storage_url_for')) {
    function storage_url_for($src, $default = '') {
        return $src ? \Storage::url($src) : $default;
    }
}