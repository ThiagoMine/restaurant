
@extends("system.layouts.app")

@section('title', "Registro de Adicionais")

@section("content")
	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="content">

			<!-- Topbar -->
			<nav class="navbar navbar-expand navbar-light bg-white topbar d-flex justify-content-between mb-4 static-top shadow">
				<h1 class="h3 mb-4 text-gray-800">Cadastro de Adicionais</h1>
				<a href="/admin/register/products" class="btn btn-lg btn-primary mx-2 mb-3">
					<span>Voltar para lista de Adicionais</span>
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
						<h6 class="m-0 font-weight-bold text-primary">Registrar Adicionais</h6>
					</div>
					<div class="card-body">
						@if(!$isEdit)
							<form action="{{ route('products.store') }}" enctype="multipart/form-data" method="POST">
								@csrf
						@else
							<form action="{{ route('products.update', $product) }}" enctype="multipart/form-data" method="POST">
								@method("PUT")
								@csrf
						@endif
						
							<div class="form-group">
								<label for="name" class="fs-15em ">Nome:</label>
								<input type="text" class="form-control w-50" id="name" name="name" placeholder="Informe o nome do Produto"
									@if($isEdit) value="{{$product->name}}" @endif>
							</div>

							<div class="form-group">
								<h5>Descrição</h5>
								<textarea class="form-control" name="description" id="description" cols="20" rows="5">@if($isEdit) {{$product->description}} @endif</textarea>
							</div>

							<div class="form-group">
								<label for="name" class="fs-15em ">Preço:</label>
								<div class="input-group w-50">
									<div class="input-group-prepend">
										<span class="input-group-text">R$</span>
									</div>
									<input type="text" class="form-control" id="price" name="price" @if($isEdit) value="{{$product->price}}" @endif>
								</div>
							</div>

							<div class="form-group">
								<label for="imageUpload" class="fs-15em ">Escolha uma imagem:</label>
								<input type="file" class="form-control-file" id="image" name="image" accept="image/*">
							</div>

							<div class="mb-3 form-check form-check-lg">
								<input 
									type="checkbox" 
									class="form-check-input" 
									id="is_active" 
									name="is_active"
									@if ($isEdit && $product->is_active)
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