<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Panel de Administración - Acceso | E-commerce</title>
    <link rel="shortcut icon" href="/images/favicon-32x32.png" />

    <link href="/vendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/vendor/css/animate.css" rel="stylesheet">
    <link href="/vendor/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown" style="margin-top:5rem;">

      @include('layouts.admin.notifications')

        <div>
            <div>
                <h1 class="logo-name">E+</h1>
            </div>

            <h3 class="m-t-md">Acceso al panel</h3>
            <form method="POST" class="m-t" role="form" action="/admin">
            <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                <div class="form-group">
                    <input type="text" class="form-control" name="user" placeholder="Usuario" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Entrar</button>
                {{-- <div class="form-group row">
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">@lang('messages.recuerdame')</label>
                        </div>
                    </div>
                </div> --}}
                {{-- <a href="/admin/forgot"><small>¿Olvidaste tu contraseña?</small></a> --}}
            </form>

            <p class="m-t"> <small>{{ date('Y') }} &copy; E-commerce App - Creado por <a href="https://www.ibermedia.com" target="_blank">Ibermedia</a></small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="/vendor/js/jquery-3.1.1.min.js"></script>
    <script src="/vendor/js/popper.min.js"></script>
    <script src="/vendor/js/bootstrap.js"></script>

</body>
</html>
