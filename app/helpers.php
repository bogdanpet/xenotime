<?php

if ( ! function_exists('admin_url')) {
    function admin_url($path = null)
    {
        $site_url  = env('APP_URL');
        $admin_dir = env('APP_ADMIN', 'admin');
        $path      = trim(str_replace('\\', '/', $path), ' /');

        return $site_url . '/' . $admin_dir . '/' . $path;
    }
}