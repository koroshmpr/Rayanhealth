<?php
/*
Plugin Name: Custom Table of Contents
Description: Automatically add IDs to headings and generate a table of contents shortcode.
Version: 1.0
Author: korosh mpr
*/

// Automatically add IDs to headings
function auto_id_headings($content)
{
    $content = preg_replace_callback('/(<h[2-4](.*?))>(.*)(<\/h[2-4]>)/i', function ($matches) {
        if (!stripos($matches[0], 'id=')) {
            $matches[0] = $matches[1] . $matches[2] . ' id="' . sanitize_title($matches[3]) . '">' . $matches[3] . $matches[4];
        }
        return $matches[0];
    }, $content);
    return $content;
}

add_filter('the_content', 'auto_id_headings');

// Function to get the table of contents
function get_toc($content)
{
    // get headlines
    $headings = get_headings($content, 2, 4); // Only h2, h3, and h4
    // parse toc
    ob_start();
    echo "<div class='table-of-contents my-3 p-3 w-auto bg-light'>";
    echo "<p class='fs-4 fw-bold mb-1'>Table of Contents:</p>";
    parse_toc($headings, 0, 0);
    echo "</div>";
    return ob_get_clean();
}

function parse_toc($headings, $index, $recursive_counter)
{
    if ($recursive_counter > 60 || !count($headings)) return;

    $last_element = $index > 0 ? $headings[$index - 1] : NULL;
    $current_element = $headings[$index];
    $next_element = NULL;
    if ($index < count($headings) && isset($headings[$index + 1])) {
        $next_element = $headings[$index + 1];
    }

    if ($current_element == NULL) return;

    $tag = intval($headings[$index]["tag"]);
    $id = $headings[$index]["id"];
    $classes = isset($headings[$index]["classes"]) ? $headings[$index]["classes"] : array();
    $name = $headings[$index]["name"];

    if (isset($current_element["classes"]) && $current_element["classes"] && in_array("nitoc", $current_element["classes"])) {
        parse_toc($headings, $index + 1, $recursive_counter + 1);
        return;
    }

    if ($last_element == NULL) echo "<ul class=''>";
    if ($last_element != NULL && $last_element["tag"] < $tag) {
        for ($i = 0; $i < $tag - $last_element["tag"]; $i++) {
            echo "<ul class=' px-1'>";
        }
    }

    $li_classes = "";
    if (isset($current_element["classes"]) && $current_element["classes"] && in_array("toc-bold", $current_element["classes"])) $li_classes = " class='bold'";

    echo "<li" . $li_classes . ">";
    if (isset($current_element["classes"]) && $current_element["classes"] && in_array("toc-bold", $current_element["classes"])) {
        echo $name;
    } else {
        echo "<a class='' href='#" . $id . "'>" . $name . "</a>";
    }
    if ($next_element && intval($next_element["tag"]) > $tag) {
        parse_toc($headings, $index + 1, $recursive_counter + 1);
    }

    echo "</li>";
    if ($next_element && intval($next_element["tag"]) == $tag) {
        parse_toc($headings, $index + 1, $recursive_counter + 1);
    }

    if ($next_element == NULL || ($next_element && $next_element["tag"] < $tag)) {
        echo "</ul>";
        if ($next_element && $tag - intval($next_element["tag"]) >= 2) {
            echo "</li>";
            for ($i = 1; $i < $tag - intval($next_element["tag"]); $i++) {
                echo "</ul>";
            }
        }
    }

    if ($next_element != NULL && $next_element["tag"] < $tag) {
        parse_toc($headings, $index + 1, $recursive_counter + 1);
    }
}

function get_headings($content, $from_tag = 1, $to_tag = 6)
{
    $headings = array();
    preg_match_all("/<h([" . $from_tag . "-" . $to_tag . "])([^<]*)>(.*)<\/h[" . $from_tag . "-" . $to_tag . "]>/", $content, $matches);
    for ($i = 0; $i < count($matches[1]); $i++) {
        $headings[$i]["tag"] = $matches[1][$i];
        $att_string = $matches[2][$i];
        preg_match("/id=\"([^\"]*)\"/", $att_string, $id_matches);
        $headings[$i]["id"] = $id_matches[1];
        preg_match_all("/class=\"([^\"]*)\"/", $att_string, $class_matches);
        for ($j = 0; $j < count($class_matches[1]); $j++) {
            $headings[$i]["classes"] = explode(" ", $class_matches[1][$j]);
        }
        $headings[$i]["name"] = strip_tags($matches[3][$i]);
    }
    return $headings;
}

// TOC Shortcode
function toc_shortcode()
{
    return get_toc(auto_id_headings(get_the_content()));
}

add_shortcode('TOC', 'toc_shortcode');
