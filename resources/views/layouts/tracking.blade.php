@if(env('APP_ENV','local') == 'production')
<!-- Shareasale -->
<script src="https://www.dwin1.com/19038.js" type="text/javascript" defer="defer"></script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-PZ1SK8Y50E"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', 'G-PZ1SK8Y50E');
</script>

<!-- Hotjar Tracking Code for https://writerzen.net -->
<script>
    (function(h, o, t, j, a, r) {
        h.hj = h.hj || function() {
            (h.hj.q = h.hj.q || []).push(arguments)
        };
        h._hjSettings = {
            hjid: 2608622,
            hjsv: 6
        };
        a = o.getElementsByTagName('head')[0];
        r = o.createElement('script');
        r.async = 1;
        r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
        a.appendChild(r);
    })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
</script>

<!-- Start of writerzen Zendesk Widget script -->
<script>
    window.fwSettings = {
        'widget_id': 69000002286
    };
    ! function() {
        if ("function" != typeof window.FreshworksWidget) {
            var n = function() {
                n.q.push(arguments)
            };
            n.q = [], window.FreshworksWidget = n
        }
    }()
</script>
<script type='text/javascript' src='https://widget.freshworks.com/widgets/69000002286.js' async defer></script>
<!-- End of writerzen Zendesk Widget script -->


<!-- Facebook Pixel Code -->
<script>
    ! function(f, b, e, v, n, t, s) {
        if (f.fbq) return;
        n = f.fbq = function() {
            n.callMethod ?
                n.callMethod.apply(n, arguments) : n.queue.push(arguments)
        };
        if (!f._fbq) f._fbq = n;
        n.push = n;
        n.loaded = !0;
        n.version = '2.0';
        n.queue = [];
        t = b.createElement(e);
        t.async = !0;
        t.src = v;
        s = b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t, s)
    }(window, document, 'script',
        'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '544060103271321');
    fbq('track', 'PageView');
</script>
<noscript>
    <img height="1" width="1" src="https://www.facebook.com/tr?id=544060103271321&ev=PageView&noscript=1" />
</noscript>
<!-- End Facebook Pixel Code -->

<!-- Pagesense -->
{{-- <script src="https://cdn.pagesense.io/js/owchhuok/448771078f3a4d7491a929fcc7d0ed20.js"></script> --}}

<!-- Google Tag Manager -->
<script>
    (function(w, d, s, l, i) {
        w[l] = w[l] || [];
        w[l].push({
            'gtm.start': new Date().getTime(),
            event: 'gtm.js'
        });
        var f = d.getElementsByTagName(s)[0],
            j = d.createElement(s),
            dl = l != 'dataLayer' ? '&l=' + l : '';
        j.async = true;
        j.src =
            'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
        f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-TS5DTP2');
</script>
<!-- End Google Tag Manager -->
@endif

 <!-- Reditus -->
 @if(env('APP_ENV','local') == 'production')
 <script>
     (function(w, d, s, p, t) {
         w.gr = w.gr || function() {
             w.gr.q = w.gr.q || [];
             w.gr.q.push(arguments);
         };
         p = d.getElementsByTagName(s)[0];
         t = d.createElement(s);
         t.async = true;
         t.src = "https://app.getreditus.com/gr.js?_ce=30";
         p.parentNode.insertBefore(t, p);
     })(window, document, "script");
     gr("track", "pageview");
 </script>
 @else
 <script>
     (function(w, d, s, p, t) {
         w.gr = w.gr || function() {
             w.gr.q = w.gr.q || [];
             w.gr.q.push(arguments);
         };
         p = d.getElementsByTagName(s)[0];
         t = d.createElement(s);
         t.async = true;
         t.src = "https://app.getreditus.net/gr.js?_ce=60";
         p.parentNode.insertBefore(t, p);
     })(window, document, "script");
     gr("track", "pageview");
 </script>
 @endif