<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 31/07/17
 * Time: 18:53
 */

add_action( 'wp_head', 'add_yandex_maps' );

function add_yandex_maps() {

    if (!is_contacts_page()) return;

    ?>
    <script src="https://api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript">
    </script>
    <script type="text/javascript">
        ymaps.ready(init);
        var myMap,
            myPlacemark;

        function init(){
            myMap = new ymaps.Map("mapOffice", {
                center: [55.799755, 37.794136],
                zoom: 7
            });

            myPlacemark = new ymaps.Placemark([55.799755, 37.794136], {
                hintContent: 'Москва!',
                balloonContent: 'Столица России'
            });

            myMap.geoObjects.add(myPlacemark);
        }
    </script>
    <?php

}

function is_contacts_page() {

    global $wp;
    $current_url = add_query_arg( $wp->query_string, '', home_url( $wp->request ) );
    $parts = parse_url($current_url);

    return ($parts['query'] == 'pagename=contacts');

}