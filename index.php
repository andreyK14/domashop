<?php
    get_header();
    /*данные о категории*/
    $category_data = get_category_by_slug( 'sec_popular' );

    /*сообщения секции*/
    $postsSecPopular = get_posts(array(
        'category_name' => 'sec_popular',
        'numberposts' => 30,
        'order' => 'ASC'
    ));
?>
    <section id="popular" class="sec_popular">
            <div class="section_header">
                <h3 class="title"><?php echo $category_data->name; ?></h3>
                <div class="descr"><?php echo $category_data->description; ?></div>
            </div>
            <div class="section_content">
                <?php
                $post_i = 0;
                foreach($postsSecPopular as $postSecPopular) {
                    ++$post_i; //увелечение сразу до нужного значения
                    $post_popular_meta = get_metadata('post', $postSecPopular->ID);
                ?>
                <div id="<?php echo 'tour' . $post_i; ?>" class="tour">
                    <div class="tour_img"><img src="<?php echo get_field('img1', $postSecPopular->ID); ?>" alt=""/></div>
                    <div class="tour_content">
                        <h3 class="tour_title"><a href="#"><?php echo $postSecPopular->post_title; ?></a></h3>
                        <div class="tour_descr"><?php echo $postSecPopular->post_excerpt; ?></div>
                        <div class="tour_price">От <span class="cost"><?php echo $post_popular_meta['popular_price'][0]; ?> руб.</span></div>
                    </div>
                    <div class="tour_slide">
                        <h3 class="tour_slide_title"><?php echo $postSecPopular->post_title; ?></h3>
                        <div class="tour_slide_descr"><?php echo $post_popular_meta['popular_home_descr2'][0]; ?></div>
                        <div class="tour_slide_readmore"><a href="#" class="popup_content">подробней</a></div>
                    </div>
                    <div class="hidden">
                        <div class="more_offer">
                            <div class="modal-box-content">
                                <button class="mfp-close" type="button" title="Закрыть (Esc)">×</button>
                                <div class="more_offer_title"><?php echo $postSecPopular->post_title; ?></div>
                                <div class="more_offer_descr">
                                    <div class="more_offer_descr_text">
                                        <?php echo $post_popular_meta['popular_descr1'][0]; ?>
                                    </div>
                                    <div class="more_offer_descr_imgs">
                                        <div class="container">
                                            <div class="row">
                                                <div class="more_offer_descr_img1 col-xs-12 col-md-6"><img src="<?php echo get_field('img1', $postSecPopular->ID); ?>" alt=""/></div>
                                                <div class="more_offer_descr_img2 col-xs-12 col-md-6"><img src="<?php echo get_field('img2', $postSecPopular->ID); ?>" alt=""/></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="more_offer_descr">
                                    <div class="more_offer_descr_text">
                                        <?php echo $post_popular_meta['popular_descr2'][0]; ?>
                                    </div>
                                    <div class="more_offer_descr_imgs">
                                        <div class="container">
                                            <div class="row">
                                                <div class="more_offer_descr_img1 col-xs-12 col-md-6"><img src="<?php echo get_field('img3', $postSecPopular->ID); ?>" alt=""/></div>
                                                <div class="more_offer_descr_img2 col-xs-12 col-md-6"><img src="<?php echo get_field('img4', $postSecPopular->ID); ?>" alt=""/></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php echo $postSecPopular->post_content; ?>
                                <div class="call_block">
                                    <div class="call_title">Заказать звонок</div>
                                    <div class="call_descr">Мы свяжемся с Вами</div>
                                    <div class="call_form_wrap">
                                        <form class="call_form" action="" method="POST">
                                            <input class="call_form_name" type="text" name="name" placeholder="*Введите имя" required>
                                            <input class="call_form_phone" type="text" name="phone" placeholder="*Введите телефон" required>
                                            <input type="submit" value="Заказать звонок">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>>
                    </div>
                </div>
                <?php } ?>
                <div class="clearfix"></div>

            </div>
        </section>
