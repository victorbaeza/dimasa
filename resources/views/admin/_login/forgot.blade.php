<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>DEFAULT | Contraseña olvidada</title>

    <link href="/vendor/css/bootstrap.min.css" rel="stylesheet">
    <link href="/vendor/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="/vendor/css/animate.css" rel="stylesheet">
    <link href="/vendor/css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="passwordBox animated fadeInDown">
        <div class="row">
            @include('layouts.admin.notifications')
            <div class="col-md-12">
                <div class="ibox-content">

                    <h2 class="font-bold">Contraseña olvidada</h2>

                    <p>
                        Introduzca su nombre de usuario y se le enviará un email para reestablecer la contraseña
                    </p>

                    <div class="row">

                        <div class="col-lg-12">
                            <form class="m-t" role="form" method="POST" action="/admin/forgot">
                              @csrf
                                <div class="form-group">
                                    <input type="text" class="form-control" name="u" placeholder="Nombre de usuario" required>
                                </div>

                                <button type="submit" class="btn btn-primary block full-width m-b">Reestablecer contraseña</button>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
               <small> DEFAULT App - Creado por <a href="#" target="_blank">Joaquín Xia</a></small>
            </div>
            <div class="col-md-6 text-right">
               <small>© {{date('Y')}}</small>
            </div>
        </div>
    </div>

</body>
</html>
