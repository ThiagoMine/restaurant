
@extends("system.layouts.app")

@section('title', "Registro de Produtos")

@section("content")
	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="content">

			<!-- Topbar -->
			<nav class="navbar navbar-expand navbar-light bg-white topbar d-flex justify-content-between mb-4 static-top shadow">
				<h1 class="h3 mb-4 text-gray-800">Cadastro de Categorias</h1>
				<a href="{{ route('configs.index') }}" class="btn btn-lg btn-primary mx-2 mb-3">
					<span>Voltar para lista de Configurações</span>
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
						<h6 class="m-0 font-weight-bold text-primary">Registrar Configurações</h6>
					</div>
					<div class="card-body">
						<form action="{{ route('configs.update', $config) }}" method="POST">
							@method('PUT')
							@csrf
							<div class="form-group d-flex">
								<label for="name" class="fs-15em">Nome:</label>
								<input 
									type="text" 
									class="form-control w-50 ml-3" 
									id="name" 
									name="name" 
									placeholder="Informe o nome da categoria"
									@if ($isEdit && $config->name)
										value="{{$config->name}}"
									@endif
									@disabled(true)
								>
							</div>


							<div class="form-group d-flex">
								<label for="value" class="fs-15em">Valor:</label>
								<input 
									type="text" 
									class="form-control w-50 ml-3" 
									id="value" 
									name="value" 
									placeholder="Informe o nome da categoria"
									@if ($isEdit && $config->value)
										value="{{$config->value}}"
									@endif
								>
							</div>

							<div class="mb-3 form-check form-check-lg">
								<input 
									type="checkbox" 
									class="form-check-input" 
									id="active" 
									name="active"
									@if ($isEdit && $config->active)
										@checked(true)
									@endif
								>
								<label class="form-check-label fs-15em" for="is_active">Ativo</label>
							</div>

							<button type="submit" class="btn btn-primary mt-5">Salvar</button>
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