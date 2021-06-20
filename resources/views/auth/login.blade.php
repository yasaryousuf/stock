<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8" />

    <title>Metronic | Login Page 1</title>
    <meta name="description" content="Login page example">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700|Roboto:300,400,500,600,700">


    <link href="{{ asset('css/login-1.css') }}" rel="stylesheet" type="text/css" />

    <link href="{{ asset('css/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/style.bundle.css') }}" rel="stylesheet" type="text/css" />


    <link href="{{ asset('css/light-1.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/light-2.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/dark-1.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/dark-2.css') }}" rel="stylesheet" type="text/css" />

    <link rel="shortcut icon"
        href="https://keenthemes.com/metronic/themes/metronic/theme/default/demo1/dist/assets/media/logos/favicon.ico" />


    <script>
        (function (h, o, t, j, a, r) {
            h.hj = h.hj || function () {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 1070954,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');

    </script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-37564768-1');

    </script>
</head>
<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
            <div
                class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">
                <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside"
                    style="background-image: url(image/bg/bg-4.jpg);">
                    <div class="kt-grid__item">
                        <a href="#" class="kt-login__logo">
                            <img src="image/logos/logo-4.png">
                        </a>
                    </div>
                    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
                        <div class="kt-grid__item kt-grid__item--middle">
                            <h3 class="kt-login__title">Welcome to Metronic!</h3>
                            <h4 class="kt-login__subtitle">The ultimate Bootstrap & Angular 6 admin theme framework for
                                next generation web apps.</h4>
                        </div>
                    </div>
                    <div class="kt-grid__item">
                        <div class="kt-login__info">
                            <div class="kt-login__copyright">
                                &copy 2018 Metronic
                            </div>
                            <div class="kt-login__menu">
                                <a href="#" class="kt-link">Privacy</a>
                                <a href="#" class="kt-link">Legal</a>
                                <a href="#" class="kt-link">Contact</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div
                    class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-1  kt-login__wrapper">
                    <div class="kt-login__head">
                        <span class="kt-login__signup-label">Don't have an account yet?</span>&nbsp;&nbsp;
                        <a href="#" class="kt-link kt-login__signup-link">Sign Up!</a>
                    </div>
                    <div class="kt-login__body">
                        <div class="kt-login__form">
                            <div class="kt-login__title">
                                <h3>Sign In</h3>
                            </div>
                            <form class="kt-form" method="POST" action="{{ route('login') }}" novalidate="novalidate" id="kt_login_form">
                                @csrf
                                <div class="form-group">
                                    <input class="form-control @error('email') is-invalid @enderror" type="text" placeholder="Username" name="email" value="{{ old('email') }}"
                                        autocomplete="off">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input class="form-control @error('password') is-invalid @enderror" type="password" placeholder="Password" name="password"
                                        autocomplete="off">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="kt-login__actions">
                                    <a href="{{ route('password.request') }}" class="kt-link kt-login__link-forgot">
                                        Forgot Password ?
                                    </a>
                                    <button id="kt_login_signin_submit" type="submit"
                                        class="btn btn-primary btn-elevate kt-login__btn-primary">Sign In</button>
                                </div>
                            </form>
                            <div class="kt-login__divider">
                                <div class="kt-divider">
                                    <span></span>
                                    <span>OR</span>
                                    <span></span>
                                </div>
                            </div>
                            <div class="kt-login__options">
                                <a href="#" class="btn btn-primary kt-btn">
                                    <i class="fab fa-facebook-f"></i>
                                    Facebook
                                </a>

                                <a href="#" class="btn btn-info kt-btn">
                                    <i class="fab fa-twitter"></i>
                                    Twitter
                                </a>

                                <a href="#" class="btn btn-danger kt-btn">
                                    <i class="fab fa-google"></i>
                                    Google
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#5d78ff",
                    "dark": "#282a3c",
                    "light": "#ffffff",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": [
                        "#c5cbe3",
                        "#a1a8c3",
                        "#3d4465",
                        "#3e4466"
                    ],
                    "shape": [
                        "#f0f3ff",
                        "#d9dffa",
                        "#afb4d4",
                        "#646c9a"
                    ]
                }
            }
        };
    </script>
    <script src="{{ asset('js/plugins.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/scripts.bundle.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/login-1.js') }}" type="text/javascript"></script>
</body>
</html>
