@extends('layouts.site.main')

{{-- css --}}
@section('extracss')

@stop
{{-- Content --}}
@section('content')


<div class="page-content mt-4 mb-10 pb-6 account">
	<div class="container">
		<h2 class="title title-left mb-10">Mis Pedidos</h2>
		<div class="tab tab-vertical gutter-lg">
			<ul class="nav nav-tabs mb-4 col-lg-3 col-md-4" role="tablist">

				<li class="nav-item">
					<a class="nav-link active" href="#pedidos">Listado de Pedidos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="#curso">Pedidos en Curso</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="#realizados">Pedidos Realizados</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="#busqueda">Búsqueda de Pedidos</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#devoluciones">Gestión de devoluciones</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#albaranes">Albaranes</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="#facturas">Facturas</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="login.html">Logout</a>
				</li>
			</ul>
			<div class="tab-content col-lg-9 col-md-8">

				<div class="tab-pane active in pedidos-pane" id="pedidos">
					<table class="order-table striped">
						<thead>
							<tr>
								<th class="pl-2">Pedido</th>
								<th>Fecha</th>
								<th>Estado</th>
								<th>Origen</th>
								<th>Total</th>
								<th class="pr-2">Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="order-number"><a href="#">#3596</a></td>
								<td class="order-date"><time>February 24, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-origin"><span class="origin-spanWeb">Web</span></td>
								<td class="order-total"><span>$900.00 for 5 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Ver</a></td>
							</tr>
							<tr>
								<td class="order-number"><a href="#">#3593</a></td>
								<td class="order-date"><time>February 21, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-origin"><span class="origin-spanWeb">Web</span></td>
								<td class="order-total"><span>$290.00 for 2 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Ver</a></td>
							</tr>
							<tr>
								<td class="order-number"><a href="#">#2547</a></td>
								<td class="order-date"><time>January 4, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-origin"><span class="origin-spanDimasa">Dimasa</span></td>
								<td class="order-total"><span>$480.00 for 8 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Ver</a></td>
							</tr>
							<tr>
								<td class="order-number"><a href="#">#2549</a></td>
								<td class="order-date"><time>January 19, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-origin"><span class="origin-spanWeb">Web</span></td>
								<td class="order-total"><span>$680.00 for 5 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Ver</a></td>
							</tr>
							<tr>
								<td class="order-number"><a href="#">#4523</a></td>
								<td class="order-date"><time>Jun 6, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-origin"><span class="origin-spanDimasa">Dimasa</span></td>
								<td class="order-total"><span>$564.00 for 3 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Ver</a></td>
							</tr>
							<tr>
								<td class="order-number"><a href="#">#4526</a></td>
								<td class="order-date"><time>Jun 19, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-origin"><span class="origin-spanDimasa">Dimasa</span></td>
								<td class="order-total"><span>$123.00 for 8 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Ver</a></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="tab-pane pedidos-pane" id="curso">
					<table class="order-table striped">
						<thead>
							<tr>
								<th class="pl-2">Pedido</th>
								<th>Fecha</th>
								<th>Estado</th>
								<th>Total</th>
								<th class="pr-2">Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="order-number"><a href="#">#3596</a></td>
								<td class="order-date"><time>February 24, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-total"><span>$900.00 for 5 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Descargar PDF</a></td>
							</tr>
							<tr>
								<td class="order-number"><a href="#">#3593</a></td>
								<td class="order-date"><time>February 21, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-total"><span>$290.00 for 2 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Descargar PDF</a></td>
							</tr>
							<tr>
								<td class="order-number"><a href="#">#2547</a></td>
								<td class="order-date"><time>January 4, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-total"><span>$480.00 for 8 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Descargar PDF</a></td>
							</tr>
							<tr>
								<td class="order-number"><a href="#">#2549</a></td>
								<td class="order-date"><time>January 19, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-total"><span>$680.00 for 5 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Descargar PDF</a></td>
							</tr>

						</tbody>
					</table>
				</div>
				<div class="tab-pane pedidos-pane" id="realizados">
					<table class="order-table striped">
						<thead>
							<tr>
								<th class="pl-2">Pedido</th>
								<th>Fecha</th>
								<th>Estado</th>
								<th>Total</th>
								<th class="pr-2">Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="order-number"><a href="#">#3596</a></td>
								<td class="order-date"><time>February 24, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-total"><span>$900.00 for 5 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Descargar PDF</a> | <a href="#" class="btn btn-primary btn-link btn-underline">Repetir Pedido</a></td>

							</tr>
							<tr>
								<td class="order-number"><a href="#">#3593</a></td>
								<td class="order-date"><time>February 21, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-total"><span>$290.00 for 2 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Descargar PDF</a> | <a href="#" class="btn btn-primary btn-link btn-underline">Repetir Pedido</a></td>
							</tr>
							<tr>
								<td class="order-number"><a href="#">#2547</a></td>
								<td class="order-date"><time>January 4, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-total"><span>$480.00 for 8 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Descargar PDF</a> | <a href="#" class="btn btn-primary btn-link btn-underline">Repetir Pedido</a></td>
							</tr>

						</tbody>
					</table>
				</div>
				<div class="tab-pane pedidos-pane" id="busqueda">
					<div class="row mt-2 mb-2">


						<div class="col-md-3">
							<div class="header-search hs-expanded">
								<form action="#" class="input-wrapper">
									<input type="date" class="form-control" name="search" autocomplete="off" placeholder="Fecha" required />
									<button class="btn btn-search" type="submit">
										<i class="d-icon-search"></i>
									</button>
								</form>
							</div>
						</div>
						<div class="col-md-3">
							<div class="header-search hs-expanded">
								<form action="#" class="input-wrapper">
									<input type="text" class="form-control" name="search" autocomplete="off" placeholder="Referencia de obra" required />
									<button class="btn btn-search" type="submit">
										<i class="d-icon-search"></i>
									</button>
								</form>
							</div>
						</div>
						<div class="col-md-3">
							<div class="header-search hs-expanded">
								<form action="#" class="input-wrapper">
									<select class="js-example-basic-single" name="state">
										<option value="WY">Todo</option>
										<option value="AL">Web</option>
										<option value="WY">Dimasa</option>

									</select>
									<button class="btn btn-search" type="submit">
										<i class="d-icon-search"></i>
									</button>
								</form>
							</div>
						</div>
					</div>
					<table class="order-table striped  mt-2 mb-2">
						<thead>
							<tr>
								<th class="pl-2">Pedido</th>
								<th>Fecha</th>
								<th>Estado</th>
								<th>Total</th>
								<th class="pr-2">Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="order-number"><a href="#">#3596</a></td>
								<td class="order-date"><time>February 24, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-total"><span>$900.00 for 5 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Descargar PDF</a></td>
							</tr>
							<tr>
								<td class="order-number"><a href="#">#3593</a></td>
								<td class="order-date"><time>February 21, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-total"><span>$290.00 for 2 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Descargar PDF</a></td>
							</tr>
							<tr>
								<td class="order-number"><a href="#">#2547</a></td>
								<td class="order-date"><time>January 4, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-total"><span>$480.00 for 8 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Descargar PDF</a></td>
							</tr>
							<tr>
								<td class="order-number"><a href="#">#2549</a></td>
								<td class="order-date"><time>January 19, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-total"><span>$680.00 for 5 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Descargar PDF</a></td>
							</tr>

						</tbody>
					</table>
				</div>
				<div class="tab-pane pedidos-pane" id="devoluciones">
					<table class="order-table striped  mt-2 mb-2">
						<thead>
							<tr>
								<th class="pl-2">Pedido</th>
								<th>Fecha</th>
								<th>Total</th>
								<th>Estado Devolución</th>
								<th class="pr-2">Acciones</th>

							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="order-number"><a href="#">#3596</a></td>
								<td class="order-date"><time>February 24, 2021</time></td>
								<td class="order-total"><span>$900.00 for 5 items</span></td>
								<td class="order-action"><span>On hold</span></td>
								<td class="order-action2"><a href="#" class="btn btn-primary btn-link btn-underline" data-bs-toggle="modal" data-bs-target="#modalDevoluciones"><i class="far fa-eye"></i></a></td>

							</tr>
							<tr>
								<td class="order-number"><a href="#">#3597</a></td>
								<td class="order-date"><time>February 24, 2021</time></td>
								<td class="order-total"><span>$900.00 for 5 items</span></td>
								<td class="order-action"><span>On hold</span></td>
								<td class="order-action2"><a href="#" class="btn btn-primary btn-link btn-underline" data-bs-toggle="modal" data-bs-target="#modalDevoluciones"><i class="far fa-eye"></i></a></td>

							</tr>
							<tr>
								<td class="order-number"><a href="#">#3598</a></td>
								<td class="order-date"><time>February 24, 2021</time></td>
								<td class="order-total"><span>$900.00 for 5 items</span></td>
								<td class="order-action"><span>On hold</span></td>
								<td class="order-action2"><a href="#" class="btn btn-primary btn-link btn-underline" data-bs-toggle="modal" data-bs-target="#modalDevoluciones"><i class="far fa-eye"></i></a></td>

							</tr>
							<tr>
								<td class="order-number"><a href="#">#3599</a></td>
								<td class="order-date"><time>February 24, 2021</time></td>
								<td class="order-total"><span>$900.00 for 5 items</span></td>
								<td class="order-action"><span>On hold</span></td>
								<td class="order-action2"><a href="#modalDevoluciones" class="btn btn-primary btn-link btn-underline btn-refunds" data-bs-toggle="modal"><i class="far fa-eye"></i></a></td>

							</tr>

						</tbody>
					</table>

					<div class="login-popup mfp-hide" id="devolucionesModal">
						<div class="form-box">
							<div class="tab tab-nav-simple tab-nav-boxed form-tab">
								<ul class="nav nav-tabs nav-fill align-items-center border-no justify-content-center mb-5" role="tablist">
									<li class="nav-item">
										<a class="nav-link active border-no lh-1 ls-normal" href="#signin">Iniciar sesión</a>
									</li>
									<li class="delimiter">|</li>
									<li class="nav-item">
										<a class="nav-link border-no lh-1 ls-normal" href="#register">Registrarse</a>
									</li>
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="signin">
										<div class="mb-2 text-center">
											<span class="lost-link "><b>¿No tienes cuenta?</b> <a class="register-link" href="#">Haz click aquí para crear una</a></span>
										</div>
										@if($message = Session::get("login_error"))<div class="mb-2 alert alert-danger text-white" style="font-size: 1.2rem;">{{$message}}</div>@endif
										@if($message = Session::get("register_success"))<div class="mb-2 alert alert-success text-white" style="font-size: 1.2rem;">{{$message}}</div>@endif
										<form action="{{ route('client.do_login') }}" method="POST">
											@csrf
											<div class="form-group mb-3">
												<input type="text" class="form-control" id="singin-email" name="email" placeholder="Email *" required />
											</div>
											<div class="form-group">
												<input type="password" class="form-control" id="singin-password" name="password" placeholder="Contraseña *" required />
											</div>
											<div class="form-footer">
												<div class="form-checkbox">
													<input type="checkbox" class="custom-checkbox" id="signin-remember" name="signin-remember" />
													<label class="form-control-label" for="signin-remember">Recordarme</label>
												</div>
												<span class="lost-link"><a href="#">Recuperar contraseña</a></span>
											</div>
											<button class="btn btn-primary btn-outline btn-block" type="submit">INICIAR SESIÓN</button>
										</form>
									</div>
									<div class="tab-pane" id="register">
										<div class="mb-2 text-center">
											<span class="lost-link "><b>¿Ya tienes cuenta?</b> <a class="login-link" href="#">Haz click aquí para iniciar sesión</a></span>
										</div>
										<div class="tab-register tab tab-nav-boxed tab-nav-solid ">
											<ul class="nav nav-tabs justify-content-center" style="border-bottom: 1px solid #ebebeb;" role="tablist">
												<li class="nav-item">
													<a class="nav-link active pl-3 pr-3" style="font-size: 2rem;" href="#tab3-1">Particular</a>
												</li>
												<li class="nav-item">
													<a class="nav-link pl-3 pr-3" style="font-size: 2rem;" href="#tab3-2">Cliente profesional</a>
												</li>
											</ul>
											<div class="tab-content pt-2">
												<div class="tab-pane active in" id="tab3-1">
													@if($message = Session::get("register_error"))<span class="text-danger mb-2" style="font-size: 1.2rem;">{{$message}}</span>@endif
													<form action="{{ route('client.do_register') }}" method="POST">
														@csrf
														<div class="form-group mb-3">
															@error('register-name')<span class="text-danger mb-2">El nombre es obligatorio</span>@enderror
															<input type="text" value="{{old('register-name')}}" class="form-control" id="register-name" name="register-name" placeholder="Nombre *" required />
														</div>
														<div class="form-group mb-3">
															@error('register-surname')<span class="text-danger mb-2">Los apellidos son obligatorios</span>@enderror
															<input type="text" value="{{old('register-surname')}}" class="form-control" id="register-surname" name="register-surname" placeholder="Apellidos *" required />
														</div>
														<div class="form-group mb-3">
															@error('register-dni')<span class="text-danger mb-2">Debes introducir un formato de documento de identidad válido</span>@enderror
															<input type="text" value="{{old('register-dni')}}" class="form-control" id="register-dni" name="register-dni" placeholder="D.N.I. o C.I.F" />
															<span class="font-size-1">* Campo opcional, necesario para incluir documento en la facturación</span>
														</div>
														<div class="form-group mb-3">
															@error('register-email')<span class="text-danger mb-2">El email es obligatorio</span>@enderror
															<input type="email" value="{{old('register-email')}}" class="form-control" id="register-email" name="register-email" placeholder="Dirección de correo electrónico *" required />
														</div>
														<div class="form-group mb-3">
															@error('register-email')<span class="text-danger mb-2">El campo teléfono debe estar formado por números</span>@enderror
															<input type="text" value="{{old('register-phone')}}" class="form-control" id="register-phone" name="register-phone" placeholder="Número de teléfono *" />
														</div>
														@error('register-password')<span class="text-danger mb-2 font-size-1">Las contraseñas deben coincidir. La contraseña debe contener al menos 6 caracteres formados por al menos una minúscula, una mayúscula, un número y un caracter especial entre ellos.</span>@enderror
														<div class="form-group">
															<input type="password" class="form-control" id="register-password" name="register-password" placeholder="Contraseña *" required />
														</div>
														<div class="form-group">
															<input type="password" class="form-control" id="register-password-repeat" name="register-password-repeat" placeholder="Repetir contraseña *" required />
														</div>
														<div class="form-footer">
															@error('register-agree')<span class="text-danger mb-2">Debes aceptar la política de privacidad</span>@enderror
															<div class="form-checkbox">
																<input type="checkbox" class="custom-checkbox" id="register-agree" name="register-agree" required />
																<label class="form-control-label" for="register-agree">He leído y acepto la <a href="#" target="_blank">política de privacidad</a></label>
															</div>
														</div>
														<button class="btn btn-outline btn-primary btn-block" type="submit">REGISTRARSE</button>
													</form>
												</div>
												<div class="tab-pane" id="tab3-2">
													@if($message = Session::get("register_error"))<span class="text-danger mb-2" style="font-size: 1.2rem;">{{$message}}</span>@endif
													<form action="" method="POST">
														@csrf
														<div class="form-group mb-3">
															@error('register-name')<span class="text-danger mb-2">El nombre es obligatorio</span>@enderror
															<input type="text" value="{{old('register-name')}}" class="form-control" id="register-name" name="register-name" placeholder="Nombre *" required />
														</div>
														<div class="form-group mb-3">
															@error('register-surname')<span class="text-danger mb-2">Los apellidos son obligatorios</span>@enderror
															<input type="text" value="{{old('register-surname')}}" class="form-control" id="register-surname" name="register-surname" placeholder="Apellidos *" required />
														</div>
														<div class="form-group mb-3">
															@error('register-surname')<span class="text-danger mb-2">El nombre de la empresa es obligatorio</span>@enderror
															<input type="text" value="{{old('register-surname')}}" class="form-control" id="register-surname" name="register-surname" placeholder="Empresa *" required />
														</div>
														<div class="form-group mb-3">
															@error('register-dni')<span class="text-danger mb-2">Debes introducir un formato de documento de identidad válido</span>@enderror
															<input type="text" value="{{old('register-dni')}}" class="form-control" id="register-dni" name="register-dni" placeholder="D.N.I. o C.I.F" />
															<span class="font-size-1">* Campo opcional, necesario para incluir documento en la facturación</span>
														</div>
														<div class="form-group mb-3">
															@error('register-email')<span class="text-danger mb-2">El email es obligatorio</span>@enderror
															<input type="email" value="{{old('register-email')}}" class="form-control" id="register-email" name="register-email" placeholder="Dirección de correo electrónico *" required />
														</div>
														<div class="form-group mb-3">
															@error('register-email')<span class="text-danger mb-2">El campo teléfono debe estar formado por números</span>@enderror
															<input type="text" value="{{old('register-phone')}}" class="form-control" id="register-phone" name="register-phone" placeholder="Número de teléfono *" />
														</div>
														@error('register-password')<span class="text-danger mb-2 font-size-1">Las contraseñas deben coincidir. La contraseña debe contener al menos 6 caracteres formados por al menos una minúscula, una mayúscula, un número y un caracter especial entre ellos.</span>@enderror
														<div class="form-group">
															<input type="password" class="form-control" id="register-password" name="register-password" placeholder="Contraseña *" required />
														</div>
														<div class="form-group">
															<input type="password" class="form-control" id="register-password-repeat" name="register-password-repeat" placeholder="Repetir contraseña *" required />
														</div>
														<div class="form-footer">
															@error('register-agree')<span class="text-danger mb-2">Debes aceptar la política de privacidad</span>@enderror
															<div class="form-checkbox">
																<input type="checkbox" class="custom-checkbox" id="register-agree" name="register-agree" required />
																<label class="form-control-label" for="register-agree">He leído y acepto la <a href="#" target="_blank">política de privacidad</a></label>
															</div>
														</div>
														<button class="btn btn-outline btn-primary btn-block" type="submit">REGISTRARSE</button>
													</form>
												</div>
												<div class="tab-pane" id="tab3-3">
												</div>
											</div>
										</div>
										{{-- <a href="#" class="btn btn-primary btn-outline w-100"><span>SOY PROFESIONAL</span></a> --}}

									</div>
								</div>
							</div>
						</div>
					</div>


				</div>
				<div class="tab-pane pedidos-pane" id="albaranes">
					<div class="row  mt-2 ">


						<div class="col-md-3">
							<div class="header-search hs-expanded">
								<form action="#" class="input-wrapper">
									<input type="date" class="form-control" name="search" autocomplete="off" placeholder="Fecha" required />
									<button class="btn btn-search" type="submit">
										<i class="d-icon-search"></i>
									</button>
								</form>
							</div>
						</div>
						<div class="col-md-3">
							<div class="header-search hs-expanded">
								<form action="#" class="input-wrapper">
									<input type="text" class="form-control" name="search" autocomplete="off" placeholder="Referencia de obra" required />
									<button class="btn btn-search" type="submit">
										<i class="d-icon-search"></i>
									</button>
								</form>
							</div>
						</div>
						<div class="col-md-3">
							<div class="header-search hs-expanded">
								<form action="#" class="input-wrapper">
									<select class="js-example-basic-single" name="state">
										<option value="WY">Todo</option>
										<option value="AL">Web</option>
										<option value="WY">Dimasa</option>

									</select>
									<button class="btn btn-search" type="submit">
										<i class="d-icon-search"></i>
									</button>
								</form>
							</div>
						</div>
					</div>
					<table class="order-table striped  mt-2 mb-2">
						<thead>
							<tr>
								<th class="pl-2">Albarán</th>
								<th>Fecha</th>
								<th>Estado</th>
								<th>Total</th>
								<th class="pr-2">Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="order-number"><a href="#">#3596</a></td>
								<td class="order-date"><time>February 24, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-total"><span>$900.00 for 5 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Descargar PDF</a></td>
							</tr>
							<tr>
								<td class="order-number"><a href="#">#3593</a></td>
								<td class="order-date"><time>February 21, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-total"><span>$290.00 for 2 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Descargar PDF</a></td>
							</tr>
							<tr>
								<td class="order-number"><a href="#">#2547</a></td>
								<td class="order-date"><time>January 4, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-total"><span>$480.00 for 8 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Descargar PDF</a></td>
							</tr>
							<tr>
								<td class="order-number"><a href="#">#2549</a></td>
								<td class="order-date"><time>January 19, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-total"><span>$680.00 for 5 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Descargar PDF</a></td>
							</tr>

						</tbody>
					</table>
				</div>
				<div class="tab-pane pedidos-pane" id="facturas">
					<div class="row mt-2 mb-2">


						<div class="col-md-3">
							<div class="header-search hs-expanded">
								<form action="#" class="input-wrapper">
									<input type="date" class="form-control" name="search" autocomplete="off" placeholder="Fecha" required />
									<button class="btn btn-search" type="submit">
										<i class="d-icon-search"></i>
									</button>
								</form>
							</div>
						</div>
						<div class="col-md-3">
							<div class="header-search hs-expanded">
								<form action="#" class="input-wrapper">
									<input type="text" class="form-control" name="search" autocomplete="off" placeholder="Referencia de obra" required />
									<button class="btn btn-search" type="submit">
										<i class="d-icon-search"></i>
									</button>
								</form>
							</div>
						</div>
						<div class="col-md-3">
							<div class="header-search hs-expanded">
								<form action="#" class="input-wrapper">
									<select class="js-example-basic-single" name="state">
										<option value="WY">Todo</option>
										<option value="AL">Web</option>
										<option value="WY">Dimasa</option>

									</select>
									<button class="btn btn-search" type="submit">
										<i class="d-icon-search"></i>
									</button>
								</form>
							</div>
						</div>
					</div>
					<table class="order-table striped" style="margin-top:2rem">
						<thead>
							<tr>
								<th class="pl-2">Factura</th>
								<th>Fecha</th>
								<th>Estado</th>
								<th>Total</th>
								<th class="pr-2">Acciones</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="order-number"><a href="#">#3596</a></td>
								<td class="order-date"><time>February 24, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-total"><span>$900.00 for 5 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Descargar PDF</a></td>
							</tr>
							<tr>
								<td class="order-number"><a href="#">#3593</a></td>
								<td class="order-date"><time>February 21, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-total"><span>$290.00 for 2 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Descargar PDF</a></td>
							</tr>
							<tr>
								<td class="order-number"><a href="#">#2547</a></td>
								<td class="order-date"><time>January 4, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-total"><span>$480.00 for 8 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Descargar PDF</a></td>
							</tr>
							<tr>
								<td class="order-number"><a href="#">#2549</a></td>
								<td class="order-date"><time>January 19, 2021</time></td>
								<td class="order-status"><span>On hold</span></td>
								<td class="order-total"><span>$680.00 for 5 items</span></td>
								<td class="order-action"><a href="#" class="btn btn-primary btn-link btn-underline">Descargar PDF</a></td>
							</tr>

						</tbody>
					</table>
				</div>


			</div>
		</div>
	</div>
</div>


@stop
{{-- Scripts --}}
@section('scripts')
<script>
	$(document).on("click", ".expandir", function() {
		if ($(this).hasClass("fas fa-chevron-down")) {
			$($(this)).removeClass("fas fa-chevron-down");
			$($(this)).addClass("fas fa-chevron-up");
			$("#" + $(this).data("id")).css("display", "contents");
		} else if ($(this).hasClass("fas fa-chevron-up")) {
			$($(this)).removeClass("fas fa-chevron-up");
			$($(this)).addClass("fas fa-chevron-down");
			$("#" + $(this).data("id")).css("display", "none");
		}


	});
	$(document).ready(function() {
		$('.js-example-basic-single').select2();
	});
</script>
@stop