<?php
/*Сообщения top_header, contacts*/
$posts_contacts_data = get_posts(array(
    'tag' => 'contacts_data,header_data',
    'order' => 'ASC'
));

/*id Сообщения: top_header*/
$posts_top_header_id = $posts_contacts_data[0]->ID;

/*id Сообщения: contacts.*/
$posts_contacts_id = $posts_contacts_data[1]->ID;

/*top header(данные). Все мета*/
$post_top_header_meta = get_metadata('post', $posts_top_header_id);

/*все мента теги поста contacts*/
$post_contacts_meta = get_metadata('post', $posts_contacts_id);

/*слайды*/
/*Сообщения top_header, contacts*/
$posts_slides_data = get_posts(array(
    'category_name' => 'slider',
    'order' => 'ASC'
));
?>
<!DOCTYPE html>
<html class="no-js" style="margin: 0 !important;">
<head>
    <meta charset="utf-8" />
    <title><?php echo get_bloginfo('name'); ?></title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/libs/bootstrap/bootstrap-grid.min.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/libs/animate/animate.min.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/libs/linea/styles.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/libs/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/libs/slick/slick.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/fonts.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/main.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/media.css" />
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css" />
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    <header class="main_head">
        <div class="top_head">
            <div class="container">
                <div class="row">
                    <div class="site_logo col-xs-12 col-md-3">
                        <div class="site_logo_container"></div>
                        <h1 class="site_logo_descr"><?php echo get_bloginfo('name'); ?></h1>
                    </div>

                    <div class="where_travel col-xs-6 col-sm-4 col-md-3">
                        <div class="where_travel_container">
                            <div class="where_travel_title"><?php echo $post_top_header_meta["header_which_house_text1"][0]; ?></div>
                            <div class="where_travel_descr"><?php echo $post_top_header_meta["header_which_house_text2"][0]; ?></div>
                        </div>
                        <div class="border_img"></div>
                    </div>

                    <div class="site_phone col-xs-6 col-sm-4 col-md-3">
                        <div class="site_phone_inner">
                            <div class="site_phone_icon">
                                <img src="<?php echo get_template_directory_uri(); ?>/img/24.png" width="50" alt="">
                            </div>
                            <div class="site_phone_content">
                                <div class="site_phone_title"><?php echo $post_top_header_meta["header_phone_text"][0]; ?></div>
                                <div class="site_phone_descr"><?php echo $post_contacts_meta["contact_phone1"][0]; ?></div>
                                <div class="site_phone_descr_addition"><?php echo $post_top_header_meta["header_phone_time_text"][0]; ?></div>
                            </div>
                        </div>
                    </div>

                    <div class="site_offices col-xs-12 col-sm-4 col-md-3">
                        <div class="site_offices_inner">
                            <div class="border_img"></div>
                            <div class="site_offices_container">
                                <div class="site_offices_icon">
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/offices.png" width="50" alt="">
                                </div>
                                <div class="site_offices_content">
                                    <div class="site_offices_title"><?php echo $post_top_header_meta["header_where_order_text1"][0]; ?></div>
                                    <div class="site_offices_descr"><a href="#contacts"><?php echo $post_top_header_meta["header_where_order_text2"][0]; ?></a></div>
                                    <div class="site_offices_descr_addition"><a class="link_order_call" href="#order_call">заказать звонок</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hidden">
                        <div id="order_call" class="order_call_header">
                            <div class="modal-box-content">
                                <button class="mfp-close" type="button" title="Закрыть (Esc)">×</button>
                                <div class="call_block">
                                    <p class="call_title">Заказать звонок</p>
                                    <p class="call_descr">Мы свяжемся с Вами</p>
                                    <div class="call_form_wrap">
                                        <form class="call_form" method="POST" action="">
                                            <input class="call_form_name" type="text" required="" placeholder="*Введите имя" name="name">
                                            <input class="call_form_phone" type="text" required="" placeholder="*Введите телефон" name="phone">
                                            <textarea placeholder="Сообщение" name="message"></textarea>
                                            <input type="submit" value="Заказать звонок">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!--end .row-->
            </div><!--end .container-->
        </div>
        <div class="bottom_header">
            <div id="owl-header-gallery" class="gallery_header">
                <?php
                /*foreach($posts_slides_data as $post_slides_data) {
                    ?>
                    <div class="gallery_slide">
                            <div class="slide_content">
                                    <div class="slide_title"><?php echo $post_slides_data->post_title; ?></div>
                                    <div class="slide_descr"><?php echo $post_slides_data->post_content; ?></div>
                            </div>
                            <img src="<?php echo get_field('img', $post_slides_data->ID); ?>" alt=""/>
                    </div>
                <?php }*/ ?>
								<div class="gallery_slide">
									<div class="slide_content">
										<div class="slide_title"><?php echo $post_slides_data->post_title; ?></div>
										<div class="slide_descr"><?php echo $post_slides_data->post_content; ?></div>
									</div>
									<img src="<?php echo get_template_directory_uri(); ?>/img/bg-header.jpg" alt=""/>
								</div>
            </div>
            <nav class="menu_wrap">
                <button class="main_mnu_navbar"><i class="fa fa-bars"></i></button>
                <div class="clearfix"></div>
                <div class="main_menu_container">
                    <ul id="main_menu" class="menu">
                        <li class="main_mnu_btn"><a href="#popular">Популярные</a><a class="icon"></a></li>
                        <li class="main_mnu_btn"><a href="#services">Услуги</a><a class="icon"></a></li>
                        <li class="main_mnu_btn"><a href="#steps">Этапы работ</a><a class="icon"></a></li>
                        <li class="main_mnu_btn"><a href="#catalog">Каталог</a><a class="icon"></a></li>
                        <li class="main_mnu_btn"><a href="#portfolio">Портфолио</a><a class="icon"></a></li>
                        <li class="main_mnu_btn"><a href="#clients">Клиенты</a><a class="icon"></a></li>
                        <li class="main_mnu_btn"><a href="#contacts">Контакты</a><a class="icon"></a></li>
                    </ul>
                </div><!--.main_menu_container-->
            </nav><!--end .menu_wrap-->
            <!--</nav>end .top_mnu-->
        </div>
    </header>