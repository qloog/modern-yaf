<?php

use Illuminate\Container\Container;

/**
 * @param null  $make
 * @param array $parameters
 * @return mixed
 */
function app($make = null, $parameters = [])
{
    if (!$make) {
        return Container::getInstance();
    }

    return Container::getInstance()->make($make, $parameters);
}

/**
 * 视图 helper
 *
 * @param       $view
 * @param array $data
 * @see Blade
 * @see https://github.com/illuminate/view
 * @return \Illuminate\Contracts\View\View
 */
function view($view, $data = [])
{
    return app(Blade::class)->display($view, $data);
}

/**
 * @param string $var
 * @param null   $default
 * @return \Illuminate\Http\Request|mixed
 */
function request($var = null, $default = null)
{
    if (is_null($var)) {
        return app('request');
    }

    if (is_array($var)) {
        return app('request')->only($var);
    }

    $value = app('request')->__get($var);

    return is_null($value) ? value($default) : $value;
}