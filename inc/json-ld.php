<?php
/* ======================
 * Articles (Posts)
 ====================== */
/*  Notes
    Images should be at least 696 pixels wide
    Images should be in .jpg, .png, or. gif format
    Everything is required except the description
    mainEntityOfPage is recommended
*/
add_action('wp_head', 'json_ld_article');

function json_ld_article() {
    // Only on single pages
    if ( is_single() ) {
        // We need access to the post
        global $post;
        setup_postdata($post);

        // Variables
        $logo = get_template_directory_uri() . '/assets/images/logo.png';
        $logo_width = 300;
        $logo_height = 60;
        $excerpt = get_the_excerpt();
        $image = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'full');

        // Open script
        $html = '<script type="application/ld+json">';

              $html .= '{';
                $html .= '"@context": "http://schema.org",';
                $html .= '"@type": "NewsArticle",';

                $html .= '"mainEntityOfPage": {';
                  $html .= '"@type":"WebPage",';
                  $html .= '"@id": "' . get_the_permalink() . '"';
                $html .= '},';

                $html .= '"headline": "' . get_the_title() . '",';

                if ( $image )
                {
                  $html .= '"image": {';
                    $html .= '"@type": "ImageObject",';
                    $html .= '"url": "' . $image[0] . '",';
                    $html .= '"height": ' . $image[1] . ',';
                    $html .= '"width": ' . $image[2];
                  $html .= '},';
                }

                $html .= '"datePublished": "' . get_the_date('c') . '",';
                $html .= '"dateModified": "' . get_the_modified_date('c') . '",';

                $html .= '"author": {';
                  $html .= '"@type": "Person",';
                  $html .= '"name": "' . get_the_author() . '"';
                $html .= '},';

                $html .= '"publisher": {';
                  $html .= '"@type": "Organization",';
                  $html .= '"name": "' . get_bloginfo('name') . '",';
                  $html .= '"logo": {';
                    $html .= '"@type": "ImageObject",';
                    $html .= '"url": "' . $logo . '",';
                    $html .= '"width": ' . $logo_width . ',';
                    $html .= '"height": ' . $logo_height;
                  $html .= '}';
                $html .= '}';

                if ( $excerpt ) $html .= ', "description": "' . esc_attr($excerpt) . '"';
              $html .= '}';

            // Close script
            $html .= '</script>';

        echo $html;
    }
}

/* ======================
 * Website Name
 ====================== */
add_action('wp_head', 'json_ld_name');

function json_ld_name()
{
    // Open script
    $html = '<script type="application/ld+json">';

    $html .= '{';
    $html .= '"@context": "http://schema.org",';
    $html .= '"@type": "WebSite",';
    $html .= '"name": "iamsteve",';
    $html .= '"alternateName": "iamsteve",';
    $html .= '"url": "' . home_url() . '"';
    $html .= '}';

    // Close script
    $html .= '</script>';

    echo $html;
}

/* ======================
 * Logo
 ====================== */
add_action('wp_head', 'json_ld_logo');

function json_ld_logo()
{
    // Open script
    $html = '<script type="application/ld+json">';

    $html .= '{';
    $html .= '"@context": "http://schema.org",';
    $html .= '"@type": "Person",';
    $html .= '"name": "Lilybelle",';
    $html .= '"logo": "' . get_template_directory_uri() . '/dist/images/logo.png"';
    $html .= '}';

    // Close script
    $html .= '</script>';

    echo $html;
}

/* ======================
 * Searching
 ====================== */
add_action('wp_head', 'json_ld_search');

function json_ld_search()
{
    // Open script
    $html = '<script type="application/ld+json">';

    $html .= '{';
    $html .= '"@context": "http://schema.org",';
    $html .= '"@type": "WebSite",';
    $html .= '"url": "' . home_url() . '",';

    $html .= '"potentialAction": {';
    $html .= '"@type": "SearchAction",';
    $html .= '"target": "' . home_url() . '/?s={search_term_string}",';
    $html .= '"query-input": "required name=search_term_string"';
    $html .= '}';
    $html .= '}';

    // Close script
    $html .= '</script>';

    echo $html;
}

/* ======================
 * Social Links
 ====================== */
add_action('wp_head', 'json_ld_social');

function json_ld_social()
{
    // Open script
    $html = '<script type="application/ld+json">';

    $html .= '{';
    $html .= '"@context" : "http://schema.org",';
    $html .= '"@type" : "Organization",';
    $html .= '"name" : "Your Organization Name",';
    $html .= '"url" : "' . home_url() . '",';
    $html .= '"sameAs" : [';
    $html .= '"https://www.facebook.com/stemckinney",';
    $html .= '"https://www.twitter.com/irsteve",';
    $html .= '"https://plus.google.com/u/0/114129050502065289651"';
    $html .= '"https://youtube.com/user/stvmcknny"';
    $html .= '"https://uk.linkedin.com/in/steve-mckinney-5b5836102"';
    $html .= ']';
    $html .= '}';

    // Close script
    $html .= '</script>';

    echo $html;
}