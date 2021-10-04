@extends('layouts.site.main')

{{-- css --}}
@section('extracss')
<style>
	* {
		margin: 0;
		padding: 0;
		box-sizing: border-box;
	}

	.clearfix::after {
		content: "";
		display: table;
		clear: both;
	}


	body {

		position: relative;
		height: 100vh;

	}

	.right {
		float: right;
	}

	.red {
		color: #FF5049 !important;
	}

	.red-focus:focus {
		border: 1px solid #FF5049 !important;
	}

	.top {
		height: 30vh;
		background-color: #f7f7f7;
		background-size: cover;
		background-position: center;
		position: relative;
	}

	.budget {
		position: absolute;
		width: 350px;
		top: 50%;
		left: 50%;
		transform: translate(-50%, -50%);
		color: #000;
	}

	.budget__title {
		font-size: 18px;
		text-align: center;
		margin-bottom: 10px;
		font-weight: 300;
	}

	.bottom {
		margin-top: 2rem;
	}

	.budget__value {
		font-weight: 300;
		font-size: 60px;
		text-align: center;
		margin-bottom: 1rem;
		letter-spacing: 2px;
	}

	.budget__benefit {
		font-weight: 150;
		font-size: 30px;
		text-align: center;
		margin-bottom: 1rem;
		letter-spacing: 2px;
	}

	.budget__income,
	.budget__expenses {
		padding: 12px;
		text-transform: uppercase;
	}

	.budget__income {
		margin-bottom: 10px;
		background-color: #28B9B5;
	}

	.budget__expenses {
		background-color: #FF5049;
	}

	.budget__income--text,
	.budget__expenses--text {
		float: left;
		font-size: 13px;
		color: white;
		margin-top: 2px;
	}

	.budget__income--value,
	.budget__expenses--value {
		letter-spacing: 1px;
		float: left;
		color: white;
	}

	.budget__income--percentage,
	.budget__expenses--percentage {
		float: left;
		color: white;
		width: 34px;
		font-size: 11px;
		padding: 3px 0;
		margin-left: 10px;
	}

	.budget__expenses--percentage {
		background-color: #ffffff;
		background-color: rgba(255, 255, 255, 0.2);
		text-align: center;
		border-radius: 3px;
	}

	.add {
		padding: 14px;
		border-bottom: 1px solid #e7e7e7;
		background-color: #f7f7f7;
	}

	.add_Product {
		padding: 14px;
		border-bottom: 1px solid #e7e7e7;
		background-color: #f7f7f7;
	}

	.add__container {
		margin: 0 auto;
		text-align: center;
	}

	.add__type {
		width: 55px;
		border: 1px solid #e7e7e7;
		height: 44px;
		font-size: 18px;
		color: inherit;
		background-color: #fff;
		margin-right: 10px;
		font-weight: 300;
		transition: border 0.3s;
	}

	.add__description,
	.add__value,
	.add__quantity,
	.add__price,
	.add__finalPrice,
	.add__productName {
		border: 1px solid #e7e7e7;
		background-color: #fff;
		color: inherit;
		font-family: inherit;
		font-size: 14px;
		padding: 12px 15px;
		margin-right: 10px;
		border-radius: 5px;
		transition: border 0.3s;
	}

	.add__price,
	.add__quantity {
		width: 100px;
	}

	.add__finalPrice {
		width: 150px;
	}

	.add__description {
		width: 400px;
	}

	.add__value {
		width: 100px;
	}

	.add__btn,
	.add__btnProduct {
		font-size: 35px;
		background: none;
		border: none;
		color: #28B9B5;
		cursor: pointer;
		display: inline-block;
		vertical-align: middle;
		line-height: 1.1;
		margin-left: 10px;
	}

	.add__btn:active {
		transform: translateY(2px);
	}

	.add__type:focus,
	.add__description:focus,
	.add__value:focus,
		{
		outline: none;
		border: 1px solid #28B9B5;
	}

	.add__btn:focus {
		outline: none;
	}


	/***** LISTS *****/



	.income {
		float: left;
		width: 475px;
		margin-right: 50px;
	}

	.expenses {
		float: left;
		width: 475px;
	}

	h2 {
		text-transform: uppercase;
		font-size: 18px;
		font-weight: 400;
		margin-bottom: 15px;
	}

	.income__title {
		color: #28B9B5;
		text-align: center;
	}

	.expenses__title {
		color: #FF5049;
		text-align: center;
	}

	.item {
		padding: 13px;
		border-bottom: 1px solid #e7e7e7;
	}

	.item:first-child {
		border-top: 1px solid #e7e7e7;
	}

	.item:nth-child(even) {
		background-color: #f7f7f7;
	}

	.item__description {
		float: left;
	}

	.item__value,
	.item__quantity {
		float: left;
		transition: transform 0.3s;
	}

	.item__percentage {
		float: left;
		margin-left: 20px;
		transition: transform 0.3s;
		font-size: 11px;
		background-color: #FFDAD9;
		padding: 3px;
		border-radius: 3px;
		width: 32px;
		text-align: center;
	}

	.income .item__value,
	.income .item__delete--btn {
		color: #28B9B5;
	}

	.expenses .item__value,
	.expenses .item__percentage,
	.expenses .item__delete--btn {
		color: #FF5049;
	}

	.item__delete {
		float: left;
	}

	.item__delete--btn {
		font-size: 22px;
		background: none;
		border: none;
		cursor: pointer;
		display: inline-block;
		vertical-align: middle;
		line-height: 1;
		display: none;
	}

	.item__delete--btn:focus {
		outline: none;
	}

	.item__delete--btn:active {
		transform: translateY(2px);
	}

	.item:hover .item__delete--btn {
		display: block;
	}

	.item:hover .item__value {
		transform: translateX(-20px);
	}

	.item:hover .item__percentage {
		transform: translateX(-20px);
	}

	.unpaid {
		background-color: #FFDAD9 !important;
		cursor: pointer;
		color: #FF5049;
	}

	.unpaid .item__percentage {
		box-shadow: 0 2px 6px 0 rgba(0, 0, 0, 0.1);
	}

	.unpaid:hover .item__description {
		font-weight: 900;
	}

	.benefit {
		background-color: #21DC98;
		color: white;
		font-weight: 400;
		padding: 1rem;
		border-radius: 2rem 2rem 2rem 2rem;
	}

	.product_image {
		max-width: 20rem;
	}



	.product_price {
		font-weight: bold;
	}
	.product_info{
		cursor: pointer;
	}
