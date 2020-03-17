<?php
/**
 * Created by PhpStorm.
 * User: Samir
 * Date: 07/02/2019
 * Time: 11:22
 */



if (!function_exists('durl')) {

    function durl($url = null)
    {
        return url('dashboard/' . $url);
    }

}

if (!function_exists('admin')) {
    function admin() {
        return auth()->guard('admin');
    }
}

if (! function_exists('session')) {
    /**
     * Get / set the specified session value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param  array|string  $key
     * @param  mixed  $default
     * @return mixed|\Illuminate\Session\Store|\Illuminate\Session\SessionManager
     */
    function session($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('session');
        }

        if (is_array($key)) {
            return app('session')->put($key);
        }

        return app('session')->get($key, $default);
    }
}

if (! function_exists('asset')) {
    /**
     * Generate an asset path for the application.
     *
     * @param  string  $path
     * @param  bool    $secure
     * @return string
     */
    function asset($path, $secure = null)
    {
        return app('url')->asset($path, $secure);
    }
}

if (!function_exists('up')) {
    function up()
    {
        return new App\Http\Controllers\Upload();
    }
}


if (!function_exists('setting')) {
    function setting()
    {
        return \App\Setting::orderBy('id', 'desc')->first();
    }
}

if (!function_exists('v_images')) {
    function v_images($ext = null)
    {
        if (is_null($ext))
            return 'image|mimes:jpg,png,jpeg,gif,bmp';

        return 'image|mimes:' . $ext;
    }
}
