@extends("system.layouts.app")

@section('title', "Registro de Produtos")

@section("content")
<div id="content-wrapper" class="d-flex flex-column">

	{{-- @php
		dd($contact_name);
	@endphp --}}

	<!-- Main Content -->
	<div id="content">

		<!-- Topbar -->
		<nav class="navbar navbar-expand navbar-light bg-white topbar d-flex justify-content-between mb-4 static-top shadow">
			<h1 class="h3 mb-4 text-gray-800">Comanda {{ $command_number }}</h1>
			<a href="/admin/sales-control" class="btn btn-lg btn-primary mx-2 mb-3">
				<span>Voltar para vendas</span>
			</a>
			<a href="/admin" class="btn btn-lg btn-primary mx-2 mb-3">
				<i class="fa fa-home"></i>
			</a>
			
		</nav>
		<!-- End of Topbar -->

		<!-- Begin Page Content -->
		<div class="container-fluid row">
			<!-- Orders -->
			<div class="col-lg-9 mb-4">

				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Pedidos</h6>
					</div>
					<div class="card-body">
						<div class="filipeta p-3">
							
							{{-- orders --}}
							@foreach ($orders as $order)
								<div class="order">
									<div class="content w-100 d-flex justify-content-between flex-wrap mb-2">
										<span class="number text-gray-900">Pedido {{ $order["id"] }}</span>
										<span class="date text-gray-900">{{ $order["created_at"] }}</span>
									</div>
								
									<a class="btn btn-sm btn-danger btn-icon-split mb-3" href="#" data-toggle="modal" data-target="#cancelOrder">
										<span class="icon text-white-50">
											<i class="fas fa-times"></i>
										</span>
										<span class="text">Cancelar Pedido</span>
									</a>
								
									<h6>Items</h6>

									@foreach ($order['products'] as $product)
										<div class="product">
											<div class="content w-100 d-flex justify-content-between flex-wrap mb-2">
												<div>
													<span class="name text-gray-900 fs-15em">{{ $product["name"] }}</span>
												</div>
												<span class="value text-gray-900 fs-15em">R$ {{ number_format($product["value"], 2, ",", ".") }}</span>
											</div>
											@if (isset($product['additionals']))
												@foreach ($product['additionals'] as $additional)
													<div class="aditionals">
														<div class="content w-100 d-flex justify-content-between flex-wrap mb-2">
															<div>
																<span class="name text-gray-900">{{ $additional["name"] }}</span>
															</div>
															<span class="value text-gray-900">R$ {{ number_format($additional["value"], 2, ",", ".") }}</span>
														</div>  
													</div>	
												@endforeach
											@endif
										</div>
									@endforeach

									<hr class="sum">
									<div class="sub-total">
										<div class="content w-100 d-flex justify-content-between flex-wrap mb-2">
											<span class="number text-blue-900 fs-15em">Total do Pedido</span>
											<span class="date text-blue-900 fs-15em">R$ {{ number_format($order["order_total"], 2, ",", ".") }}</span>
										</div>
									</div>
								</div>
								<hr>
							@endforeach



							<div class="total">
								<div class="content w-100 d-flex justify-content-between flex-wrap mb-2 ">
									<span class="number text-blue-900 fs-12em">Taxa de Entrega</span>
									<span class="date text-blue-900 fs-12em">R$ {{ number_format($delivery_tax, 2, ",", ".") }}</span>
								</div>
								<div class="content w-100 d-flex justify-content-between flex-wrap mb-2 ">
									<span class="number text-blue-900 fs-15em">Total Consumido na Comanda</span>
									<span class="date text-blue-900 fs-15em">R$ {{ number_format($sale_total_value, 2, ",", ".") }}</span>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<!-- Actions -->
			<div class="col-lg-3 mb-4">

				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Ações</h6>
					</div>
					<div class="card-body">
						<div>
							<a href="{{ url()->to('/') }}/admin/order/create-order/{{ $command_number }}" class="btn btn-lg btn-success mx-2 mb-3 w-100">
								<span>Pedido</span>
							</a>
						</div>
						{{-- <div>
							<a href="" class="btn btn-lg btn-warning mx-2 mb-3 w-100">
								<span>Imprimir</span>
							</a>
						</div> --}}
						<div>
							<button type="button" data-toggle="modal" data-target="#close_command" class="btn btn-lg btn-danger mx-2 mb-3 w-100">
								<span>Fechar</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.container-fluid -->

	</div>
	<!-- End of Main Content -->

	<!-- Footer -->
	<footer class="sticky-footer bg-white">
		<div class="container my-auto">
			<div class="copyright text-center my-auto">
				<span>Copyright &copy; Your Website 2020</span>
			</div>
		</div>
	</footer>
	<!-- End of Footer -->

</div>
@endsection

@section('modals')
	<div class="modal" id="close_command">
		<div class="modal-dialog mw-70 w-70">
			<div class="modal-content">
		
				<!-- Modal Header -->
				<div class="modal-header">
					<h4 class="modal-title">Fechar Comanda</h4>
					<button type="button" class="close" data-dismiss="modal">&times;</button>
				</div>
		
				<!-- Modal body -->
				<div class="modal-body">
					<form action="/admin/sales-control/close-command" method="POST" class="close-command">
						<h5>Informe a forma de Pagamento</h5>
						@csrf
						<input type="hidden" name="id" value="{{$id}}">
						<div class="form-group">
							<div class="form-check">
								<input class="form-check-input" type="radio" name="payment_form" id="payment-form-credit" value="credit" checked>
								<label class="form-check-label" for="payment-form-credit">
									Cartão de Crédito
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="payment_form" id="payment-form-debit" value="debit">
								<label class="form-check-label" for="payment-form-debit">
									Cartão de Débito
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="payment_form" id="payment-form-money" value="money">
								<label class="form-check-label" for="payment-form-money">
									Dinheiro
								</label>
							</div>
							<div class="form-check">
								<input class="form-check-input" type="radio" name="payment_form" id="payment-form-pix" value="pix">
								<label class="form-check-label" for="payment-form-pix">
									Pix
								</label>
							</div>
						</div>

					</form>
				</div>
		
				<!-- Modal footer -->
				<div class="modal-footer">
					<button type="button" class="btn btn-success btn-finish-purchase">Finalizar Comanda</button>
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
				</div>
	
			</div>
		</div>
	</div>
@endsection

@section("scripts")
	<script src="{{asset('js/system/view-command.js')}}"></script>
@endsection