</style>
@stop
{{-- Content --}}
@section('content')


<div class="page-content mt-4 mb-10 pb-6 account">
	<div class="container">
		<h2 class="title title-left mb-10">Mis Pedidos</h2>
		<div class="tab tab-vertical gutter-lg">
			<ul class="nav nav-tabs mb-4 col-lg-3 col-md-4" role="tablist">

				<li class="nav-item">
					<a class="nav-link active" href="#calculadora">Calculadora</a>
				</li>
				<li class="nav-item">
					<a class="nav-link " href="#curso">Consultar Detalles</a>
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
									<input name="" id="" class="add__productName"placeholder="Buscar Producto">

									<!-- <input type="text" class="add__description" placeholder="Añada descripción"> -->
									<input type="number" class="add__price" placeholder="Precio" readonly>
									<input type="number" class="add__quantity" placeholder="Cantidad">
									<input type="number" class="add__finalPrice" placeholder="Precio Final">
									<button class="add__btnProduct"><i class="fas fa-plus-square"></i></button>
								</div>
							</div>
							<table class="table-striped table-hover product-table" style="display:none">
								<tbody>
									<tr class="product_info" data-product="NombreProducto"data-price="140.00">
										<td style="width:30%">
											<img class="product_image" src="/images/renovable.jpg" alt="">
										</td>
										<td class="product_name"style="width:30%">
											Producto #1
										</td>
										<td class="product_price" style="width:30%">
											140.00€
										</td>
									</tr>
								</tbody>
							</table>

							<div class="add">
								<div class="add__container">
									<select class="add__type">
										<option value="inc" selected>+</option>
										<option value="exp">-</option>
									</select>
									<input type="text" class="add__description" placeholder="Añada descripción">
									<input type="number" class="add__value" placeholder="Valor">
									<button class="add__btn"><i class="fas fa-plus-square"></i></button>
								</div>
							</div>

							<div class="container clearfix mt-3" style="display:flex">
								<div class="income">
									<h2 class="income__title">Costes</h2>

									<div class="income__list">
									</div>
								</div>


								<div class="expenses">
									<h2 class="expenses__title">Descuentos</h2>

									<div class="expenses__list">
									</div>
								</div>
							</div>
						</div>

					</fieldset>
				</div>
				<div class="tab-pane pedidos-pane" id="curso">

				</div>
			</div>
		</div>
	</div>
