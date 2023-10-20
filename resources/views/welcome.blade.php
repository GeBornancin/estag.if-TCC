<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>estag.IF</title>
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


    <!-- Styles -->
</head>
<style>
    .elements{
        background-color: #ffffff;
        background-image: url(https://ava.ifpr.edu.br/pluginfile.php/1/theme_boost_campus/additionalresources/0/fundo_home_education.png);
        height: 350px;
        width: 100%;
        background-size: contain;
        background-repeat: no-repeat;
        padding: 5% 5%;
        text-align: right;
        font-size: calc(22px + 1.5vw);
        font-weight: 700;
        color: #00942C;
        border-radius: 4.8px;
        background-position-y: bottom;
        margin-bottom: 50px;
    }
    .nav-item{
        color: #ffffff;
        font-size: 20px;
    }
    .autenticacao{
        color: #ffffff
    }
</style>

<body class="text-center d-flex flex-column" style=" background-color: #F3F4F6; ">
    <header>

        <nav class="navbar navbar-expand-lg fixed-top navbar-dark mb-5 shadow-lg" style="background-color: #00942C;">
            <a class="navbar-brand" href="/">
                <img src="https://i.pinimg.com/564x/6b/70/97/6b709785310e6ce108708e27bcbd4038.jpg" width="100"
                    height="35" class="d-inline-block align-top" alt="">
            </a>
            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="navbar-collapse collapse" id="navbarNav" style="">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="btn btn-primary">Dashboard</a>
                    @else
                        <ul class="navbar-nav ml-auto">
                        </ul>
                        <ul class="navbar-nav ">
                            <li class="nav-item ">
                                <a class="nav-link" href="{{ route('login') }}"><i class="autenticacao"></i>
                                    Entrar </a>
                            </li>
                        </ul>
                        @if (Route::has('register'))
                            <ul class="navbar-nav">
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{ route('register') }}"><i class="autenticacao"></i>
                                        Cadastrar-se </a>
                                </li>
                            </ul>
                        @endif
                    @endauth
                @endif
            </div> <!-- navbar-collapse -->
        </nav> <!-- navbar -->
    </header>
    <div class="container" style="align-items: center; margin-top:80px;">
        <div id="page-content" class="row pb-3 d-print-block">
            <div id="region-main-box" class="col-12">
                <section id="region-main" aria-label="Conteúdo">
                    <div role="main">
                        <div class="box py-3 generalbox sitetopic">
                            <ul class="section img-text">
                                <li class="activity label modtype_label" style="list-style-type: none;">
                                    
                                        <div class="mod-indent-outer w-100">
                                            <div class="mod-indent"></div>
                                            <div>
                                                <div class="contentwithoutlink ">
                                                    <div class="no-overflow">
                                                        <div class="no-overflow">
                                                            <div class="elements">
                                                                <span style="font-family: 'Open Sans';"><x-image-text-logo></x-image-text-logo></span>
                                                                <h1 style=" text-decoration: none; max-width: none;"
                                                                    class="">
                                                                    Conectando <a
                                                                        style=" text-decoration: none; color: #0086FF;"
                                                                        class="typewrite" data-period="2000"
                                                                        data-type="[ &quot;a sua vaga de estágio.&quot;, &quot;a sua vida.&quot; ]"><span
                                                                            class="wrap">?</span></a>
                                                                </h1>
                                                                <!-- JavaScript para animar digitação. -->
                                                                <script type="text/javascript">
                                                                    var TxtType = function(el, toRotate, period) {
                                                                        this.toRotate = toRotate;
                                                                        this.el = el;
                                                                        this.loopNum = 0;
                                                                        this.period = parseInt(period, 10) || 2000;
                                                                        this.txt = '';
                                                                        this.tick();
                                                                        this.isDeleting = false;
                                                                    };

                                                                    TxtType.prototype.tick = function() {
                                                                        var i = this.loopNum % this.toRotate.length;
                                                                        var fullTxt = this.toRotate[i];

                                                                        if (this.isDeleting) {
                                                                            this.txt = fullTxt.substring(0, this.txt.length - 1);
                                                                        } else {
                                                                            this.txt = fullTxt.substring(0, this.txt.length + 1);
                                                                        }

                                                                        this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

                                                                        var that = this;
                                                                        var delta = 200 - Math.random() * 100;

                                                                        if (this.isDeleting) {
                                                                            delta /= 2;
                                                                        }

                                                                        if (!this.isDeleting && this.txt === fullTxt) {
                                                                            delta = this.period;
                                                                            this.isDeleting = true;
                                                                        } else if (this.isDeleting && this.txt === '') {
                                                                            this.isDeleting = false;
                                                                            this.loopNum++;
                                                                            delta = 500;
                                                                        }

                                                                        setTimeout(function() {
                                                                            that.tick();
                                                                        }, delta);
                                                                    };

                                                                    window.onload = function() {
                                                                        var elements = document.getElementsByClassName('typewrite');
                                                                        for (var i = 0; i < elements.length; i++) {
                                                                            var toRotate = elements[i].getAttribute('data-type');
                                                                            var period = elements[i].getAttribute('data-period');
                                                                            if (toRotate) {
                                                                                new TxtType(elements[i], JSON.parse(toRotate), period);
                                                                            }
                                                                        }
                                                                        // INJECT CSS
                                                                        var css = document.createElement("style");
                                                                        css.type = "text/css";
                                                                        css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid  #0086FF;}";
                                                                        document.body.appendChild(css);
                                                                    };
                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    
                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        {{-- <div class=""
        style="
                  
        height: 350px;
        width: 800PX;
        background-size: contain;
        background-repeat: no-repeat;
        font-size: calc(22px + 1.5vw);
        font-weight: 700;
        color: #359830;
        border-radius: 4.8px;
        background-position-y: bottom;
        margin-bottom: 50px;
                ">
        
        <h1 style=" text-decoration: none; max-width: none;" class="">
            Conectando <a style=" text-decoration: none; color: #0086FF;" class="typewrite" data-period="2000"
                data-type="[ &quot;a sua vaga de estágio.&quot;, &quot;a sua vida.&quot; ]"><span
                    class="wrap">?</span></a>
        </h1>
        <!-- JavaScript para animar digitação. -->
        <script type="text/javascript">
            var TxtType = function(el, toRotate, period) {
                this.toRotate = toRotate;
                this.el = el;
                this.loopNum = 0;
                this.period = parseInt(period, 10) || 2000;
                this.txt = '';
                this.tick();
                this.isDeleting = false;
            };

            TxtType.prototype.tick = function() {
                var i = this.loopNum % this.toRotate.length;
                var fullTxt = this.toRotate[i];

                if (this.isDeleting) {
                    this.txt = fullTxt.substring(0, this.txt.length - 1);
                } else {
                    this.txt = fullTxt.substring(0, this.txt.length + 1);
                }

                this.el.innerHTML = '<span class="wrap">' + this.txt + '</span>';

                var that = this;
                var delta = 200 - Math.random() * 100;

                if (this.isDeleting) {
                    delta /= 2;
                }

                if (!this.isDeleting && this.txt === fullTxt) {
                    delta = this.period;
                    this.isDeleting = true;
                } else if (this.isDeleting && this.txt === '') {
                    this.isDeleting = false;
                    this.loopNum++;
                    delta = 500;
                }

                setTimeout(function() {
                    that.tick();
                }, delta);
            };

            window.onload = function() {
                var elements = document.getElementsByClassName('typewrite');
                for (var i = 0; i < elements.length; i++) {
                    var toRotate = elements[i].getAttribute('data-type');
                    var period = elements[i].getAttribute('data-period');
                    if (toRotate) {
                        new TxtType(elements[i], JSON.parse(toRotate), period);
                    }
                }
                // INJECT CSS
                var css = document.createElement("style");
                css.type = "text/css";
                css.innerHTML = ".typewrite > .wrap { border-right: 0.08em solid #0086FF; }";
                document.body.appendChild(css);
            };
        </script>
    </div>     --}}
    </div>

    <!-- scripts -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>
