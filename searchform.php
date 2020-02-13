<?php
/**
 * @package ciyguytheme
 * 
 * This page powers the search form
 */
?>
 <form method="get" action="<?php echo home_url('/'); ?>">
    <input type="search" name="s" placeholder="Type and press enter" value="<?php echo get_search_query(); ?>" class="search-field">
 </form>