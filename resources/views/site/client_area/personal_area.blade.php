@extends('layouts.site.main')

{{-- css --}}
@section('extracss')

@stop
{{-- Content --}}
@section('content')




<div class="page-content mt-4 mb-10 pb-6 account">
    <div class="container">
        <h2 class="title title-left mb-10">Mi Cuenta</h2>
        <div class="tab tab-vertical gutter-lg">
            <ul class="nav nav-tabs mb-4 col-lg-3 col-md-4" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" href="#account">Datos de Contacto</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#address">Gestión de Direcciones</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="#contraseñas">Gestión de Contraseñas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.html">Logout</a>
                </li>
            </ul>
            <div class="tab-content col-lg-9 col-md-8">
                <div class="tab-pane active in" id="account">
                    <fieldset>
                        <legend class="mb-2">Datos de Contacto</legend>
                        <form action="#" class="form">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Nombre *</label>
                                    <input type="text" class="form-control" name="first_name" required="">
                                </div>
                                <div class="col-sm-6">
                                    <label>Apellidos *</label>
                                    <input type="text" class="form-control" name="last_name" required="">
                                </div>
                            </div>
                            <label>Empresa/Razon Social</label>
                            <input type="email" class="form-control" name="email" required="">
                            <div class="row">
                                <div class="col-sm-6">
                                    <label>Teléfono </label>
                                    <input type="text" class="form-control" name="first_name" required="">
                                </div>
                                <div class="col-sm-6">
                                    <label>CIF</label>
                                    <input type="text" class="form-control" name="last_name" required="">
                                </div>
                            </div>


                            <label>Email *</label>
                            <input type="email" class="form-control" name="email" required="">


                            <button type="submit" class="btn btn-primary personal_area_btn">GUARDAR CAMBIOS</button>
                        </form>
                    </fieldset>
                </div>

                <div class="tab-pane" id="address">
                    <fieldset>
                        <legend class="mb-2">Gestión de Direcciones</legend>
                        <p class="mb-2">Las siguientes direcciones se utilizarán en la página de pago de forma predeterminada.
                        </p>
                        <div class="row">
                            <div class="col-sm-6 mb-4">
                                <div class="card card-address">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">Dirección de Facturación</h5>
                                        <p>John Doe<br>
                                            Riode Company<br>
                                            Steven street<br>
                                            El Carjon, CA 92020
                                        </p>
                                        <a href="#" class="btn btn-link btn-secondary btn-underline btn-direccion" data-direccion="form-facturacion">Editar <i class="far fa-edit"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 mb-4">
                                <div class="card card-address">
                                    <div class="card-body">
                                        <h5 class="card-title text-uppercase">Dirección de Envío</h5>
                                        <p>You have not set up this type of address yet.</p>
                                        <a href="#" class="btn btn-link btn-secondary btn-underline btn-direccion" data-direccion="form-envio">Editar <i class="far fa-edit"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <fieldset id="form-facturacion" style="display:none">
                            <legend class="mb-2">Dirección de Facturación</legend>
                            <form action="#" class="form">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Dirección *</label>
                                        <input type="text" class="form-control" name="first_name" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Localidad *</label>
                                        <input type="text" class="form-control" name="last_name" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Provincia </label>
                                        <input type="text" class="form-control" name="first_name" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Pais</label>
                                        <input type="text" class="form-control" name="last_name" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Código Postal </label>
                                        <input type="text" class="form-control" name="first_name" required="">
                                    </div>
                                </div>
                                <button type="button" class="btn btn-danger btn-close-direccion personal_area_btn" data-direccion="form-facturacion" >CERRAR</button>
                                <button type="submit" class="btn btn-primary personal_area_btn">GUARDAR CAMBIOS</button>
                          
                              
                            </form>
                        </fieldset>
                        <fieldset id="form-envio" style="display:none">
                            <legend class="mb-2">Dirección de Envío</legend>
                            <form action="#" class="form">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Dirección </label>
                                        <input type="text" class="form-control" name="first_name" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Localidad *</label>
                                        <input type="text" class="form-control" name="last_name" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Provincia </label>
                                        <input type="text" class="form-control" name="first_name" required="">
                                    </div>
                                    <div class="col-sm-6">
                                        <label>Pais</label>
                                        <input type="text" class="form-control" name="last_name" required="">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <label>Código Postal </label>
                                        <input type="text" class="form-control" name="first_name" required="">
                                    </div>
                                </div>
                                <button type="button" class="btn btn-danger btn-close-direccion personal_area_btn" data-direccion="form-envio">CERRAR</button>
                                <button type="submit" class="btn btn-primary personal_area_btn">GUARDAR CAMBIOS</button>
                     
                            </form>
                        </fieldset>

                    </fieldset>
                </div>
                <div class="tab-pane " id="contraseñas">

                    <form action="#" class="form">
                        <fieldset>
                            <legend class="mb-2">Cambiar Contraseña</legend>
                            <label>Contraseña actual (deje en blanco para no cambiarla)</label>
                            <input type="password" class="form-control" name="current_password">

                            <label>Nueva Contraseña (deje en blanco para no cambiarla)</label>
                            <input type="password" class="form-control" name="new_password">

                            <label>Confirme nueva contraseña</label>
                            <input type="password" class="form-control" name="confirm_password">

                            <button type="submit" class="btn btn-primary personal_area_btn" style=>GUARDAR CAMBIOS</button>
                        
                        </fieldset>


                    </form>
                </div>


            </div>
        </div>
    </div>
</div>


@stop
{{-- Scripts --}}
@section('scripts')
<script>
    $(document).on("click",".btn-direccion",function(){
        $("#"+$(this).data("direccion")).css("display","block");
    });

    $(document).on("click",".btn-close-direccion",function(){
        $("#"+$(this).data("direccion")).css("display","none");
    });
</script>
@stop