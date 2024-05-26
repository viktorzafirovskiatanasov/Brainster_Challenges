<?php
function getRowColor($registrated_till) {
    
    $registrated_till_date = new DateTime($registrated_till);
    $current_date = new DateTime();

    
    $interval = $current_date->diff($registrated_till_date);
    $months_difference = $interval->y * 12 + $interval->m;

    
    if ($current_date > $registrated_till_date) {
        return 'danger'; 
    } elseif ($months_difference < 1) {
        return 'warning';
    } else {
        return 'dark'; 
    }
}