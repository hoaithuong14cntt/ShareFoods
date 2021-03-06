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

if (!function_exists('published')) {
    function published($value)
    {
        if (App\Place::STATUS['published'] == $value) {
            return '<i class="fa fa-toggle-on"></i>';
        } else {
            return '<i class="fa fa-toggle-off"></i>';
        }
    }
}

if (!function_exists('chanePublished')) {
    function chanePublished($value)
    {
        if (App\Place::STATUS['published'] == $value) {
            return 'Vô hiệu';
        } else {
            return 'Duyệt';
        }
    }
}

if (!function_exists('changeStatus')) {
    function changeStatus($value)
    {
        if (App\User::STATUS['inactive'] == $value) {
            return 'Duyệt';
        } else {
            return 'Vô hiệu';
        }
    }
}

if (!function_exists('generateStorageImage')) {
    function generateStorageImage($faker)
    {
        if (env('FILESYSTEM_DRIVER') != 's3') {
            $image = $faker->image(storage_path('app/public'), 400, 300, null, false);
        } else {
            $imageUrl = $faker->imageUrl(400, 300);
            $imageName = Webpatser\Uuid\Uuid::generate()->string . '.jpg';
            Storage::put($imageName, file_get_contents($imageUrl), 'public');

            $image = $imageName;
        }

        return $image;
    }
}
