<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="{{Auth::user()->showPicture()}}"
                         style="max-width:50px;"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{Auth::user()->name}}</span>
                        <span class="text-muted text-xs block">Opciones <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="{{route('admin.user.edit', Auth::id())}}">Perfil</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('admin.logout')}}">Cerrar Sesión</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    <img src="/images/logo.png" style="max-width:50px;">
                </div>
            </li>
            @php $url = Request::segment(2); @endphp

            {{-- SIDEBAR ADMIN --}}
            <li @if($url=='home') class="active" @endif>
                <a href="{{route('admin.home')}}"><i class="fa fa-home"></i> <span class="nav-label">Inicio</span></a>
            </li>

            <li @if($url=='dashboards') class="active" @endif>
                <a href="{{route('admin.dashboards')}}"><i class="far fa-chart-bar"></i> <span class="nav-label">Informes y estadísticas</span></a>
            </li>

            <li @if($url=='orders') class="active" @endif>
                <a><i class="fa fa-list"></i> <span class="nav-label">Pedidos</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li @if(Helper::checkUrl(route('admin.orders.list'))) class="active" @endif><a href="{{route('admin.orders.list')}}">Listado</a></li>
                    <li @if(Helper::checkUrl(route('admin.shipment.list'))) class="active" @endif><a href="{{route('admin.shipment.list')}}">Métodos de envío</a></li>
                    <li @if(Helper::checkUrl(route('admin.coupons.list'))) class="active" @endif><a href="{{route('admin.coupons.list')}}">Cupones</a></li>
                </ul>
            </li>

            <li @if($url=='purchases') class="active" @endif>
                <a class="a_sidebar_principal"><i class="fa fa-shopping-cart"></i> <span class="nav-label">Compras</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li @if(Helper::checkUrl(route('admin.purchases.list'))) class="active" @endif><a href="{{ route('admin.purchases.list') }}">Listado</a></li>
                    <li @if(Helper::checkUrl(route('admin.purchases.create'))) class="active" @endif><a href="{{ route('admin.purchases.create') }}">Crear Compra</a></li>
                </ul>
            </li>

            <li @if($url=='invoices') class="active" @endif>
                <a><i class="fa fa-money"></i> <span
                        class="nav-label">Facturas</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li @if(Helper::checkUrl(route('admin.invoices.list'))) class="active" @endif><a href="{{route('admin.invoices.list')}}">Listado</a></li>
                </ul>
            </li>

            <li @if($url=='products') class="active" @endif>
                <a><i class="fa fa-product-hunt"></i> <span class="nav-label">Productos</span> <span
                        class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    {{-- <li @if(Helper::checkUrl(route('admin.products.list'))) class="active" @endif><a
                            href="{{route('admin.products.list')}}">Listado</a></li>
                    <li @if(Helper::checkUrl(route('admin.products.create'))) class="active" @endif><a
                            href="{{route('admin.products.create')}}">Crear Nuevo</a></li>
                    <li @if(Helper::checkUrl(route('admin.products.categories.list'))) class="active" @endif><a
                            href="{{route('admin.products.categories.list')}}">Categorías</a></li> --}}
                    <li @if(Helper::checkUrl(route('admin.products.list'))) class="active" @endif><a href="{{route('admin.products.list')}}">Listado</a></li>
                    <li @if(Helper::checkUrl(route('admin.products.create'))) class="active" @endif><a href="{{route('admin.products.create')}}">Crear Nuevo</a></li>
                    <li @if(Helper::checkUrl(route('admin.products.categories.list'))) class="active" @endif><a href="{{route('admin.products.categories.list')}}">Categorías</a></li>
                    <li @if(Helper::checkUrl(route('admin.products.brands.list'))) class="active" @endif><a href="{{ route('admin.products.brands.list') }}">Marcas</a></li>
                    <li @if(Helper::checkUrl(route('admin.products.offers.list'))) class="active" @endif><a href="{{route('admin.products.offers.list')}}">Ofertas</a></li>
                </ul>
            </li>

            <li @if($url=='clients') class="active" @endif>
                <a><i class="fa fa-user"></i> <span class="nav-label">Clientes</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li @if(Helper::checkUrl(route('admin.client.list'))) class="active" @endif><a
                            href="{{route('admin.client.list')}}">Listado</a></li>
                    <li @if(Helper::checkUrl(route('admin.client.create'))) class="active" @endif><a
                            href="{{route('admin.client.create')}}">Crear Nuevo</a></li>
                </ul>
            </li>

            <li @if($url=='vendors') class="active" @endif>
                <a><i class="fa fa-shopping-cart"></i> <span class="nav-label">Proveedores</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li @if(Helper::checkUrl(route('admin.vendors.list'))) class="active" @endif><a href="{{ route('admin.vendors.list') }}">Listado</a></li>
                    <li @if(Helper::checkUrl(route('admin.vendors.create'))) class="active" @endif><a href="{{ route('admin.vendors.create') }}">Crear Proveedor</a></li>
                </ul>
            </li>

            <li @if($url=='users') class="active" @endif>
                <a><i class="fa fa-user"></i> <span class="nav-label">Usuarios</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li @if(Helper::checkUrl(route('admin.user.list'))) class="active" @endif><a
                            href="{{route('admin.user.list')}}">Listado</a></li>
                    <li @if(Helper::checkUrl(route('admin.user.create'))) class="active" @endif><a
                            href="{{route('admin.user.create')}}">Crear Nuevo</a></li>
                </ul>
            </li>

            <li @if($url=='blogs') class="active" @endif>
                <a><i class="fa fa-newspaper-o"></i> <span class="nav-label">Blogs</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li @if(Helper::checkUrl(route('admin.blog.list'))) class="active" @endif><a
                            href="{{route('admin.blog.list')}}">Entradas / Post</a></li>
                    <li @if(Helper::checkUrl(route('admin.blog.create'))) class="active" @endif><a
                            href="{{route('admin.blog.create')}}">Nuevo Blog</a></li>
                    <li @if(Helper::checkUrl(route('admin.blog.category.list'))) class="active" @endif><a
                            href="{{route('admin.blog.category.list')}}">Categorías</a></li>
                </ul>
            </li>

            <li @if($url=='contacts') class="active" @endif>
                <a href="{{route('admin.contacts.list')}}"><i class="fa fa-envelope-open" aria-hidden="true"></i> <span
                        class="nav-label">Contactos</span></a>
            </li>

            <li @if($url=='seo') class="active" @endif>
                <a><i class="fa fa-search"></i> <span class="nav-label">SEO</span> <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li @if(Helper::checkUrl(route('admin.seo.list'))) class="active" @endif><a
                            href="{{route('admin.seo.list')}}">Sitemaps</a></li>
                </ul>
            </li>
        </ul>

    </div>
</nav>
