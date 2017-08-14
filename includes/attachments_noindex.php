<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 14/08/17
 * Time: 11:52
 */


//запрет индексирования страниц вложений start
function wph_noindex_for_attachment() {
    if (get_post_mime_type()!= false) {
        echo '<meta name="robots" content="noindex, nofollow" />'.PHP_EOL;
    }
}
add_action('wp_head', 'wph_noindex_for_attachment');
//запрет индексирования страниц вложений end
