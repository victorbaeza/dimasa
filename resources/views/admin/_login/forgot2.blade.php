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
            <div class="col-md-12">
                <div class="ibox-content">

                  @include('layouts.admin.notifications')
                  <br>
                  <br>
                  <a href="/admin" class="btn btn-primary block full-width m-b">Volver</a>
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