</div>


@stop
{{-- Scripts --}}
@section('scripts')
<script>
	$(document).on("click", ".add__btn", function() {
		var funcion = ($('.add__type').find(":selected").val());
		var valor = parseFloat($('.add__value').val());
		var descripcion = ($('.add__description').val());
		console.log(descripcion);
		var total = parseFloat($("#totalPresupuesto").val());
		var newHtml;
		var id = parseInt($('#id').val());

		//RESTA
		if (funcion == "exp") {
			valor = 0 - valor;
			total = total + valor;
			var valorPrevio = parseFloat($(".budget__expenses--value").text());
			var valorFinal = valor + valorPrevio;
			$(".budget__expenses--value").text(valorFinal.toFixed(2));
			element = $(".expenses__list");
			html = '<div class="item clearfix" id="exp-%id%"><div class="item__description">%description%</div><div class="right clearfix"><div class="item__value">%value%</div><div class="item__percentage">%percentage%</div><div class="item__delete" data-id="exp-%idBoton%"><button class="item__delete--btn"><i class="fas fa-times"></i></button></div></div></div>';
			newhtml = html.replace('%id%', id);
			newHtml = newhtml.replace('%idBoton%', id);
		}
		//SUMA
		else {
			total = total + valor;
			var valorPrevio = parseFloat($(".budget__income--value").text());
			var valorFinal = valor + valorPrevio;
			$(".budget__income--value").text(valorFinal.toFixed(2));
			element = $(".income__list");
			html = '<div class="item clearfix" id="inc-%id%"> <div class="item__description">%description%</div><div class="right clearfix"><div class="item__value">%value%</div><div class="item__delete"><button class="item__delete--btn"data-id="inc-%idBoton%"><i class="fas fa-times " )></i></button></div></div></div>';
			newhtml = html.replace('%id%', id);
			newHtml = newhtml.replace('%idBoton%', id);
		}
		//ACTUALIZA TOTAL
		actualizaTotal(total);

		//AÑADE A LA LISTA

		var valorPrevioNegativo = parseFloat($(".budget__expenses--value").text());
		var valorPrevioPositivo = parseFloat($(".budget__income--value").text());

		//CÁLCULO PORCENTAJE CONCEPTO
		var porcentaje = ((valor * (-1)) * 100) / valorPrevioPositivo;

		//CÁLCULO PORCENTAJE TOTAL
		var porcentajeTotal = ((valorPrevioNegativo * (-1)) * 100) / valorPrevioPositivo;

		//ADJUNTAR A LA CORRESPONDIENTE LISTA
		newHtml = newHtml.replace('%description%', descripcion);
		newHtml = newHtml.replace('%value%', valor.toFixed(2));
		if (total > 0 && valorPrevioNegativo != 0) {
			if (valorPrevioPositivo != 0) {
				newHtml = newHtml.replace('%percentage%', porcentaje.toFixed(2) + "%");
			}

			$(".budget__expenses--percentage").text(porcentajeTotal.toFixed(2) + "%");
		}
		element.append(newHtml);


		//RESET INPUTS
		resetInputs();
		id = id + 1;
		$('#id').val(id);
	});

	$(document).on("click", ".add__btnProduct", function() {
		var producto = ($('.add__productName').val());
		var precio = parseFloat($('.add__price').val());
		var precioFinal = parseFloat($('.add__finalPrice').val());
		var cantidad = $('.add__quantity').val();
		var total = parseFloat($("#totalPresupuesto").val());
		var newHtml;
		var id = parseInt($('#id').val());

		var precioxProducto = precioFinal * cantidad;
		console.log(precioxProducto);
		var beneficioProducto = (cantidad * precioFinal) - (precio * cantidad);
		console.log(beneficioProducto);


		total = total + precioxProducto;
		var valorPrevio = parseFloat($(".budget__income--value").text());
		var valorFinal = precioxProducto + valorPrevio;
		$(".budget__income--value").text(valorFinal.toFixed(2));
		element = $(".income__list");
		html = '<div class="item clearfix" id="product-%id%"> <div class="item__quantity" style="margin-right:2rem">%quantity%</div><div class="item__description">%description%</div><div class="right clearfix"><div class="item__value">%value%</div><div class="item__delete"><button class="item__delete--btn" data-id="product-%idBoton%"><i class="fas fa-times"></i></button></div></div></div>';
		newhtml = html.replace('%id%', id);
		newHtml = newhtml.replace('%idBoton%', id);
		newHtml = newHtml.replace('%description%', producto);
		newHtml = newHtml.replace('%quantity%', cantidad);
		newHtml = newHtml.replace('%value%', precioFinal.toFixed(2));
		//ACTUALIZA TOTAL
		$(".benefit").text(beneficioProducto.toFixed(2) + "€");
		actualizaTotal(total);

		//AÑADE A LA LISTA

		/* 	var valorPrevioNegativo = parseFloat($(".budget__expenses--value").text());
			var valorPrevioPositivo = parseFloat($(".budget__income--value").text()); */

		//CÁLCULO PORCENTAJE CONCEPTO
		/* 		var porcentaje = ((valor * (-1)) * 100) / valorPrevioPositivo; */

		//CÁLCULO PORCENTAJE TOTAL
		/* var porcentajeTotal = ((valorPrevioNegativo * (-1)) * 100) / valorPrevioPositivo; */

		//ADJUNTAR A LA CORRESPONDIENTE LISTA

		/* 	if (total > 0 && valorPrevioNegativo != 0) {
				if (valorPrevioPositivo != 0) {
					newHtml = newHtml.replace('%percentage%', porcentaje.toFixed(2) + "%");
				}

				$(".budget__expenses--percentage").text(porcentajeTotal.toFixed(2) + "%");
			} */
		element.append(newHtml);


		//RESET INPUTS
		resetInputs();

	});

	//ELIMINAR FILA DESGLOSE

	$(document).on("click", ".item__delete--btn", function() {

		var target = $(this).data("id");
		console.log(target);
		var precio = parseFloat($("#" + target + ">.right>.item__value").text());
		var cantidad = parseFloat($("#" + target + ">.item__quantity").text());
		precio = precio * cantidad;
		var total = parseFloat($("#totalPresupuesto").val());
		total = total - precio;
		actualizaTotal(total);
		$("#" + $(this).data("id")).remove();
	});

	//ACTUALIZAR TOTAL PRESUPUESTO
	function actualizaTotal(total) {
		$("#totalPresupuesto").val(total);
		$(".budget__value").text(total.toFixed(2) + "€");
	}

	function resetInputs() {
		$('.add__description').val("");
		$('.add__value').val("");
		$('.add__price').val("");
		$('.add__productName').val("");
		$('.add__quantity').val("");
		$('.add__finalPrice').val("");
	}


	//SELECTOR DE PRODUCTOS
	$(document).on("click",".product_info",function(){
		var producto=$(this).data("product");
		var precio=$(this).data("price");
		$(".add__productName").val(producto);
		$(".add__price").val(precio);
		$(".product-table").css("display","none");
	});

	$(".add__productName").on("keypress",function(){
		$(".product-table").css("display","block");
	});	
</script>
@stop