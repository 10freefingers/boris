<?php
    /*  Render presentation of rating with, e.g. as filled and empty stars
        PARAMETERS: 
            ratingCount     - rating (can be decimal value)
            ratingMax       - count of maximum rating
            filledContent   - content for filled representation, e.g. <div>..</div>
            emptyContent     - content for empty representation, e.g. <div>..</div>
    */
    function renderRating($ratingCount, $ratingMax, $filledContent, $emptyContent) { 
        //Round rating
        $ratingCount = round($ratingCount, 0, PHP_ROUND_HALF_UP);
        //Render
        for($i=1;$i<=$ratingMax;$i++)
        {
            if($i <=  $ratingCount) { print($filledContent); }
            else { print($emptyContent); }
        }
    }
?>