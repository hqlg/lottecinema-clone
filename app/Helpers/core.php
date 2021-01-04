<?php
use Illuminate\Support\Str;

function getDataExceptById($model, $id)
{
    return $model::all()->where('id', '!=', $id);
}

function getDatesIncreatedByMonths($months)
{
    $dateStrTime = strtotime("+{$months} months");
    return date("Y/m/d", $dateStrTime);
}

function getRequestAddedSlug($request)
{
    $slug = Str::slug($request['name']);
    return array_merge($request, compact('slug'));
}

function shorten($str)
{
    return substr($str, 15);
}
