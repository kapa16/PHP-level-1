<?php

function getHtmlReview($review, $templateName)
{
    $reviewData = [
        'commentAuthor' => $review['author'],
        'comment'       => $review['comment'],
        'commentId'     => $review['id'],
        'commentDate'   => $review['date'],
    ];
    return render($templateName, $reviewData);
}

function getHtmlReviews($reviews)
{
    $reviewsHtml = '';
    foreach ($reviews as $review) {
        $reviewsHtml .= getHtmlReview($review, REVIEW_CARD_TEMPLATE);
    }
    return $reviewsHtml;
}

function getReviews()
{
    return readRecords('reviews', SORT_BY_DATE);
}

