<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Contact Us - Test Website E-Commerce</title>
        <link rel="icon" href="/img/favicon.png" type="image/png" />
        <link href="/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/vendors/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="/vendors/linearicons/linearicons-1.0.0.css">
        <link rel="stylesheet" href="/vendors/wow-js/animate.css">
        <link rel="stylesheet" href="/vendors/owl_carousel/owl.carousel.css">
        <link href="/css/style.css" rel="stylesheet">
    </head>
    <body>
        <!--==========Main Header==========-->
        <header class="main_header_area">
            <nav class="navbar navbar-default navbar-fixed-top" id="main_navbar">
                <div class="container-fluid searchForm">
                    <form action="#" class="row">
                        <div class="input-group">
                            <span class="input-group-addon"><i class="lnr lnr-magnifier"></i></span>
                            <input type="search" name="search" class="form-control" placeholder="Type & Hit Enter">
                            <span class="input-group-addon form_hide"><i class="lnr lnr-cross"></i></span>
                        </div>
                    </form>
                </div>
                <div class="container">
                    <div class="row">
                    <div class="col-md-3 p0">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="/" style="font-size: 22px; font-weight: bold; color: #333; margin-top: 15px; white-space: nowrap;">
                                TEST WEBSITE
                            </a>
                        </div>
                    </div>
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <div class="col-md-7 p0">
                            <ul class="nav navbar-nav main_nav">
                                <li><a href="/#product-list">Laptops</a></li>
                                <li><a href="/#product-list">Drones</a></li>
                                <li><a href="/#product-list">Gadgets</a></li>
                                <li><a href="/#product-list">Phones</a></li>
                                <li><a href="/#product-list">VR</a></li>
                                <li><a href="/contact">Contact us</a></li>
                            </ul>
                        </div>
                        <div class="col-md-2 p0">
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="/cart" class="nav_cart" style="margin-right: 30px;"><i class="lnr lnr-cart"></i> Cart (<span id="cart-count">0</span>)</a></li>
                                <li><a href="#" class="nav_searchFrom"><i class="lnr lnr-magnifier"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    </div>
                </div>
            </nav>
        </header>
        <!--==========Main Header==========-->

        <section class="slider_area row m0" style="min-height: 200px; background: #333; padding-top: 100px;">
            <div class="container">
                <h2 style="color: white; text-align: center;">Contact Us</h2>
            </div>
        </section>

        <section class="best_business_area row">
            <div class="container" style="padding: 50px 0;">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <form id="contactForm">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Your Name" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="Your Email" required>
                            </div>
                            <div class="form-group">
                                <label for="message">Message</label>
                                <textarea class="form-control" id="message" rows="5" placeholder="Your Message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-top: 10px;" onclick="alert('Message sent successfully!'); return false;">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer_area row">
            <div class="container custom-container">
                <div class="copy_right_area">
                    <h4 class="copy_right"></h4>
                </div>
            </div>
        </footer>

        <script src="/js/jquery-1.12.4.min.js"></script>
        <script src="/js/bootstrap.min.js"></script>
        <script src="/js/theme.js"></script>
    </body>
</html>
