<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AdminLTE 3 | Blank Page</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <base href="https://adminlte.io/themes/v3/">
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

    <link rel="stylesheet" href="dist/css/adminlte.min.css?v=3.2.0">
    <script nonce="640ac6c5-86c7-44f6-88f3-a040ca76e74c">
    (function(w, d) {
        ! function(t, u, v, w) {
            t[v] = t[v] || {};
            t[v].executed = [];
            t.zaraz = {
                deferred: [],
                listeners: []
            };
            t.zaraz.q = [];
            t.zaraz._f = function(x) {
                return async function() {
                    var y = Array.prototype.slice.call(arguments);
                    t.zaraz.q.push({
                        m: x,
                        a: y
                    })
                }
            };
            for (const z of ["track", "set", "debug"]) t.zaraz[z] = t.zaraz._f(z);
            t.zaraz.init = () => {
                var A = u.getElementsByTagName(w)[0],
                    B = u.createElement(w),
                    C = u.getElementsByTagName("title")[0];
                C && (t[v].t = u.getElementsByTagName("title")[0].text);
                t[v].x = Math.random();
                t[v].w = t.screen.width;
                t[v].h = t.screen.height;
                t[v].j = t.innerHeight;
                t[v].e = t.innerWidth;
                t[v].l = t.location.href;
                t[v].r = u.referrer;
                t[v].k = t.screen.colorDepth;
                t[v].n = u.characterSet;
                t[v].o = (new Date).getTimezoneOffset();
                if (t.dataLayer)
                    for (const G of Object.entries(Object.entries(dataLayer).reduce(((H, I) => ({
                            ...H[1],
                            ...I[1]
                        })), {}))) zaraz.set(G[0], G[1], {
                        scope: "page"
                    });
                t[v].q = [];
                for (; t.zaraz.q.length;) {
                    const J = t.zaraz.q.shift();
                    t[v].q.push(J)
                }
                B.defer = !0;
                for (const K of [localStorage, sessionStorage]) Object.keys(K || {}).filter((M => M.startsWith(
                    "_zaraz_"))).forEach((L => {
                    try {
                        t[v]["z_" + L.slice(7)] = JSON.parse(K.getItem(L))
                    } catch {
                        t[v]["z_" + L.slice(7)] = K.getItem(L)
                    }
                }));
                B.referrerPolicy = "origin";
                B.src = "/cdn-cgi/zaraz/s.js?z=" + btoa(encodeURIComponent(JSON.stringify(t[v])));
                A.parentNode.insertBefore(B, A)
            };
            ["complete", "interactive"].includes(u.readyState) ? zaraz.init() : t.addEventListener(
                "DOMContentLoaded", zaraz.init)
        }(w, d, "zarazData", "script");
    })(window, document);
    </script>
</head>

<body class="hold-transition sidebar-mini">

    <div class="wrapper">

        <?= $page; ?>


        <footer class="main-footer">
            <div class="float-right d-none d-sm-block">
                <b>Version</b> 3.2.0
            </div>
            <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights
            reserved.
        </footer>

        <aside class="control-sidebar control-sidebar-dark">

        </aside>

    </div>


    <script src="plugins/jquery/jquery.min.js"></script>

    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="dist/js/adminlte.min.js?v=3.2.0"></script>

    <script src="dist/js/demo.js"></script>
</body>

</html>