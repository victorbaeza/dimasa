<header class="header">
  <div class="header-top d-lg-show">
    <div class="container">
      <div class="header-left">

      </div>
      <div class="header-right">
        <div class="social-links inline-links d-lg-show">
          <a href="#" class="social-link social-twitter fab fa-twitter"></a>
          <a href="#" class="social-link social-linkedin fab fa-linkedin-in"></a>
          <a href="#" class="social-link social-facebook fab fa-facebook-f"></a>
          <a href="#" class="social-link social-pinterest fab fa-youtube"></a>
        </div>

        <a href="tel:+34952336808" class="contact d-lg-show"><i class="d-icon-phone"></i>+34 952 33 68 08</a>
        <!-- End DropDown Menu -->
        <span class="divider"></span>
        <a href="{{ route('site.contact') }}" class="contact d-lg-show">Contacto</a>

        <!-- End of Login -->
      </div>
    </div>
  </div>
  <!-- End HeaderTop -->
  <div class="header-middle">
    <div class="container">
      <div class="header-left mr-4">
        <a href="#" class="mobile-menu-toggle">
          <i class="d-icon-bars2"></i>
        </a>
        <a href="/" class="logo">
          <img src="/images/dimasa.png" alt="logo" width="155" height="44" />
        </a>
        <!-- End Logo -->

        <div class="header-search hs-expanded">
          <form action="#" class="input-wrapper">
            <input type="text" class="form-control" name="search" autocomplete="off" placeholder="Buscar..." required />
            <button class="btn btn-search" type="submit">
              <i class="d-icon-search"></i>
            </button>
          </form>
        </div>
        <!-- End Header Search -->
      </div>
      <div class="header-right">
        <div class="mr-5 d-flex d-lg-none align-items-center">
          <a class="login-link mr-0" href="#login-modal" data-toggle="login-modal"><i class="d-icon-user"></i></a>
        </div>
        <div class="icon-box icon-box-side">
          <a href="#">
            <div class="icon-box-icon mr-0 mr-lg-2">
              <i class="fa fa-file-pdf"></i>
            </div>
            <div class="icon-box-content d-lg-show">
              <p>Descargar cat??logo</p>
            </div>
          </a>
        </div>
        <div class="icon-box icon-box-side align-items-center d-lg-show">
          <a href="#">
            <div class="icon-box-icon mr-0 mr-lg-2">
              <i class="d-icon-user"></i>
            </div>
            <div class="icon-box-content d-lg-show d-flex">
              <a class="login-link mr-1" href="#" data-toggle="login-modal">Iniciar sesi??n</a>
              <span class="delimiter">/</span>
              <a class="register-link ml-1 mr-0" href="#" data-toggle="login-modal">Registrarse</a>
            </div>
          </a>
        </div>

        <!-- <span class="divider mr-4"></span>
                    <a href="#" class="compare">
                        <i class="d-icon-compare"></i>
                    </a>
                    <a href="wishlist.html" class="wishlist">
                        <i class="d-icon-heart"></i>
                    </a> -->
        <span class="divider"></span>
        <div class="dropdown cart-dropdown type2 cart-offcanvas mr-0 mr-lg-2">
          <a href="#" class="cart-toggle label-block link">
            <div class="cart-label d-lg-show">
              <span class="cart-name">Productos:</span>
              <span class="cart-price">1.038,33 ???</span>
            </div>
            <i class="d-icon-bag"><span class="cart-count">1</span></i>
          </a>
          <div class="cart-overlay"></div>
          <!-- End Cart Toggle -->
          <div class="dropdown-box">
            <div class="cart-header">
              <h4 class="cart-title">Cesta de la compra</h4>
              <a href="#" class="btn btn-dark btn-link btn-icon-right btn-close">cerrar<i class="d-icon-arrow-right"></i><span class="sr-only">Cesta</span></a>
            </div>
            <div class="products scrollable">
              <div class="product product-cart">
                <figure class="product-media">
                  <a href="{{ route('products.product') }}">
                    <img src="/images/product1.jpg" alt="product" width="80" height="88" />
                  </a>
                  <button class="btn btn-link btn-close">
                    <i class="fas fa-times"></i><span class="sr-only">Close</span>
                  </button>
                </figure>
                <div class="product-detail">
                  <a href="{{ route('products.product') }}" class="product-name">MULTI-SPLIT INVERTER MOD. TERMAT R32</a>
                  <div class="price-box">
                    <span class="product-quantity">1</span>
                    <span class="product-price">1.038,33 ???</span>
                  </div>
                </div>
              </div>
              <!-- End of Cart Product -->
            </div>
            <!-- End of Products  -->
            <div class="cart-total">
              <label>Subtotal:</label>
              <span class="price">1.038,33 ???</span>
            </div>
            <!-- End of Cart Total -->
            <div class="cart-action">
              <!-- <a href="cart.html" class="btn btn-dark btn-link">View Cart</a> -->
              <a href="#" class="btn btn-primary btn-outline"><span>PEDIR</span></a>
            </div>
            <!-- End of Cart Action -->
          </div>
          <!-- End Dropdown Box -->
        </div>
      </div>
    </div>
  </div>

  <div class="header-bottom sticky-header fix-top sticky-content d-lg-show">
    <div class="container">
      <div class="header-left">
        <!-- <div class="pt-2 pb-2 pr-2 sticky-header-logo">
          <a href="/">
          <img src="images/favicon.png" width=35 />
        </a>
        </div> -->
        <div class="dropdown category-dropdown" data-visible="true">
          <a href="#" class="category-toggle" role="button" data-toggle="dropdown" data-display="static" title="Cat??logo de productos">
            <i class="d-icon-bars"></i>
            <span>Cat??logo de productos</span>
          </a>

          <div class="dropdown-box">
            <ul class="menu vertical-menu category-menu">
              <li>
                <a href="/catalogo/fontaneria">
                  <img width="22" src="/images/icons/azules/1.png" class="mr-1" />Fontaner??a
                </a>
                <ul class="megamenu">
                  <li id="fontaneria">
                    <h4 class="menu-title">Fontaner??a</h4>
                    <ul>
                      <li><a href="#" class="menu-category" data-subcategory="#fontaneria1">Subcategor??a 1</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#fontaneria2">Subcategor??a 2</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#fontaneria3">Subcategor??a 3</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#fontaneria4">Subcategor??a 4</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#fontaneria5">Subcategor??a 5</a></li>
                    </ul>
                  </li>

                  <li class="menu-subcategory" id="fontaneria1">
                    <h4 class="menu-title"><span><i class="fa fa-chevron-right font-size-1"></i></span>Subcategor??a 1</h4>
                    <ul>
                      <li><a href="#" data-category="#fontaneria">Subcategor??a 6</a></li>
                      <li><a href="#" data-category="#fontaneria">Subcategor??a 7</a></li>
                      <li><a href="#" data-category="#fontaneria">Subcategor??a 8</a></li>
                      <li><a href="#" data-category="#fontaneria">Subcategor??a 9</a></li>
                      <li><a href="#" data-category="#fontaneria">Subcategor??a 10</a></li>
                    </ul>
                  </li>

                  <li class="menu-subcategory" id="fontaneria2">
                    <h4 class="menu-title"><span><i class="fa fa-chevron-right font-size-1"></i></span>Subcategor??a 2</h4>
                    <ul>
                      <li><a href="#">Et dolore</a></li>
                      <li><a href="#">Sit amet</a></li>
                      <li><a href="#">Consectetur</a></li>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                    </ul>
                  </li>

                  <li class="menu-subcategory" id="fontaneria3">
                    <h4 class="menu-title"><span><i class="fa fa-chevron-right font-size-1"></i></span>Subcategor??a 3</h4>
                    <ul>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                    </ul>
                  </li>

                  <li class="menu-subcategory" id="fontaneria4">
                    <h4 class="menu-title"><span><i class="fa fa-chevron-right font-size-1"></i></span>Subcategor??a 4</h4>
                    <ul>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                    </ul>
                  </li>

                  <li class="menu-subcategory" id="fontaneria5">
                    <h4 class="menu-title"><span><i class="fa fa-chevron-right font-size-1"></i></span>Subcategor??a 5</h4>
                    <ul>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                    </ul>
                  </li>

                </ul>
              </li>
              <li>
                <a href="/catalogo/fontaneria">
                  <img width="22" src="/images/icons/azules/2.png" class="mr-1" />ACS / Calefacci??n
                </a>
                <ul class="megamenu">
                  <li id="acs">
                    <h4 class="menu-title">ACS / Calefacci??n</h4>
                    <ul>
                      <li><a href="#" class="menu-category" data-subcategory="#acs1">Subcategor??a 1</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#acs2">Subcategor??a 2</a></li>
                    </ul>
                  </li>

                  <li class="menu-subcategory" id="acs1">
                    <h4 class="menu-title"><span><i class="fa fa-chevron-right font-size-1"></i></span>Subcategor??a 1</h4>
                    <ul>
                      <li><a href="#" data-category="#acs">Subcategor??a 6</a></li>
                      <li><a href="#" data-category="#acs">Subcategor??a 7</a></li>
                      <li><a href="#" data-category="#acs">Subcategor??a 8</a></li>
                      <li><a href="#" data-category="#acs">Subcategor??a 9</a></li>
                      <li><a href="#" data-category="#acs">Subcategor??a 10</a></li>
                    </ul>
                  </li>

                  <li class="menu-subcategory" id="acs2">
                    <h4 class="menu-title"><span><i class="fa fa-chevron-right font-size-1"></i></span>Subcategor??a 2</h4>
                    <ul>
                      <li><a href="#">Et dolore</a></li>
                      <li><a href="#">Sit amet</a></li>
                      <li><a href="#">Consectetur</a></li>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                    </ul>
                  </li>

                </ul>
              </li>
              <li>
                <a href="/catalogo/fontaneria">
                  <img width="22" src="/images/icons/azules/3.png" class="mr-1" />Aire acondicionado
                </a>
                <ul class="megamenu">
                  <li id="aire">
                    <h4 class="menu-title">Aire acondicionado</h4>
                    <ul>
                      <li><a href="#" class="menu-category" data-subcategory="#aire1">Subcategor??a 1</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#aire2">Subcategor??a 2</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#aire3">Subcategor??a 3</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#aire4">Subcategor??a 4</a></li>
                    </ul>
                  </li>

                  <li class="menu-subcategory" id="aire1">
                    <h4 class="menu-title"><span><i class="fa fa-chevron-right font-size-1"></i></span>Subcategor??a 1</h4>
                    <ul>
                      <li><a href="#" data-category="#aire">Subcategor??a 6</a></li>
                      <li><a href="#" data-category="#aire">Subcategor??a 7</a></li>
                      <li><a href="#" data-category="#aire">Subcategor??a 8</a></li>
                      <li><a href="#" data-category="#aire">Subcategor??a 9</a></li>
                      <li><a href="#" data-category="#aire">Subcategor??a 10</a></li>
                    </ul>
                  </li>

                  <li class="menu-subcategory" id="aire2">
                    <h4 class="menu-title"><span><i class="fa fa-chevron-right font-size-1"></i></span>Subcategor??a 2</h4>
                    <ul>
                      <li><a href="#">Et dolore</a></li>
                      <li><a href="#">Sit amet</a></li>
                      <li><a href="#">Consectetur</a></li>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                    </ul>
                  </li>

                  <li class="menu-subcategory" id="aire3">
                    <h4 class="menu-title"><span><i class="fa fa-chevron-right font-size-1"></i></span>Subcategor??a 2</h4>
                    <ul>
                      <li><a href="#">Et dolore</a></li>
                      <li><a href="#">Sit amet</a></li>
                      <li><a href="#">Consectetur</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                    </ul>
                  </li>

                  <li class="menu-subcategory" id="aire4">
                    <h4 class="menu-title"><span><i class="fa fa-chevron-right font-size-1"></i></span>Subcategor??a 2</h4>
                    <ul>
                      <li><a href="#">Consectetur</a></li>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                    </ul>
                  </li>

                </ul>
              </li>
              <li>
                <a href="/catalogo/fontaneria">
                  <img width="22" src="/images/icons/azules/4.png" class="mr-1" />Energ??a renovable
                </a>
                <ul class="megamenu">
                  <li id="fontaneria">
                    <h4 class="menu-title">Energ??a renovable</h4>
                    <ul>
                      <li><a href="#" class="menu-category" data-subcategory="#fontaneria1">Subcategor??a 1</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#fontaneria2">Subcategor??a 2</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#fontaneria3">Subcategor??a 3</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#fontaneria4">Subcategor??a 4</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#fontaneria5">Subcategor??a 5</a></li>
                    </ul>
                  </li>

                  <li class="menu-subcategory" id="fontaneria1">
                    {{-- <h4 class="menu-title">Vitae lorem</h4> --}}
                    <ul>
                      <li><a href="#" data-category="#fontaneria">Subcategor??a 6</a></li>
                      <li><a href="#" data-category="#fontaneria">Subcategor??a 7</a></li>
                      <li><a href="#" data-category="#fontaneria">Subcategor??a 8</a></li>
                      <li><a href="#" data-category="#fontaneria">Subcategor??a 9</a></li>
                      <li><a href="#" data-category="#fontaneria">Subcategor??a 10</a></li>
                    </ul>
                  </li>

                  <li class="menu-subcategory" id="fontaneria2">
                    {{-- <h4 class="menu-title">Vitae lorem</h4> --}}
                    <ul>
                      <li><a href="#">Et dolore</a></li>
                      <li><a href="#">Sit amet</a></li>
                      <li><a href="#">Consectetur</a></li>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                    </ul>
                  </li>

                </ul>
              </li>
              <li>
                <a href="/catalogo/fontaneria">
                  <img width="22" src="/images/icons/azules/5.png" class="mr-1" />Tuber??a y valvuler??a
                </a>
                <ul class="megamenu">
                  <li id="fontaneria">
                    <h4 class="menu-title">Tuber??a y valvuler??a</h4>
                    <ul>
                      <li><a href="#" class="menu-category" data-subcategory="#fontaneria1">Subcategor??a 1</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#fontaneria2">Subcategor??a 2</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#fontaneria3">Subcategor??a 3</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#fontaneria4">Subcategor??a 4</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#fontaneria5">Subcategor??a 5</a></li>
                    </ul>
                  </li>

                  <li class="menu-subcategory" id="fontaneria1">
                    {{-- <h4 class="menu-title">Vitae lorem</h4> --}}
                    <ul>
                      <li><a href="#" data-category="#fontaneria">Subcategor??a 6</a></li>
                      <li><a href="#" data-category="#fontaneria">Subcategor??a 7</a></li>
                      <li><a href="#" data-category="#fontaneria">Subcategor??a 8</a></li>
                      <li><a href="#" data-category="#fontaneria">Subcategor??a 9</a></li>
                      <li><a href="#" data-category="#fontaneria">Subcategor??a 10</a></li>
                    </ul>
                  </li>

                  <li class="menu-subcategory" id="fontaneria2">
                    {{-- <h4 class="menu-title">Vitae lorem</h4> --}}
                    <ul>
                      <li><a href="#">Et dolore</a></li>
                      <li><a href="#">Sit amet</a></li>
                      <li><a href="#">Consectetur</a></li>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                    </ul>
                  </li>

                </ul>
              </li>
              <li>
                <a href="/catalogo/fontaneria">
                  <img width="22" src="/images/icons/azules/6.png" class="mr-1" />Contraincendios
                </a>
                <ul class="megamenu">
                  <li id="fontaneria">
                    <h4 class="menu-title">Contraincendios</h4>
                    <ul>
                      <li><a href="#" class="menu-category" data-subcategory="#fontaneria1">Subcategor??a 1</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#fontaneria2">Subcategor??a 2</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#fontaneria3">Subcategor??a 3</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#fontaneria4">Subcategor??a 4</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#fontaneria5">Subcategor??a 5</a></li>
                    </ul>
                  </li>

                  <li class="menu-subcategory" id="fontaneria1">
                    {{-- <h4 class="menu-title">Vitae lorem</h4> --}}
                    <ul>
                      <li><a href="#" data-category="#fontaneria">Subcategor??a 6</a></li>
                      <li><a href="#" data-category="#fontaneria">Subcategor??a 7</a></li>
                      <li><a href="#" data-category="#fontaneria">Subcategor??a 8</a></li>
                      <li><a href="#" data-category="#fontaneria">Subcategor??a 9</a></li>
                      <li><a href="#" data-category="#fontaneria">Subcategor??a 10</a></li>
                    </ul>
                  </li>

                  <li class="menu-subcategory" id="fontaneria2">
                    {{-- <h4 class="menu-title">Vitae lorem</h4> --}}
                    <ul>
                      <li><a href="#">Et dolore</a></li>
                      <li><a href="#">Sit amet</a></li>
                      <li><a href="#">Consectetur</a></li>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                    </ul>
                  </li>

                </ul>
              </li>
              <li>
                <a href="/catalogo/fontaneria">
                  <img width="22" src="/images/icons/azules/7.png" class="mr-1" />Bombeo
                </a>
                <ul class="megamenu">
                  <li id="bombeo">
                    <h4 class="menu-title">Bombeo</h4>
                    <ul>
                      <li><a href="#" class="menu-category" data-subcategory="#bombeo1">Subcategor??a 1</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#bombeo2">Subcategor??a 2</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#bombeo3">Subcategor??a 3</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#bombeo4">Subcategor??a 4</a></li>
                      <li><a href="#" class="menu-category" data-subcategory="#bombeo5">Subcategor??a 5</a></li>
                    </ul>
                  </li>

                  <li class="menu-subcategory" id="bombeo1">
                    {{-- <h4 class="menu-title">Vitae lorem</h4> --}}
                    <ul>
                      <li><a href="#" data-category="#bombeo">Subcategor??a 6</a></li>
                      <li><a href="#" data-category="#bombeo">Subcategor??a 7</a></li>
                      <li><a href="#" data-category="#bombeo">Subcategor??a 8</a></li>
                      <li><a href="#" data-category="#bombeo">Subcategor??a 9</a></li>
                      <li><a href="#" data-category="#bombeo">Subcategor??a 10</a></li>
                    </ul>
                  </li>

                  <li class="menu-subcategory" id="bombeo2">
                    {{-- <h4 class="menu-title">Vitae lorem</h4> --}}
                    <ul>
                      <li><a href="#">Et dolore</a></li>
                      <li><a href="#">Sit amet</a></li>
                      <li><a href="#">Consectetur</a></li>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                    </ul>
                  </li>

                </ul>
              </li>
              <li>
                <a href="/catalogo/fontaneria">
                  <img width="22" src="/images/icons/azules/8.png" class="mr-1" />Saneamientos
                </a>
                <ul class="megamenu">
                  <li>
                    <h4 class="menu-title">Lorem ipsum</h4>
                    <ul>
                      <li><a href="#">Et dolore</a></li>
                      <li><a href="#">Sit amet</a></li>
                      <li><a href="#">Consectetur</a></li>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                      <li><a href="#">Vitae</a></li>
                      <li><a href="#">Aliquet </a></li>
                    </ul>
                  </li>
                  <li>
                    <h4 class="menu-title">Vitae lorem</h4>
                    <ul>
                      <li><a href="#">Et dolore</a></li>
                      <li><a href="#">Sit amet</a></li>
                      <li><a href="#">Consectetur</a></li>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                      <li><a href="#">Vitae</a></li>
                      <li><a href="#">Aliquet </a></li>
                    </ul>
                  </li>
                  <li>

                  </li>
                </ul>
              </li>
              <li>
                <a href="/catalogo/fontaneria">
                  <img width="22" src="/images/icons/azules/9.png" class="mr-1" />Sanitarios y grifer??as
                </a>
                <ul class="megamenu">
                  <li>
                    <h4 class="menu-title">Lorem ipsum</h4>
                    <ul>
                      <li><a href="#">Et dolore</a></li>
                      <li><a href="#">Sit amet</a></li>
                      <li><a href="#">Consectetur</a></li>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                      <li><a href="#">Vitae</a></li>
                      <li><a href="#">Aliquet </a></li>
                    </ul>
                  </li>
                  <li>
                    <h4 class="menu-title">Vitae lorem</h4>
                    <ul>
                      <li><a href="#">Et dolore</a></li>
                      <li><a href="#">Sit amet</a></li>
                      <li><a href="#">Consectetur</a></li>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                      <li><a href="#">Vitae</a></li>
                      <li><a href="#">Aliquet </a></li>
                    </ul>
                  </li>
                  <li>

                  </li>
                </ul>
              </li>
              <li>
                <a href="/catalogo/fontaneria">
                  <img width="22" src="/images/icons/azules/10.png" class="mr-1" />Ventilaci??n
                </a>
                <ul class="megamenu">
                  <li>
                    <h4 class="menu-title">Lorem ipsum</h4>
                    <ul>
                      <li><a href="#">Et dolore</a></li>
                      <li><a href="#">Sit amet</a></li>
                      <li><a href="#">Consectetur</a></li>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                      <li><a href="#">Vitae</a></li>
                      <li><a href="#">Aliquet </a></li>
                    </ul>
                  </li>
                  <li>
                    <h4 class="menu-title">Vitae lorem</h4>
                    <ul>
                      <li><a href="#">Et dolore</a></li>
                      <li><a href="#">Sit amet</a></li>
                      <li><a href="#">Consectetur</a></li>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                      <li><a href="#">Vitae</a></li>
                      <li><a href="#">Aliquet </a></li>
                    </ul>
                  </li>
                  <li>

                  </li>
                </ul>
              </li>
              <li>
                <a href="/catalogo/fontaneria">
                  <img width="22" src="/images/icons/azules/11.png" class="mr-1" />Piscinas
                </a>
                <ul class="megamenu">
                  <li>
                    <h4 class="menu-title">Lorem ipsum</h4>
                    <ul>
                      <li><a href="#">Et dolore</a></li>
                      <li><a href="#">Sit amet</a></li>
                      <li><a href="#">Consectetur</a></li>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                      <li><a href="#">Vitae</a></li>
                      <li><a href="#">Aliquet </a></li>
                    </ul>
                  </li>
                  <li>
                    <h4 class="menu-title">Vitae lorem</h4>
                    <ul>
                      <li><a href="#">Et dolore</a></li>
                      <li><a href="#">Sit amet</a></li>
                      <li><a href="#">Consectetur</a></li>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                      <li><a href="#">Vitae</a></li>
                      <li><a href="#">Aliquet </a></li>
                    </ul>
                  </li>
                  <li>

                  </li>
                </ul>
              </li>
              <li>
                <a href="/catalogo/fontaneria">
                  <img width="22" src="/images/icons/azules/12.png" class="mr-1" />Tratamiento de Agua
                </a>
                <ul class="megamenu">
                  <li>
                    <h4 class="menu-title">Lorem ipsum</h4>
                    <ul>
                      <li><a href="#">Et dolore</a></li>
                      <li><a href="#">Sit amet</a></li>
                      <li><a href="#">Consectetur</a></li>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                      <li><a href="#">Vitae</a></li>
                      <li><a href="#">Aliquet </a></li>
                    </ul>
                  </li>
                  <li>
                    <h4 class="menu-title">Vitae lorem</h4>
                    <ul>
                      <li><a href="#">Et dolore</a></li>
                      <li><a href="#">Sit amet</a></li>
                      <li><a href="#">Consectetur</a></li>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                      <li><a href="#">Vitae</a></li>
                      <li><a href="#">Aliquet </a></li>
                    </ul>
                  </li>
                  <li>

                  </li>
                </ul>
              </li>
              <li>
                <a href="/catalogo/fontaneria">
                  <img width="22" src="/images/icons/azules/13.png" class="mr-1" />Riego
                </a>
                <ul class="megamenu">
                  <li>
                    <h4 class="menu-title">Lorem ipsum</h4>
                    <ul>
                      <li><a href="#">Et dolore</a></li>
                      <li><a href="#">Sit amet</a></li>
                      <li><a href="#">Consectetur</a></li>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                      <li><a href="#">Vitae</a></li>
                      <li><a href="#">Aliquet </a></li>
                    </ul>
                  </li>
                  <li>
                    <h4 class="menu-title">Vitae lorem</h4>
                    <ul>
                      <li><a href="#">Et dolore</a></li>
                      <li><a href="#">Sit amet</a></li>
                      <li><a href="#">Consectetur</a></li>
                      <li><a href="#">Dipiscing elit</a></li>
                      <li><a href="#">Nullam</a></li>
                      <li><a href="#">Vestibulum vel</a></li>
                      <li><a href="#">Donec purus</a></li>
                      <li><a href="#">Vitae</a></li>
                      <li><a href="#">Aliquet </a></li>
                    </ul>
                  </li>
                  <li>

                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>

        <nav class="main-nav">
          <ul class="menu menu-active-underline">
            <li>
              <a href="{{ route('site.index') }}">Inicio</a>
            </li>
            <li>
              <a href="{{ route('site.about') }}">Empresa</a>
            </li>
            <li>
              <a href="{{ route('site.blog') }}">Noticias</a>
            </li>
            <li>
              <a href="{{ route('site.courses') }}">Formaci??n</a>
            </li>
            <li>
              <a href="{{ route('site.brands') }}">Marcas</a>
            </li>
            <li>
              <a href="{{ route('site.partners') }}">Empresas instaladoras</a>
            </li>
          </ul>
        </nav>
      </div>
      <div class="header-right">
        <a href="/catalogo/fontaneria/productos"><i class="d-icon-card"></i>Promociones</a>
        <a href="{{ route('site.downloads') }}" class="ml-4 ml-xl-8"><i class="far fa-arrow-alt-circle-down"></i>Descargas</a>
      </div>
    </div>
  </div>
  <div class="header-bottom2 sticky-header fix-top sticky-content d-lg-show">
    <div class="container">
      <div class="header-right">

        <nav >
          <ul class="menu menu-active-underline">
            <li>
              <a class="menu-area-personal" href="/area_personal">??rea Personal</a>
            </li>
            <li>
              <a class="menu-area-personal" href="/presupuestos">Presupuestos</a>
            </li>
            <li>
              <a class="menu-area-personal" href="/pedidos">Pedidos</a>
            </li>

          </ul>
        </nav>
      </div>

    </div>
  </div>
</header>
<!-- End Header -->