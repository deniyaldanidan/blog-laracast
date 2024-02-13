<?php


/**
 * Will Merge input queries with existing ones
 * mergeQuery($queries=["category"=>"my-cat"])
 * 
 */
function mergeQuery(array $queries, array $except = []): string
{
    return "?" . request()->collect()->except($except)->merge($queries)->map(fn($value, $key) => "$key=$value")->values()->join("&");
}

// dd("?" . request()->collect()->merge(['category' => "my-category"])->map(fn($value, $key) => "$key=$value")->values()->join("&"));