<?php

add_theme_support( 'post-thumbnails' ); // поддержка миниматюр

function getPathToFileMessages() {
    /*СДЕСЬ НАЗВАНИЕ ТЕМЫ. В данном случае domapostroi*/
    return '../wp-content/themes/domapostroi/call_message.txt';
}

function handler_call_and_add_page() {
    //добавление дейсвия на обработку ajax запроса на добавление отзыва(права у всех юзеров)
    //где add_call это action в js ajax запроса
    add_action('wp_ajax_add_call', 'add_call_handler' );
    add_action('wp_ajax_nopriv_add_call', 'add_call_handler' );
		
		//добавление заказа
    add_action('wp_ajax_add_order', 'add_order_handler' );
    add_action('wp_ajax_nopriv_add_order', 'add_order_handler' );
    //добавление страницы в админ панель
    add_action('admin_menu', 'add_call_page' );
}

function add_call_handler() {
    $email_admin = '9087598@mail.ru';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = clearStr($_POST['name']);
        $phone = clearStr($_POST['phone']);
        $email = clearStr($_POST['email']);
        $message = clearStr($_POST['message']);
        $ip = clearStr($_SERVER['REMOTE_ADDR']); /*ip = пользователя*/

        $message_for_put = date('<b>Дата заказа звонка:</b> ' . 'd-m-Y h:i:s') . ' | имя: ' . $name . ' | телефон: ' . $phone . ' | email: ' . $email . ' | сообщение: ' . $message . ' | ip: ' . $ip;
        $fileUrl = getPathToFileMessages();

        /*если файл сущевтсвует записываем данные в него*/
        if( is_file($fileUrl) ) {
            /*сообщение и перевод строки(с помощью eneter т.к. \n почему-то не раюотает)*/
            file_put_contents($fileUrl, $message_for_put . "
", FILE_APPEND );
            echo 1;
            mail($email_admin, 'с сайта "дома', $message_for_put);
        } else {
            echo 'файл не найден';
        }
    }
}

//обработка запроса на добавление заказа
function add_order_handler() {
    $email_admin = '9087598@mail.ru';

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = clearStr($_POST['name']);
        $phone = clearStr($_POST['phone']);
        $email = clearStr($_POST['email']);
        $message = clearStr($_POST['message']);
				$ids = clearStr($_POST['ids']);
        $ip = clearStr($_SERVER['REMOTE_ADDR']); /*ip = пользователя*/
        $message_for_put = date('<b>Дата заказа дома: </b>' . 'd-m-Y h:i:s') . ' | <b>имя:</b> ' . $name . ' | <b>телефон:</b> ' . $phone . ' | <b>email:</b> ' . $email . ' | <b>сообщение:</b> ' . $message . '| <b>id товаров:</b> ' . $ids . ' | <b>ip:</b> ' . $ip;
        $fileUrl = getPathToFileMessages();

        /*если файл сущевтсвует записываем данные в него*/
        if( is_file($fileUrl) ) {
            /*сообщение и перевод строки(с помощью eneter т.к. \n почему-то не раюотает)*/
            file_put_contents($fileUrl, $message_for_put . "
", FILE_APPEND );
            echo 1;
            mail($email_admin, 'с сайта "дома', $message_for_put);
        } else {
            echo 'файл не найден';
        }
    }
}

//можно вынести в отдельный файл функции для валидации
//функция очистки строк от вредоносного кода(вынести в отдельный файл).
function clearStr( $str ) {
    return is_string( $str ) ? trim( htmlspecialchars( $str ) ) : '';
}

//приведение к числу, целому положительному.
function clearInt($numb) {
    return abs((int)$numb);
}

/*добавление страницы обр. связи*/
function add_call_page() {
    if( function_exists('add_options_page') ) {
        add_menu_page('контакты обр. связи', 'Контакты для обратной связи', 8, basename(__FILE__), 'call_content', '', 27.7 );
    }
}

/*контент страницы*/
function call_content() {
    echo '<h2>Контакты</h2>';
    if( is_admin() ) {
        //отображает отзывы
        echo '<div class="calls_container" style="font-size: 12px">';
            $fileUrl = getPathToFileMessages();
            if( is_file($fileUrl) ) {
                $calls = file_get_contents($fileUrl);
                echo nl2br($calls);
            } else {
                echo 'Отзывов нет. Или файла';
            }
        echo '</div>';
    }
}

handler_call_and_add_page();



/*----------------------------------------------------------------------------------------------
shop
*/

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.

function shopping_theme_setup() {


    add_action ('omega_header', 'shopping_header_right');


    add_theme_support( 'woocommerce' );

    add_theme_support( 'color-palette', array( 'callback' => 'shopping_register_colors' ) );
}

add_action( 'after_setup_theme', 'shopping_theme_setup', 11  );

