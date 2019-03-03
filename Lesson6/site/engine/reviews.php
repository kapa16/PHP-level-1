<?php

function getReviews()
{
    $reviews = readRecords('reviews', SORT_BY_DATE);
}