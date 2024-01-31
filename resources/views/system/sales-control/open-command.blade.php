@extends("system.layouts.app")

@section('title', "Registro de Produtos")

@section("content")
	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="content">

			<!-- Topbar -->
			<nav class="navbar navbar-expand navbar-light bg-white topbar d-flex justify-content-between mb-4 static-top shadow">
				<h1 class="h3 mb-4 text-gray-800">Abrir comanda</h1>
				<a href="/admin/sales-control" class="btn btn-lg btn-primary mx-2 mb-3">
					<span>Voltar para gestão de pedidos</span>
				</a>

				<a href="/admin" class="btn btn-lg btn-primary mx-2 mb-3">
					<i class="fa fa-home"></i>
				</a>
			</nav>
			<!-- End of Topbar -->

			<!-- Begin Page Content -->
			<div class="container-fluid">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Registrar Produtos</h6>
					</div>
					<div class="card-body">
						
						<form action="/admin/sales-control/open-command" enctype="multipart/form-data" method="POST">
							@csrf
						
							<div class="form-group">
								<label for="name" class="fs-15em ">Nome do Cliente:</label>
								<input 
									type="text" class="form-control w-50" id="name" name="name" 
									placeholder="Informe o nome do Cliente">
							</div>
							
							<div class="form-group">
								<label for="command" class="fs-15em ">Número da Comanda:</label>
								<input 
									type="number" class="form-control w-50" id="name" name="command" 
									placeholder="Informe o número da comanda">
							</div>
							
							<div class="form-group">
								<label for="" class="fs-15em ">Tipo:</label>
								<div class="form-check">
									<input class="form-check-input" type="radio" name="opcao" id="opcao1" value="opcao1">
									<label class="form-check-label" for="opcao1">
										Consumo no local
									</label>
								</div>
							
								<div class="form-check">
									<input class="form-check-input" type="radio" name="opcao" id="opcao2" value="opcao2">
									<label class="form-check-label" for="opcao2">
										Cliente vai Levar
									</label>
								</div>
							
								<div class="form-check">
									<input class="form-check-input" type="radio" name="opcao" id="opcao3" value="opcao3">
									<label class="form-check-label" for="opcao3">
										Delivery
									</label>
								</div>
							</div>

							<div class="form-group hidden" id="delivery-address">
								<h5>Endereço</h5>
								<textarea class="form-control" 
									name="delivery_address" id="delivery_address" 
									cols="20" rows="5"></textarea>
							</div>

							<button type="submit" class="btn btn-primary mt-5">Abrir</button>
						</form>
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

@section("scripts")
	<script src="{{asset('js/system/open-command.js')}}"></script>
@endsection