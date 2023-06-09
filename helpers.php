<?php

if (! function_exists('load_asset')) {
    function load_asset(string $path) {
        include __DIR__ . "/public/assets/" . $path;
    }
}