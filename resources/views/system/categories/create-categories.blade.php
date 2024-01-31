
@extends("system.layouts.app")

@section('title', "Registro de Produtos")

@section("content")
	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="content">

			<!-- Topbar -->
			<nav class="navbar navbar-expand navbar-light bg-white topbar d-flex justify-content-between mb-4 static-top shadow">
				<h1 class="h3 mb-4 text-gray-800">Cadastro de Categorias</h1>
				<a href="{{ route('categories.index') }}" class="btn btn-lg btn-primary mx-2 mb-3">
					<span>Voltar para lista de categorias</span>
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
						<h6 class="m-0 font-weight-bold text-primary">Registrar Categorias</h6>
					</div>
					<div class="card-body">

						@if ($isEdit)
							<form action="{{ route('categories.update', $category) }}" method="POST">
								@method('PUT')
						@else
							<form action="{{ route('categories.store') }}" method="POST">
						@endif

							@csrf
							<div class="form-group d-flex">
								<label for="name" class="fs-15em">Nome:</label>
								<input 
									type="text" 
									class="form-control w-50 ml-3" 
									id="name" 
									name="name" 
									placeholder="Informe o nome da categoria"
									@if ($isEdit && $category->name)
										value="{{$category->name}}"
									@endif
								>
							</div>

							<div class="mb-3 form-check form-check-lg">
								<input 
									type="checkbox" 
									class="form-check-input" 
									id="is_active" 
									name="is_active"
									@if ($isEdit && $category->is_active)
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