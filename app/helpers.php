<?php

use Carbon\CarbonInterval;
use Illuminate\Support\Facades\Schema;


function formatDuration($time, $hourFormat = null, $minuteFormat = null)
{
    $hourFormat = $hourFormat ?? '%hhr %imin';
    $minuteFormat = $minuteFormat ?? '%imin';
    $time = CarbonInterval::seconds($time)->cascade()
        ->format($time >= 3600 ? $hourFormat : $minuteFormat);
    $time = str_replace(' 0min', '', $time);
    return $time;
}


function formatRating($stars, $voters)
{
    if ($voters) {
        return 'stars: ' . number_format($stars / 2 / $voters, 1) . ' ratings(' . $voters . ')';
    } else {
        return 'no rating yet!';
    }
}


function tableColumns($table)
{
    if (is_string($table)) {
        $cols = Schema::getColumnListing($table);
        $result = array_map(function ($col) use ($table) {
            return "$table.$col";
        }, $cols);
        return $result;
    } else {
        return [];
    }
}
