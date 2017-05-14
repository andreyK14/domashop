<?php
/**
 * Displays the page section of the theme.
 *
 */
?>

<?php get_header(); ?>
    <div class="container-fluid">
        <div class="row-fluid">
            <!--my class woocommerce_content-->
            <div class="woocommerce_content col-xs-12 col-sm-8 col-md-8">
                <?php woocommerce_content(); ?>
            </div>
            <aside class="sidebar col-xs-12 col-sm-4 col-md-4">
                <?php
                if ( is_active_sidebar( 'primary' ) ) {
                    dynamic_sidebar( 'primary' );
                }// else {
                ?>
                <!--
                <section class="widget widget_search widget-widget_search">

                    <div class="widget-wrap">
                        <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

                            <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'shopping' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'shopping' ); ?>">

                        </form>
                    </div>
                </section>
                -->
                <?php
                //}
                ?>

            </aside><!-- .sidebar -->

            <!---header-right widget-area -->
						
            <div class="clearfix"></div>

        </div>
    </div>



<?php get_footer(); ?>