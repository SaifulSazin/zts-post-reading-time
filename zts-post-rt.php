<?php 
/**
 * Plugin Name:        ZTS Post Reading Time
 * Plugin URI:        https://zootechsolutins.com/wpplugin/post-reading-time
 * Description:       This is the basic plugin for display post reading time and post word count.
 * Version:           0.1
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Saiful Sazin
 * Author URI:        https://zootechsolutin.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://zootechsolutin.com/plugin/zts-readingti
 * Text Domain:       zts-reading-time
 * Domain Path:       /languages

 **/

 class Zts_Post_reading_Time{

    public function __construct(){
        add_action('init', array($this,'initilize'));
    }

    public function initilize (){
        add_filter('the_title',array($this,'zts_change_title'));
        add_filter('the_content',array($this,'zts_content_reading_time'));
    }

    function zts_change_title($post_title){
        return strtoupper($post_title);
    }
    function zts_content_reading_time($content_count){
        $content = strip_tags($content_count);
        $wordcount = str_word_count($content);
        $reading_time = ceil($wordcount / 200);
        return "<p style=font-wight:bold;font-size:15px;color:#04AA6D;>Post Info: {$wordcount} words, approximate reading time {$reading_time} Minute </p>". $content_count;
    }

 }
 new Zts_Post_reading_Time();
