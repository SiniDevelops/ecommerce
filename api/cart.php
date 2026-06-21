<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Shopping Cart - Test Website E-Commerce</title>
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
                <h2 style="color: white; text-align: center;">Your Shopping Cart</h2>
            </div>
        </section>

        <section class="best_business_area row">
            <div class="container" style="padding: 50px 0;">
                <div class="row">
                    <div class="col-md-12" id="cart-items-container">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Price</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody id="cart-items-body">
                                <!-- Items injected by JS -->
                            </tbody>
                        </table>
                        <div style="text-align: right;">
                            <h3>Total: $<span id="cart-total">0.00</span></h3>
                            <button class="btn btn-success" onclick="checkout()">Proceed to Checkout</button>
                        </div>
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
        <script>
            function loadCartItems() {
                try {
                    let cart = JSON.parse(localStorage.getItem('ecommerce_cart') || '[]');
                    let tbody = document.getElementById('cart-items-body');
                    if (!tbody) return;
                    
                    if (!Array.isArray(cart) || cart.length === 0) {
                        tbody.innerHTML = '<tr><td colspan="4" class="text-center">Your cart is empty.</td></tr>';
                        if (document.getElementById('cart-total')) document.getElementById('cart-total').innerText = '0.00';
                        if (document.getElementById('cart-count')) document.getElementById('cart-count').innerText = '0';
                        return;
                    }
                    
                    let html = '';
                    let total = 0;
                    
                    for (let i = 0; i < cart.length; i++) {
                        let item = cart[i];
                        if (!item || typeof item !== 'object') continue;
                        
                        let price = parseFloat(item.price);
                        if (isNaN(price)) price = 0;
                        total += price;
                        
                        let name = item.name || 'Unknown Item';
                        let img = item.image || 'c-1.png';
                        
                        html += '<tr>';
                        html += '<td><img src="/img/' + img + '" alt="' + name + '" style="height: 50px;"></td>';
                        html += '<td>' + name + '</td>';
                        html += '<td>$' + price.toFixed(2) + '</td>';
                        html += '<td><button class="btn btn-danger btn-sm" onclick="removeFromCart(' + i + ')">Remove</button></td>';
                        html += '</tr>';
                    }
                    
                    tbody.innerHTML = html;
                    if (document.getElementById('cart-total')) document.getElementById('cart-total').innerText = total.toFixed(2);
                    if (document.getElementById('cart-count')) document.getElementById('cart-count').innerText = cart.length;
                } catch(e) {
                    console.error("Cart error: ", e);
                    localStorage.removeItem('ecommerce_cart');
                    document.getElementById('cart-items-body').innerHTML = '<tr><td colspan="4" class="text-center">Your cart is empty.</td></tr>';
                    if (document.getElementById('cart-count')) document.getElementById('cart-count').innerText = '0';
                }
            }

            function removeFromCart(index) {
                let cart = JSON.parse(localStorage.getItem('ecommerce_cart') || '[]');
                cart.splice(index, 1);
                localStorage.setItem('ecommerce_cart', JSON.stringify(cart));
                loadCartItems();
            }

            function checkout() {
                let cart = JSON.parse(localStorage.getItem('ecommerce_cart') || '[]');
                if (cart.length === 0) {
                    alert('Your cart is empty!');
                    return;
                }
                alert('Thank you for your purchase! Checkout logic would go here.');
                localStorage.removeItem('ecommerce_cart');
                loadCartItems();
            }

            // Execute immediately without relying on document.ready
            loadCartItems();
        </script>
    </body>
</html>
