<?php
/**
 * Home Improvement header site branding template
 *
 * @package 'home-improvement'
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

?>
<div class="site-branding">
    <?php
    $custom_logo_id = get_theme_mod('custom_logo');

    if ($custom_logo_id) : ?>
        <div class="site-logo-wrap">
            <?php the_custom_logo(); ?>
        </div>
    <?php endif; ?>
    <?php
        if (!empty(get_bloginfo('name'))):
            if (is_front_page() || is_home()) :
                ?>
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                          rel="home"><?php bloginfo('name'); ?></a></h1>
            <?php else : ?>
                <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>"
                                         rel="home"><?php bloginfo('name'); ?></a></p>
            <?php
            endif;
        endif;
    ?>
    <?php
    if (get_theme_mod('mod_data_enable_siteTagline', true)) :
        $hi_description = get_bloginfo('description', 'display');
        if ($hi_description || is_customize_preview()) :
            ?>
            <p class="site-description">
                <?php echo esc_html($hi_description); ?>
            </p>
        <?php
        endif;
    endif;
    ?>
</div><!-- .site-branding -->
