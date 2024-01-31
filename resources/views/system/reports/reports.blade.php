
@extends("system.layouts.app")

@section('title', "Registro de Produtos")

@section("content")
	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="content">

			<!-- Topbar -->
			<nav class="navbar navbar-expand navbar-light bg-white topbar d-flex justify-content-between mb-4 static-top shadow">
				<h1 class="h3 mb-4 text-gray-800">Relatórios</h1>
				<a href="/admin" class="btn btn-lg btn-primary mx-2 mb-3">
					<span>Voltar para tela inicial</span>
				</a>
			</nav>
			<!-- End of Topbar -->

			<!-- Begin Page Content -->
			<div class="container-fluid">
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Selecione o seu relatório</h6>
					</div>
					<div class="card-body">
						<form action="/admin/reports/report/filter" method="POST">
							@csrf
							<div class="form-group">
								<label for="type" class="fs-15em ">Tipo:</label>
								<select name="type" class="form-control w-50" id="type">
									<option value="purchase"> Vendas </option>
									<option value="products"> Produtos </option>																		
								</select>
							</div>

							<div class="row">
								<div class="col-4">
									<label for="datetimepickerstart">Incio:</label>
        							<input type="datetime-local" id="datetimepickerstart" class="form-control" name="start">
								</div>
								<div class="col-4">
									<label for="datetimepickerend">Fim:</label>
        							<input type="datetime-local" id="datetimepickerend" class="form-control" name="end">
								</div>
							</div>

							<div class="form-group">
								<label for="delivery" class="fs-15em ">Tipo de venda:</label>
								<select name="delivery" class="form-control w-50" id="delivery">
									<option value="all"> Todas </option>
									<option value="delivery"> Entrega </option>																		
									<option value="trip"> Retirada </option>																		
									<option value="consume"> Local </option>																		
								</select>
							</div>

							<button type="submit" class="btn btn-primary mt-5">Buscar</button>
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
	<!-- Bootstrap JS e dependências -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

	<!-- Bootstrap-datepicker JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

	<script>
		$(document).ready(function(){
			$('#datepicker').datepicker({
				format: 'dd/mm/yyyy', // Especifique o formato desejado da data
				autoclose: true
			});
		});
	  </script>
@endsection