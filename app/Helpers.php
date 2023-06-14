<?php

if(!function_exists('assets')) {
    function assets(string $path) {
        return URL::to('assets/'.$path);
    }
}

if(!function_exists('css')) {
    function css(string $path) {
        return assets('css/'.$path);
    }
}
if(!function_exists('js')) {
    function js(string $path) {
        return assets('js/'.$path);
    }
}