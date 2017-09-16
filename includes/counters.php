<?php
/**
 * Created by PhpStorm.
 * User: grimax
 * Date: 03/08/17
 * Time: 17:19
 */

function head_counters() {
    ?>

    <!-- Google Analytics -->
    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
            m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-101447518-2', 'auto');
        ga('send', 'pageview');

    </script>
    <!-- /Google Analytics -->

    <?php
}

add_action( 'clean_commerce_action_head', 'head_counters', 9000 );

function verifications_metas() {
    ?>

    <meta name="yandex-verification" content="0cd913d8b478e1e5" />
    <meta name="google-site-verification" content="1M9vTRsUbqmXGQg0iydUBJYR09sALDNBu1RABAtTYA0" />

    <?php

}

add_action( 'clean_commerce_action_head', 'verifications_metas', 9000 );

function body_counters() {
    ?>

    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function (d, w, c) {
            (w[c] = w[c] || []).push(function() {
                try {
                    w.yaCounter45516477 = new Ya.Metrika({
                        id:45516477,
                        clickmap:true,
                        trackLinks:true,
                        accurateTrackBounce:true,
                        webvisor:true
                    });
                } catch(e) { }
            });

            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src = "https://mc.yandex.ru/metrika/watch.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(document, window, "yandex_metrika_callbacks");
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/45516477" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->

    <!-- Rating@Mail.ru counter -->
    <script type="text/javascript">
        var _tmr = window._tmr || (window._tmr = []);
        _tmr.push({id: "2924464", type: "pageView", start: (new Date()).getTime()});
        (function (d, w, id) {
            if (d.getElementById(id)) return;
            var ts = d.createElement("script"); ts.type = "text/javascript"; ts.async = true; ts.id = id;
            ts.src = (d.location.protocol == "https:" ? "https:" : "http:") + "//top-fwz1.mail.ru/js/code.js";
            var f = function () {var s = d.getElementsByTagName("script")[0]; s.parentNode.insertBefore(ts, s);};
            if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); }
        })(document, window, "topmailru-code");
    </script><noscript><div>
            <img src="//top-fwz1.mail.ru/counter?id=2924464;js=na" style="border:0;position:absolute;left:-9999px;" alt="" />
        </div></noscript>
    <!-- //Rating@Mail.ru counter -->

    <!-- Top100 (Kraken) Counter -->
    <script>
        (function (w, d, c) {
            (w[c] = w[c] || []).push(function() {
                var options = {
                    project: 4503954
                };
                try {
                    w.top100Counter = new top100(options);
                } catch(e) { }
            });
            var n = d.getElementsByTagName("script")[0],
                s = d.createElement("script"),
                f = function () { n.parentNode.insertBefore(s, n); };
            s.type = "text/javascript";
            s.async = true;
            s.src =
                (d.location.protocol == "https:" ? "https:" : "http:") +
                "//st.top100.ru/top100/top100.js";

            if (w.opera == "[object Opera]") {
                d.addEventListener("DOMContentLoaded", f, false);
            } else { f(); }
        })(window, document, "_top100q");
    </script>
    <noscript>
        <img src="//counter.rambler.ru/top100.cnt?pid=4503954" alt="Топ-100" />
    </noscript>
    <!-- END Top100 (Kraken) Counter -->

    <?php

}

add_action('clean_commerce_action_before', 'body_counters');