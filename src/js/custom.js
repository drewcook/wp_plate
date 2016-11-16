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

    // Remove any search field values
    $('input.search-field').val('');
    // Navbar search form
    $navbar_search = $('.header-navbar .search-form-wrapper');
    $navbar_search_field = $navbar_search.find('.search-form input.search-field');
    $('a.open-search').on('click', function(event) {
        event.stopPropagation();
        $('body').addClass('search-is-open');
        $navbar_search_field.attr('placeholder', '');
        $navbar_search_field.focus();
    });

    $('body').on('click', function(event) {
        $parent = $(event.target).parent();
        if (event.target.id == ('search-form-wrapper') || $parent.is('label') ) {
            return;
        }
        if ( $('body').hasClass('search-is-open') ) {
            $('body').removeClass('search-is-open');
        }
    });

});