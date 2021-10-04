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

                    <h2 class="font-bold">Reestablecer Contraseña</h2>

                    <p>
                        Introduzca su nueva contraseña
                    </p>

                    <div class="row">

                        <div class="col-lg-12">
                            <form class="m-t" role="form" method="POST" action="/admin/reset">
                            <input type="hidden" name="id" value="{{$check->id}}" />
                            <input type="hidden" name="code" value="{{$check->token}}" />
                              @csrf
                                <div class="form-group">
                                    <input type="password" class="form-control" name="pwd" placeholder="Contraseña" required>
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" name="pwd2" placeholder="Confirmar" required>
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
