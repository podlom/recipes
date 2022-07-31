<?php
/**
 * Canape-child functions and definitions.
 *
 * @link https://codex.wordpress.org/Functions_File_Explained
 *
 * @package Canape-child
 */

add_action('after_setup_theme', 'canapechild_theme_setup');
function canapechild_theme_setup()
{
    /** @see: https://wordpress.stackexchange.com/questions/127917/generating-po-mo-translating-files-from-scratch-in-a-wordpress-theme */
    load_theme_textdomain('canapechild', get_template_directory() . '/languages');
}