jQuery.noConflict();
jQuery(document).ready(function($){

    $lvl_1_nav = $('ul.navbar-nav > li');
    $lvl_2_nav = $('li.dropdown > ul.dropdown-menu > li');

    // Remove click to open dropdowns; change to open on hover
    $lvl_1_nav.each(function(){
        if ($(this).hasClass('dropdown')) {
            $(this).children('a').removeAttr('data-toggle').removeAttr('aria-haspopup').removeClass('dropdown-toggle');
        }
    });
    // Show level 2 items on top level hover
    $lvl_1_nav.hover(function(){
        if ($(this).hasClass('dropdown')) {
            $(this).children('ul.dropdown-menu').toggle();
        }
    });
    // Show extra levels on navigation
    $lvl_2_nav.hover(function(){
        if ($(this).hasClass('dropdown')) {
            $(this).children('ul.dropdown-menu').toggle();
        }
    });

    // Add Bootstrap 'img-responsive; class to all images on pages and posts
    $('.site-main .entry-content img').each(function(){
        $(this).addClass('img-responsive');
    });
});