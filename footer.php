<?php
/*Сообщения top_header, contacts*/
$posts_contacts_data = get_posts(array(
    'tag' => 'contacts_data',
    'order' => 'ASC'
));

/*все мента теги поста contacts*/
$post_contacts_meta = get_metadata('post', $posts_contacts_data[0]->ID);
?>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="footer_left col-xs-6 col-sm-6 col-md-4">
                    <div class="footer_title">© 2015 <?php echo get_bloginfo('name'); ?></div>
                </div>
                <div class="footer_center col-xs-6 col-sm-6 col-md-5">
                    <div class="footer_contacts">
                        <div class="footer_contacts_title">Наши контактные телефоны</div>
                        <div class="footer_contact footer_phone"><?php echo $post_contacts_meta['contact_phone1'][0]; ?></div>
                        <div class="footer_contact footer_phone"><?php echo $post_contacts_meta['contact_phone2'][0]; ?></div>
                    </div>
                </div>
                <div class="footer_right col-xs-12 col-sm-6 col-md-3">
                    код счетчика<!--<?php echo $posts_contacts_data['0']->post_content; ?>-->
                </div>
                <div class="footer_signature col-xs-12 col-sm-12 col-md-12">
                    Сайт разработан группой: <a href="http://vk.com/club86502380" target="_blank">Landing page</a>
                </div>
            </div>
        </div>
    </footer>

    <div class="clearfix"></div>

<div class="hidden"></div>
<!--[if lt IE 9]>
<script src="<?php echo get_template_directory_uri(); ?>/libs/html5shiv/es5-shim.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/libs/html5shiv/html5shiv.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/libs/html5shiv/html5shiv-printshiv.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/libs/respond/respond.min.js"></script>
<![endif]-->


<!--delete
    <script src="<?php echo get_template_directory_uri(); ?>/libs/waypoints/waypoints.min.js"></script>-->

<script src="<?php echo get_template_directory_uri(); ?>/libs/jquery/jquery-2.1.3.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/libs/animate/animate-css.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/libs/magnific-popup/jquery.magnific-popup.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/libs/mixitup/mixitup.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/libs/scroll2id/PageScroll2id.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/libs/owl.carousel.min/owl.carousel.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/libs/slick/slick.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/common.js"></script>
<?php wp_footer(); ?>
</body>
</html>