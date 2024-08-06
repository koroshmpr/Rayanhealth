<?php
// Function to calculate the estimated reading time
function calculate_reading_time() {
    ob_start();
    the_content();
    $content = ob_get_clean();
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200);
    return $reading_time;
}

// Shortcode function to display the reading time
function reading_time_shortcode() {
    $reading_time = calculate_reading_time();
    return $reading_time . ' minute' . ($reading_time === 1 ? '' : 's');
}

// Register the shortcode
add_shortcode('reading_time', 'reading_time_shortcode');
