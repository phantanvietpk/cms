<?php

if (! function_exists('backend_asset')) {
    /**
     * Backend Asset Url.
     *
     * @param null $path
     * @param null $secure
     *
     * @return string
     */
    function backend_asset($path = null, $secure = null)
    {
        return asset('assets/backend' . ($path ? '/' . $path : ''), $secure);
    }
}

if (! function_exists('frontend_asset')) {
    /**
     * Frontend Asset Url.
     *
     * @param null $path
     * @param null $secure
     *
     * @return string
     */
    function frontend_asset($path = null, $secure = null)
    {
        return asset('assets/frontend' . ($path ? '/' . $path : ''), $secure);
    }
}

if (! function_exists('current_query_url')) {
    /**
     * @param $attributes array|string
     * @param bool $withCurrentQueries
     *
     * @return string
     */
    function current_query_url($attributes, $withCurrentQueries = true, $except = [])
    {
        return query_url(request()->url(), $attributes, $withCurrentQueries, $except);
    }
}

if (! function_exists('query_url')) {
    /**
     * @param $url
     * @param $attributes array|string
     * @param bool $withCurrentQueries
     *
     * @return string
     */
    function query_url($url, $attributes, $withCurrentQueries = false, $except = [])
    {
        if ($withCurrentQueries) {
            $attributes = array_merge(request()->query(), is_array($attributes) ? $attributes : [$attributes]);
        }
        if ($except) {
            $attributes = array_except($attributes, $except);
        }

        return $url . '?' . http_build_query($attributes);
    }
}

if (! function_exists('config')) {
    /**
     * Get / set the specified configuration value.
     *
     * If an array is passed as the key, we will assume you want to set an array of values.
     *
     * @param  array|string  $key
     * @param  mixed  $default
     * @return mixed
     */
    function config($key = null, $default = null)
    {
        if (is_null($key)) {
            return app('config');
        }

        if (is_array($key)) {
            return app('config')->set($key);
        }

        return app('config')->get($key, $default);
    }
}