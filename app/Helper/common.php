<?php

if (!function_exists('gender')) {
    function gender($value)
    {
        if (App\User::GENDERS['male'] == $value) {
            return '<i class="fa fa-male"></i>';
        } else {
            return '<i class="fa fa-female"></i>';
        }
    }
}

if (!function_exists('active')) {
    function active($value)
    {
        if (App\User::STATUS['active'] == $value) {
            return '<span class="label label-success">Active</span>';
        } else {
            return '<span class="label label-default">Inactive</span>';
        }
    }
}

if (!function_exists('activeUser')) {
    function activeUser($value)
    {
        if (App\User::STATUS['active'] == $value) {
            return 'Không duyệt';
        } else {
            return 'Duyệt';
        }
    }
}
