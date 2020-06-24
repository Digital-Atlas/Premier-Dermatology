<?php
/*
Template Name: Sitemap
*/

get_header(); 
get_template_part( 'template-parts/section', 'hero' );
?>
<style>
    .sitemap {
        padding-top: 50px;
        padding-bottom: 50px;
    }
    #primary-menu {
        margin: 30px 0 0 30px; 
    }
    #primary-menu ul {
        margin-left: 30px;
    }
    #secondary-navigation { 
        margin: 0 0 30px 30px; 
    }
</style>
<section class="section sitemap">
    <div class="wrap">
        <div class="column row">
            <?php 
            echo '<div class="columns small-12" style="margin-bottom:30px;"><h4>Locations & Pages</h4></div>';
            $args = array(
                'theme_location' => 'primary',
                'menu' => 'Primary Menu',
                'container' => 'false',
                'container_class' => '',
                'container_id' => '',
                'menu_id'        => 'primary-menu',
                'menu_class'     => 'menu',
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth' => 0
            );
            wp_nav_menu($args);
            $args = array(
                'theme_location' => 'secondary',
                'menu' => 'Secondary Menu',
                'container' => 'false',
                'container_class' => '',
                'container_id' => '',
                'menu_id'        => 'secondary-menu',
                'menu_class'     => 'menu',
                'before' => '',
                'after' => '',
                'link_before' => '',
                'link_after' => '',
                'items_wrap' => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                'depth' => 0,
                'echo' => false
            );
            if( has_nav_menu( 'secondary' ) ) {
                printf ( '<nav id="secondary-navigation" class="nav-secondary" role="navigation" aria-hidden="true">%s</nav>', 
                         wp_nav_menu($args) );	
            }
            
            $medical_services = get_services_list( 7, $seo = true );
            $cosmetic_services = get_services_list( 8, $seo = true );
            echo sprintf('<div class="columns small-12" style="margin-bottom:30px;"><h4>Medical Services</h4>%s</div>', $medical_services);
            echo sprintf('<div class="columns small-12" style="margin-bottom:30px;"><h4>Cosmetic Services</h4>%s</div>', $cosmetic_services);
            echo '</div>';
            ?>
        </div>
    </div>
</section>
<?php
get_footer();