<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 05/08/17
 * Time: 15:57
 */

function favicon_head() {

    ?>

    <link rel='shortcut icon' href='https://krikuz.com/favicon.ico' type='image/x-icon'>

    <?php

}


add_action( 'clean_commerce_action_head', 'favicon_head', 9000 );
