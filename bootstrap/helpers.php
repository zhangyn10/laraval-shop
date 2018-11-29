<?php
/**
 * Created by PhpStorm.
 * User: zhangyanan
 * Date: 2018/11/27
 * Time: 2:39 PM
 */

function route_class()
{
    return str_replace('.', '-', Route::currentRouteName());
}