<?php
$category_data = get_category_by_slug( 'sec_services' );
/*сообщения секции*/
$postsSecPopular = get_posts(array(
    'category_name' => 'sec_services',
    'order' => 'ASC'
));
?>
        <section id="services" class="sec_services">
            <div class="section_header">
                <h3 class="title"><?php echo $category_data->name; ?></h3>
                <div class="descr"><?php echo $category_data->description; ?></div>
            </div>
            <div class="section_content">
                <div class="all_servises">
                    <div class="container">
                        <div class="row">
                            <div class="service_build">
                                <h4 class="service_title"><?php echo $postsSecPopular[0]->post_title; ?></h4>
                                <div class="service_img"><?php echo get_the_post_thumbnail($postsSecPopular[0]->ID); ?></div>
                                <div class="service_list">
                                    <?php echo $postsSecPopular[0]->post_content; ?>
                                </div>
                            </div>
                            <div class="service_projection">
                                <h4 class="service_title"><?php echo $postsSecPopular[1]->post_title; ?></h4>
                                <div class="service_img"><?php echo get_the_post_thumbnail($postsSecPopular[1]->ID); ?></div>
                                <div class="service_list">
                                    <?php echo $postsSecPopular[1]->post_content; ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    <?php
    $category_data = get_category_by_slug( 'sec_steps' );
    /*сообщения секции*/
    $postsSecSteps = get_posts(array(
    'category_name' => 'sec_steps',
    'order' => 'ASC'
    ));
    ?>
        <section id="steps" class="sec_steps">
            <div class="section_header">
                <h3 class="title"><?php echo $category_data->name; ?></h3>
                <div class="descr"><?php echo $category_data->description; ?></div>
            </div>
            <div class="section_content">
                <div class="all_steps">
                    <div class="steps_work">
                        <div class="container">
                            <div class="row">
                                <?php
                                $step_i = 0;
                                foreach($postsSecSteps as $postSecSteps) {
                                    ++$step_i;
                                    $class_number_step = 'step' . $step_i;
                                    ?>
                                    <div class="step_work <?php echo $class_number_step; ?>">
                                        <div class="step_work_inner">
                                            <div class="step_title"><?php echo $postSecSteps->post_title; ?></div>
                                            <div class="step_img"><?php echo get_the_post_thumbnail($postSecSteps->ID); ?></div>
                                        </div>
                                        <p class="number_step"><?php echo $postSecSteps->post_content; ?></p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    $category_data = get_category_by_slug( 'sec_catalog' );

    /*Кнопки фильтрации*/
    $post_filter_buttons = get_posts(array(
        'tag' => 'filter_buttons',
        'order' => 'ASC'
    ));

    /*сообщения секции*/
    $postsSecCatalog = get_posts(array(
        'category_name' => 'sec_catalog',
        'order' => 'ASC',
        'numberposts' => 30,
    ));
    ?>
        <section id="catalog" class="sec_catalog">
        <div class="section_header">
            <h3 class="title"><?php echo $category_data->name; ?></h3>
            <div class="descr"><?php echo $category_data->description; ?></div>
        </div>
        <div class="container">
        <div class="section_content row">
        <div class="filter_div controls">
            <?php echo $post_filter_buttons[0]->post_content; ?>
        </div>
        <div id="catalog_grid">
            <?php
            foreach($postsSecCatalog as $postSecCatalog) {
                $tags = wp_get_post_tags($postSecCatalog->ID);
                $tags_names = ''; /*будет содержать названия тегов разеделенные проеблом*/
                if ($tags) {
                    foreach ($tags as $tag) {
                        $tags_names .= $tag->name . ' ';
                    }
                }
            ?>
            <div class="mix col-xs-6 col-sm-3 col-md-3 catalog_item <?php echo $tags_names; ?>">
                <img src="<?php echo get_field('img_cat_1', $postSecCatalog->ID); ?>" alt="">
                <div class="cat_item_cont">
                    <h3><?php echo $postSecCatalog->post_title; ?></h3>
                    <p class="short_descr"><?php echo $postSecCatalog->post_excerpt; ?></p>
                    <a href="#" class="popup_content">Посмотреть</a>
                </div>
                <div class="hidden">
                    <div class="container">
                        <div class="row">
                            <div class="cat_descr">
                                <div class="modal-box-content">
                                    <button class="mfp-close" type="button" title="Закрыть (Esc)">×</button>
                                    <h3><?php echo $postSecCatalog->post_title; ?></h3>
                                    <div class="cat_descr_full">
                                        <div class="cat_descr_img col-xs-12 col-md-6">
                                            <img src="<?php echo get_field('img_cat_1', $postSecCatalog->ID); ?>" alt=""/>

                                        </div>
                                        <p class="cat_descr_text col-xs-12 col-md-6"><?php echo get_field('catalog_descr1', $postSecCatalog->ID); ?></p>
                                        <div class="clearfix"></div>

                                        <div class="cat_descr_img col-xs-12 col-md-6">
                                            <img src="<?php echo get_field('img_cat_2', $postSecCatalog->ID); ?>" alt=""/>
                                        </div>
                                        <p class="cat_descr_text col-xs-12 col-md-6"><?php echo get_field('catalog_descr2', $postSecCatalog->ID); ?></p>
                                        <div class="clearfix"></div>
                                        <?php echo $postSecCatalog->post_content; ?>
                                    </div>
                                    <div class="call_block">
                                        <div class="call_title">Заказать звонок</div>
                                        <div class="call_descr">Мы свяжемся с Вами</div>
                                        <div class="call_form_wrap">
                                            <form class="call_form" method="POST" action="">
                                                <input class="call_form_name" type="text" required="" placeholder="*Введите имя" name="name">
                                                <input class="call_form_phone" type="text" required="" placeholder="*Введите телефон" name="phone">
                                                <input type="submit" value="Заказать звонок">
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php } /*end foreach*/ ?>
        </div><!--.portfolio_grid-->
        </div>
        <p class="link_shop">И многое другое. <a class="link_order_call" href="#order_call">Заказать звонок</a></p>
        </div><!--.section_content-->
        </section>
    <?php
    $category_data = get_category_by_slug( 'sec_portfolio' );

    /*Кнопки фильтрации
    $post_filter_buttons_portfolio = get_posts(array(
        'tag' => 'portfolio_filter_buttons',
        'order' => 'ASC'
    ));*/

    /*сообщения секции*/
    $postsSecPortfolio = get_posts(array(
        'category_name' => 'sec_portfolio',
        'order' => 'ASC',
        'numberposts' => 30,
    ));
    ?>
        <section id="portfolio" class="sec_portfolio">
            <div class="section_header">
                <h3 class="title"><?php echo $category_data->name; ?></h3>
                <div class="descr"><?php echo $category_data->description; ?></div>
            </div>

            <div class="section_content">
                <div class="container">
                    <div class="row">
                        <?php /* echo $post_filter_buttons_portfolio[0]->post_content;*/ ?>
                        <div class="clearfix"></div>
                        <div class="works_wrap">
                            <?php
                            foreach($postsSecPortfolio as $postSecPortfolio) {
                                $tags = wp_get_post_tags($postSecPortfolio->ID);
                                $tags_names = ''; /*будет содержать названия тегов разеделенные проеблом*/
                                if ($tags) {
                                    foreach ($tags as $tag) {
                                        $tags_names .= $tag->name . ' ';
                                    }
                                }
                            ?>
                            <div class="col-md-3 col-sm-6 col-xs-12 portfolio_item <?php echo $tags_names; ?>">
                                <img src="<?php echo get_field('img_port_1', $postSecPortfolio->ID); ?>" alt="">
                                <div class="port_item_cont">
                                    <h3><?php echo $postSecPortfolio->post_title; ?></h3>
                                    <!--<p>Описание работы</p>-->
                                    <a href="#" class="popup_content">Посмотреть</a>
                                </div>
                                <div class="hidden">
                                    <div class="podrt_descr">
                                        <div class="modal-box-content">
                                            <button class="mfp-close" type="button" title="Закрыть (Esc)">×</button>
                                            <h3><?php echo $postSecPortfolio->post_title; ?></h3>
                                            <p><?php echo $postSecPortfolio->post_content; ?></p>
                                            <img src="<?php echo get_field('img_port_1', $postSecPortfolio->ID); ?>" alt="">
                                            <p><?php echo get_field('portfolio_descr_more', $postSecPortfolio->ID); ?></p>
                                            <img src="<?php echo get_field('img_port_2', $postSecPortfolio->ID); ?>" alt="">
                                            <div class="call_block">
                                                <div class="call_title">Заказать звонок</div>
                                                <div class="call_descr">Мы свяжемся с Вами</div>
                                                <div class="call_form_wrap">
                                                    <form class="call_form" action="" method="POST">
                                                        <input class="call_form_name" type="text" name="name" placeholder="*Введите имя" required>
                                                        <input class="call_form_phone" type="text" name="phone" placeholder="*Введите телефон" required>
                                                        <input type="submit" value="Заказать звонок">
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } /*end foreach*/ ?>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div><!--.section_content-->
        </section>
    <?php
    $category_data = get_category_by_slug( 'sec_clients' );
    ?>
        <section id="clients" class="sec_clients">
            <div class="section_header">
                <h3 class="title"><?php echo $category_data->name; ?></h3>
                <div class="descr"><?php echo $category_data->description; ?></div>
            </div>
            <div class="section_content">
                <div class="container">
                    <div class="row">
                        <div class="companies">
                            <div id="company3" class="company_img"><img src="<?php echo get_template_directory_uri(); ?>/img/tour_companies/logo-2.png" width="70" alt=""></div>
                            <div id="company2" class="company_img"><img src="<?php echo get_template_directory_uri(); ?>/img/tour_companies/logo-3.png" width="110" alt=""></div>
                            <div id="company5" class="company_img"><img src="<?php echo get_template_directory_uri(); ?>/img/tour_companies/logo-5.png" width="100" alt=""></div>
                            <div id="company6" class="company_img"><img src="<?php echo get_template_directory_uri(); ?>/img/tour_companies/logo-6.png" width="60" alt=""></div>
                            <div id="company1" class="company_img" ><img src="<?php echo get_template_directory_uri(); ?>/img/tour_companies/logo-1.png" width="160" alt=""></div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php
    $category_data = get_category_by_slug( 'sec_contacts' );
    /*Сообщения top_header, contacts*/
    $posts_contacts_data = get_posts(array(
        'tag' => 'contacts_data',
        'order' => 'ASC'
    ));
    /*все мента теги поста contacts*/
    $post_contacts_meta = get_metadata('post', $posts_contacts_data[0]->ID);
    ?>
        <section id="contacts" class="sec_contacts">
            <div class="section_header">
                <h3 class="title"><?php echo $category_data->name; ?></h3>
                <div class="descr"><?php echo $category_data->description; ?></div>
            </div>
            <div class="section_content">
                <div class="container">
                    <div class="row">
                        <div class="contacts_data_blocks col-md-6 col-sm-6">
                            <div class="contact_box contact_adress">
                                <div class="contacts_icon_wrap">
                                    <div class="contacts_icon icon-basic-geolocalize-05"></div>
                                </div>
                                <div class="contacts_text">
                                    <h3>Адрес:</h3>
                                    <p><?php echo $post_contacts_meta['contact_adress'][0]; ?></p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="contact_box">
                                <div class="contacts_icon_wrap">
                                    <div class="contacts_icon icon-basic-smartphone"></div>
                                </div>
                                <div class="contacts_text">
                                    <h3>Телефон:</h3>
                                    <p><?php echo $post_contacts_meta['contact_phone1'][0]; ?></p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="contact_box">
                                <div class="contacts_icon_wrap">
                                    <div class="contacts_icon icon-basic-mail"></div>
                                </div>
                                <div class="contacts_text">
                                    <h3>E-mail:</h3>
                                    <p><?php echo $post_contacts_meta['contact_email'][0]; ?></p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="contact_box">
                                <div class="contacts_icon_wrap">
                                    <div class="contacts_icon icon-basic-webpage-img-txt"></div>
                                </div>
                                <div class="contacts_text">
                                    <h3>Веб-сайт:</h3>
                                    <p><a href="//<?php echo $post_contacts_meta['contact_site'][0]; ?>" target="_blank"><?php echo $post_contacts_meta['contact_site'][0]; ?></a></p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="contacts_data_form col-md-6 col-sm-6">
                            <form action="" class="call_form" method="post">
                                <label class="form-group">
                                    <span class="color_element">*</span> Ваше имя:
                                    <input type="text" name="name" placeholder="Ваше имя" required />
                                </label>
                                <label class="form-group">
                                    <span class="color_element">*</span> Ваш телефон:
                                    <input type="text" name="phone" placeholder="Ваш телефон" required />
                                </label>
                                <label class="form-group">
                                    Ваш E-mail:
                                    <input type="text" name="email" placeholder="Ваш E-mail" />
                                </label>
                                <label class="form-group">
                                    Ваше сообщение:
                                    <textarea name="message" placeholder="Ваше сообщение"></textarea>
                                </label>
                                <button>Отправить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <?php get_footer(); ?>