function shopping_header_right() {
    ?>

    <aside class="header-right widget-area sidebar">

        <?php
        if ( is_active_sidebar( 'header-right' ) ) {
            dynamic_sidebar( 'header-right' );
        } else {
            ?>
            <section class="widget widget_search widget-widget_search">

                <div class="widget-wrap">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

                        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'shopping' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'shopping' ); ?>">

                    </form>
                </div>
            </section>
        <?php
        }
        ?>

    </aside><!-- .sidebar -->
<?php
}
function shopping_register_colors( $color_palette ) {
    /* Add custom colors. *
    $color_palette->add_color(
        array( 'id' => 'primary', 'label' => __( 'Primary Color', 'shopping' ), 'default' => '96588a' )
    );
    $color_palette->add_color(
        array( 'id' => 'secondary', 'label' => __( 'Secondary Background', 'shopping' ), 'default' => 'AD74A2' )
    );
    $color_palette->add_color(
        array( 'id' => 'link', 'label' => __( 'Link Color', 'shopping' ), 'default' => 'AD74A2' )
    );

    /* Add rule sets for colors. *

    $color_palette->add_rule_set(
        'primary',
        array(
            'color'               => 'h1.site-title a, .site-description, .entry-meta, .header-right',
            'background-color'    => '.nav-primary, .tinynav, .footer-widgets, button, input[type="button"], input[type="reset"], input[type="submit"]'
        )
    );
    $color_palette->add_rule_set(
        'secondary',
        array(
            'background-color'    => '.omega-nav-menu .current_page_item a, .omega-nav-menu a:hover, .omega-nav-menu li:hover, .omega-nav-menu li:hover ul'
        )
    );
    $color_palette->add_rule_set(
        'link',
        array(
            'color'    => '.site-inner .entry-meta a, .site-inner .entry-content a, .site-inner .sidebar a, .site-footer a'
        )
    );
}
 */


/*woo ----------------------*/

//поддержка woo
add_theme_support( 'woocommerce' );





/* Remove each style one by one*/
add_filter( 'woocommerce_enqueue_styles', 'woo_dequeue_styles' );
function woo_dequeue_styles( $enqueue_styles ) {
    unset( $enqueue_styles['woocommerce-general'] );	// Remove the gloss
    unset( $enqueue_styles['woocommerce-layout'] );		// Remove the layout
    unset( $enqueue_styles['woocommerce-smallscreen'] );	// Remove the smallscreen optimisation
    unset( $enqueue_styles['woocommerce-wc-setup'] );	// Remove the smallscreen optimisation
    unset( $enqueue_styles['woocommerce-select2'] );	// Remove the smallscreen optimisation
    unset( $enqueue_styles['reports-print'] );	// Remove the smallscreen optimisation
    unset( $enqueue_styles['prettyPhoto'] );	// Remove the smallscreen optimisation
    unset( $enqueue_styles['menu'] );	// Remove the smallscreen optimisation
    unset( $enqueue_styles['dashboard'] );	// Remove the smallscreen optimisation
    unset( $enqueue_styles['chosen'] );	// Remove the smallscreen optimisation
    unset( $enqueue_styles['auth'] );	// Remove the smallscreen optimisation
    unset( $enqueue_styles['admin'] );	// Remove the smallscreen optimisation
    unset( $enqueue_styles['activation'] );	// Remove the smallscreen optimisation

    return $enqueue_styles;
}



/*добавление сайдбара-----------------*/

/*отключение стилей*/
//add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );



add_action( 'widgets_init', 'my_register_sidebar' );

function my_register_sidebar() {
    /* Регистрируем 'primary' сайдбар. */
    register_sidebar(
        array(
            'id' => 'primary',
            'name' => __( 'sidebar Primary' ),
            'description' => __( 'Описание сайдбара (видно в админ панеле).' ),
            'before_widget' => '<div id="%1$s" class="my_widget %2$s">',
            'after_widget' => '</div>',
            'before_title' => '<h4 class="my_widget-title">',
            'after_title' => '</h4>'
        )
    );
    /* Вы можете повторить функцию register_sidebar() для других виджетов, поле id должно быть уникальным (primary, secondary, moiwidget и так далее. */
}







function shopping_theme_setup() {
  add_action('omega_header', 'shopping_header_right');
}

add_action( 'after_setup_theme', 'shopping_theme_setup', 11  );

function shopping_header_right() {
    ?>

    <aside class="sidebar col-xs-12 col-sm-4 col-md-4">

        <?php
        //if ( is_active_sidebar( 'header-right' ) ) {
            dynamic_sidebar( 'header-right' );
       // } else {
            ?>
            <section class="widget widget_search widget-widget_search">

                <div class="widget-wrap">
                    <form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">

                        <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'shopping' ); ?>" value="<?php echo esc_attr( get_search_query() ); ?>" name="s" title="<?php _ex( 'Search for:', 'label', 'shopping' ); ?>">

                    </form>
                </div>
            </section>
        <?php
        //}
        ?>

    </aside><!-- .sidebar -->

<?php
}




//desable admin panel wp
show_admin_bar( false );