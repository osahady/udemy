<?php

use Carbon\CarbonInterval;

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
