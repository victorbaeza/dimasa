@extends('layouts.site.main')

{{-- css --}}
@section('extracss')

@stop
{{-- Content --}}
@section('content')


<div class="page-content mt-4 mb-10 pb-6 account">
	<div class="container">
		<h2 class="title title-left mb-10">Mis Presupuestos</h2>
		<div class="tab tab-vertical gutter-lg">
			<ul class="nav nav-tabs mb-4 col-lg-3 col-md-4" role="tablist">

				<li class="nav-item">
					<a class="nav-link active" href="#calculadora">Calculadora</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="#detalles">Consultar Detalles</a>
				</li>

			</ul>
			<div class="tab-content col-lg-9 col-md-8">

				<div class="tab-pane active in pedidos-pane" id="calculadora">


					<fieldset>
						<!-- <legend class="mb-2">Presupuesto disponible en {{date('F',)}} {{date('Y',)}}</legend> -->
						<legend class="mb-2">Presupuesto disponible en {{date('F')}} {{date('Y')}}</legend>


						<div class="top mr-3 ml-3">
							<div class="budget">


								<div class="budget__value">0.00€ </div>
								<div class="budget__benefit"><span class="benefit">0.00€</span> </div>
								<input type="hidden" id="totalPresupuesto" value="0">
								<input type="hidden" id="idListado" value="0">
								<input type="hidden" id="id" value="1">
								<div class="budget__income clearfix">
									<div class="budget__income--text">Costes</div>
									<div class="right">
										<div class="budget__income--value">0</div>
										<div class="budget__income--percentage">&nbsp;</div>
									</div>
								</div>

								<div class="budget__expenses clearfix">
									<div class="budget__expenses--text">Descuentos</div>
									<div class="right clearfix">
										<div class="budget__expenses--value">0</div>
										<div class="budget__expenses--percentage">---</div>
									</div>
								</div>
							</div>
						</div>


						<div class="bottom mr-3 ml-3">
							<div class="add_Product">
								<div class="add__container">
									<div class="row">
										<div class="col-lg-4 col-sm-12">
											<input name="" id="" class="add__productName" placeholder="Buscar Producto">
										</div>
										<div class="table-responsive"id="product_table_movil" style="display:none">
											@include('site.client_area.product-table')
										</div>
										<div class="col-lg-2 col-sm-12">
											<input type="number" class="add__price" placeholder="Precio" readonly>
										</div>
										<div class="col-lg-2 col-sm-12">
											<input type="number" class="add__quantity" placeholder="Cantidad">
										</div>
										<div class="col-lg-3 col-sm-12">
											<input type="number" class="add__finalPrice" placeholder="Precio Final">
										</div>
										<div class="col-lg-1 col-sm-12">
											<button class="add__btnProduct botonesCalculadora_btn"><i class="fas fa-plus-square"></i></button>
										</div>

									</div>
								</div>
							</div>
							<div class="table-responsive" id="product_table"style="display:none">
								@include('site.client_area.product-table')
							</div>


							<div class="add2">
								<div class="add__container">



									<div class="row">
										<div class="col-lg-6 col-sm-12 ">
											<input type="text" class="add__description" placeholder="Añada descripción">
										</div>
										<div class="col-lg-2 col-sm-12  ">
											<input type="number" class="add__value" placeholder="Precio">
										</div>
										<div class="col-lg-3 col-sm-12 ">
											<input type="number" class="add__finalConceptPrice" placeholder="Precio Final">
										</div>
										<div class="col-lg-1 col-sm-12 ">
											<button class="add__btn botonesCalculadora_btn"><i class="fas fa-plus-square"></i></button>
										</div>
									</div>

								</div>
							</div>

							<div class="row clearfix mt-3" style="display:flex;    justify-content: space-around;">
								<div class="col col-md-6 col-lg-6  income">
									<h2 class="income__title">Costes</h2>

									<div class="income__list">
									</div>
								</div>


								<div class="col col-md-6 col-lg-6 expenses">
									<h2 class="expenses__title">Descuentos</h2>

									<div class="expenses__list">
									</div>
								</div>
							</div>
						</div>

					</fieldset>
					<div class="botonesCalculadora">

						<button type="button" class="btn btn-success botonesCalculadora_btn"><i class="far fa-file-pdf"></i> GUARDAR PDF</button>
						<button type="button" class="btn btn-primary botonesCalculadora_btn"><i class="far fa-save"></i> GUARDAR CAMBIOS</button>
					</div>
				</div>
				<div class="tab-pane pedidos-pane" id="detalles">
					<table class="mt-2 mb-2 budget__table">
						<thead>
							<tr class="product__header" onclick="verProductos('idProducto1')" style="border-bottom: 0.5pt solid #d1d1d1;">
								<th class="pl-2" width="10%">#1234</th>
								<th>Presupuesto Nombre </th>
								<th class="pr-2" style="text-align:center" width="20%">2300.50€ for 5 items</th>
								<th style="width: 0%;"></th>

							</tr>
						</thead>

						<tbody style="display:none" id="idProducto1">
							<input type="hidden" id="open_close" value="0">
							<tr>
								<td class="order-number"><a href="#">#3596</a></td>
								<td class="order-date"><time>Producto Nombre</time></td>

								<td class="order-total"><span>2300.50€ for 5 items</span></td>


							</tr>
							<tr>
								<td class="order-number"><a href="#">#3597</a></td>
								<td class="order-date"><time>Producto Nombre</time></td>
								<td class="order-total"><span>2300.50€ for 5 items</span></td>


							</tr>
							<tr>
								<td class="order-number"><a href="#">#3598</a></td>
								<td class="order-date"><time>Producto Nombre</time></td>
								<td class="order-total"><span>2300.50€ for 5 items</span></td>


							</tr>
							<tr>
								<td class="order-number"><a href="#">#3599</a></td>
								<td class="order-date"><time>Producto Nombre</time></td>
								<td class="order-total"><span>2300.50€ for 5 items</span></td>
							</tr>
							<tr class="conceptos">
								<td class="order-number budget_subTotal"></td>
								<td class="order-date budget_subTotal"><strong>Subtotal</strong> </td>

								<td class="order-total budget_subTotal"><span><strong>2300.50€ for 5 items</strong></span></td>
							</tr>
							<tr class="conceptos">
								<td class="order-number budget_IVA"></td>
								<td class="order-date budget_IVA"><strong>IVA</strong> </td>

								<td class="order-total budget_IVA"><span><strong>2300.50€ for 5 items</strong></span></td>
							</tr>
							<tr class="conceptosFin">
								<td class="order-number budget_total"></td>
								<td class="order-date budget_total"><strong>Total</strong> </td>

								<td class="order-total budget_total"><span><strong>2300.50€ for 5 items</strong></span></td>
							</tr>
							<tr>
								<td></td>
								<td colspan="2">
									<button class="btn btn-primary budget_btn" href=""><i class="far fa-file-pdf"></i> GUARDAR PDF</button>
									<button class="btn btn-success budget_btn" href=""><i class="fas fa-file-export"></i> PASAR A PEDIDO</button>
								</td>
							</tr>
						</tbody>

					</table>
					<table class="mt-2 mb-2 budget__table">
						<thead>
							<tr class="product__header" onclick="verProductos('idProducto2')">

								<th class="pl-2" width="10%">#1234</th>
								<th>Presupuesto Nombre </th>
								<th class="pr-2" style="text-align:center" width="20%">2300.50€ for 5 items</th>
								<th style="width: 0%;"></th>

							</tr>
						</thead>

						<tbody style="display:none" id="idProducto2">
							<input type="hidden" id="open_close" value="0">
							<tr>
								<td class="order-number"><a href="#">#3596</a></td>
								<td class="order-date"><time>Producto Nombre</time></td>

								<td class="order-total"><span>2300.50€ for 5 items</span></td>


							</tr>
							<tr>
								<td class="order-number"><a href="#">#3597</a></td>
								<td class="order-date"><time>Producto Nombre</time></td>
								<td class="order-total"><span>2300.50€ for 5 items</span></td>


							</tr>
							<tr>
								<td class="order-number"><a href="#">#3598</a></td>
								<td class="order-date"><time>Producto Nombre</time></td>
								<td class="order-total"><span>2300.50€ for 5 items</span></td>


							</tr>
							<tr>
								<td class="order-number"><a href="#">#3598</a></td>
								<td class="order-date"><time>Producto Nombre</time></td>
								<td class="order-total"><span>2300.50€ for 5 items</span></td>


							</tr>
							<tr>
								<td class="order-number"><a href="#">#3598</a></td>
								<td class="order-date"><time>Producto Nombre</time></td>
								<td class="order-total"><span>2300.50€ for 5 items</span></td>


							</tr>
							<tr>
								<td class="order-number"><a href="#">#3599</a></td>
								<td class="order-date"><time>Producto Nombre</time></td>
								<td class="order-total"><span>2300.50€ for 5 items</span></td>
							</tr>
							<tr class="conceptos">
								<td class="order-number budget_subTotal"></td>
								<td class="order-date budget_subTotal"><strong>Subtotal</strong> </td>

								<td class="order-total budget_subTotal"><span><strong>2300.50€ for 5 items</strong></span></td>
							</tr>
							<tr class="conceptos">
								<td class="order-number budget_IVA"></td>
								<td class="order-date budget_IVA"><strong>IVA</strong> </td>

								<td class="order-total budget_IVA"><span><strong>2300.50€ for 5 items</strong></span></td>
							</tr>
							<tr class="conceptosFin">
								<td class="order-number budget_total"></td>
								<td class="order-date budget_total"><strong>Total</strong> </td>

								<td class="order-total budget_total"><span><strong>2300.50€ for 5 items</strong></span></td>
							</tr>
							<tr>
								<td></td>
								<td colspan="2">
									<button class="btn btn-primary budget_btn" href=""><i class="far fa-file-pdf"></i> GUARDAR PDF</button>
									<button class="btn btn-success budget_btn" href=""><i class="fas fa-file-export"></i> PASAR A PEDIDO</button>
								</td>
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
	//VER DETALLES PRESUPUESTO
	function verProductos(x) {
		var flag = $("#open_close").val();
		if (flag == 0) {
			$("#" + x).css("display", "contents");
			$("#open_close").val("1");
		} else {
			$("#" + x).css("display", "none");
			$("#open_close").val("0");
		}


	}





	//AÑADIR CONCEPTO

	$(document).on("click", ".add__btn", function() {
		var valor = parseFloat($('.add__value').val());
		var descripcion = ($('.add__description').val());
		var cantidad = 1;
		var total = parseFloat($("#totalPresupuesto").val());
		var precioFinal = parseFloat($(".add__finalConceptPrice").val());
		var newHtml;
		var id = parseInt($('#id').val());
		//resta
		if ((0 + valor) < 0) {
			total = total + valor;
			var valorPrevio = parseFloat($(".budget__expenses--value").text());
			var valorFinal = valor + valorPrevio;
			calculoBeneficio(cantidad, precioFinal, valor);
			$(".budget__expenses--value").text(valorFinal.toFixed(2));
			element = $(".expenses__list");
			html = '<div class="item clearfix expensesLine" id="exp-%id%"> <div class="item__quantity" style="margin-right:2rem">%quantity% *</div><div class="item__description">%description%</div><div class="right clearfix"><div class="item__value">%value%</div><div class="item__percentage">%percentage%</div><div class="item__delete" ><button class="item__delete--btn" data-id="exp-%idBoton%"><i class="fas fa-times"></i></button></div></div></div>';
			newhtml = html.replace('%id%', id);
			newHtml = newhtml.replace('%idBoton%', id);
		}
		//suma
		else {
			total = total + precioFinal;
			var valorPrevio = parseFloat($(".budget__income--value").text());
			var valorFinal = valor + valorPrevio;
			calculoBeneficio(cantidad, precioFinal, valor);
			$(".budget__income--value").text(valorFinal.toFixed(2));
			element = $(".income__list");
			html = '<div class="item clearfix incomeLine" id="inc-%id%">  <div class="item__quantity" style="margin-right:2rem">%quantity% *</div><div class="item__description">%description%</div><div class="right clearfix"><div class="item__value">%value%</div><div class="item__delete"><button class="item__delete--btn"data-id="inc-%idBoton%"><i class="fas fa-times " )></i></button></div></div></div>';
			newhtml = html.replace('%id%', id);
			newHtml = newhtml.replace('%idBoton%', id);
		}

		actualizaTotal(total);

		//porcentaje
		var porcentaje = (valor * (-1) * 100) / parseFloat($(".budget__income--value").text());
		var porcentajeTotal = calcularPorcentajes();

		//adjuntar a la lista
		newHtml = newHtml.replace('%description%', descripcion);
		newHtml = newHtml.replace('%quantity%', cantidad);
		newHtml = newHtml.replace('%value%', precioFinal.toFixed(2));
		if (total > 0 && parseFloat($(".budget__expenses--value").text()) != 0) {

			newHtml = newHtml.replace('%percentage%', porcentaje.toFixed(2) + "%");


			$(".budget__expenses--percentage").text(porcentajeTotal.toFixed(2) + "%");
		}
		element.append(newHtml);

		resetInputs();
		id = id + 1;
		$('#id').val(id);
		checkPorcentajes()
	});

	//CALCULAR BENEFICIO

	function calculoBeneficio(cantidad, precioFinal, precio) {

		var beneficioProducto = (cantidad * precioFinal) - (precio * cantidad);
		var beneficioPrevio = parseFloat($(".benefit").text());
		var beneficio = beneficioProducto + beneficioPrevio;
		$(".benefit").text(beneficio.toFixed(2) + "€");
	}

	//AÑADIR PRODUCTO

	$(document).on("click", ".add__btnProduct", function() {
		var producto = ($('.add__productName').val());
		var precio = parseFloat($('.add__price').val());
		var precioFinal = parseFloat($('.add__finalPrice').val());
		var cantidad = $('.add__quantity').val();
		var total = parseFloat($("#totalPresupuesto").val());
		var newHtml;
		var id = parseInt($('#id').val());
		var precioxProducto = precioFinal * cantidad;
		calculoBeneficio(cantidad, precioFinal, precio);
		total = total + precioxProducto;
		var valorPrevio = parseFloat($(".budget__income--value").text());
		var valorFinal = precioxProducto + valorPrevio;
		$(".budget__income--value").text(valorFinal.toFixed(2));
		element = $(".income__list");
		html = '<div class="item clearfix" id="product-%id%"> <div class="item__quantity" style="margin-right:2rem">%quantity% *</div><div class="item__description">%description%</div><div class="right clearfix"><div class="item__value">%value%</div><div class="item__delete"><button class="item__delete--btn" data-id="product-%idBoton%"><i class="fas fa-times"></i></button></div></div></div>';
		newhtml = html.replace('%id%', id);
		newHtml = newhtml.replace('%idBoton%', id);
		newHtml = newHtml.replace('%description%', producto);
		newHtml = newHtml.replace('%quantity%', cantidad);
		newHtml = newHtml.replace('%value%', precioFinal.toFixed(2));


		actualizaTotal(total);


		element.append(newHtml);
		var porcentajeTotal = calcularPorcentajes();
		$(".budget__expenses--percentage").text(porcentajeTotal.toFixed(2) + "%");

		//RESET INPUTS
		resetInputs();
		checkPorcentajes()
	});

	//ELIMINAR FILA DESGLOSE

	$(document).on("click", ".item__delete--btn", function() {

		var target = $(this).data("id");
		var precio = parseFloat($("#" + target + ">.right>.item__value").text());
		var cantidad = parseFloat($("#" + target + ">.item__quantity").text());
		precio = precio * cantidad;
		var total = parseFloat($("#totalPresupuesto").val());
		total = total - precio;


		$("#" + $(this).data("id")).remove();
		if (0 + precio < 0) {
			var valorPrevioNegativo = parseFloat($(".budget__expenses--value").text());
			valorPrevioNegativo = valorPrevioNegativo - precio;
			$(".budget__expenses--value").text(parseFloat(valorPrevioNegativo).toFixed(2));

		} else {
			var valorPrevioPositivo = parseFloat($(".budget__income--value").text());
			valorPrevioPositivo = valorPrevioPositivo - precio;
			$(".budget__income--value").text(parseFloat(valorPrevioPositivo).toFixed(2));
		}

		var porcentajeTotal = calcularPorcentajes();
		$(".budget__expenses--percentage").text(porcentajeTotal.toFixed(2));
		actualizaTotal(total);
		checkPorcentajes();
	});

	//ACTUALIZAR TOTAL PRESUPUESTO
	function actualizaTotal(total) {
		$("#totalPresupuesto").val(total);
		$(".budget__value").text(total.toFixed(2) + "€");
	}

	//RESET INPUTS
	function resetInputs() {
		$('.add__description').val("");
		$('.add__value').val("");
		$('.add__price').val("");
		$('.add__finalConceptPrice').val("");
		$('.add__productName').val("");
		$('.add__quantity').val("");
		$('.add__finalPrice').val("");
	}


	//SELECTOR DE PRODUCTOS
	$(document).on("click", ".product_info", function() {
		var producto = $(this).data("product");
		var precio = $(this).data("price");
		$(".add__productName").val(producto);
		$(".add__price").val(precio);
		$(".product-table").css("display", "none");
	});

	$(".add__productName").on("keypress", function() {
		if(screen.width<=991){
			console.log("hola");
			$("#product_table_movil").css("display", "inline-table");
		}else{
			console.log("hola 2");
			$("#product_table").css("display", "inline-table");
		}
			
		
		
	});

	function checkPorcentajes() {
		var porcentajes = [];
		$(".expensesLine>.right>.item__value").map(function() {
			var positivo = parseFloat($(".budget__income--value").text());
			var valor = $(this).text();
			porcentajes.push(((valor * (-1)) * 100) / positivo);


		});
		$(".expensesLine>.right>.item__percentage").map(function(i) {

			$(this).text(parseFloat(porcentajes[i]).toFixed(2) + "%");
			i++;




		});


	}

	function calcularPorcentajes() {
		var valorPrevioNegativo = parseFloat($(".budget__expenses--value").text());
		var valorPrevioPositivo = parseFloat($(".budget__income--value").text());
		var porcentajeTotal = ((valorPrevioNegativo * (-1)) * 100) / valorPrevioPositivo;
		console.log(porcentajeTotal);
		return porcentajeTotal;
	}
</script>
@stop