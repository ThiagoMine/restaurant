
@extends("system.layouts.app")

@section('title', "Registro de Produtos")

@section("content")
	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="content">

			<!-- Topbar -->
			<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow d-flex
				justify-content-between">
				<!-- Page Heading -->
				<h1 class="h3 mb-4 text-gray-800">Categorias</h1>

				<div>
					<a href="categories/create" class="btn btn-lg btn-success mx-2 mb-3">
						<span>Nova Categoria</span>
					</a>
                    <a href="/admin" class="btn btn-lg btn-primary mx-2 mb-3">
                        <i class="fa fa-home"></i>
                    </a>
				</div>
			</nav>
			<!-- End of Topbar -->

			<!-- Begin Page Content -->
			<div class="container-fluid">

				<!-- DataTales Example -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Categorias Cadastros</h6>
					</div>
					<div class="card-body">
						<div class="table-responsive">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Nome</th>
										<th>Está Ativo</th>
										<th>Ações</th>
									</tr>
								</thead>
								<tfoot>
									<tr>
										<th>Nome</th>
										<th>Está Ativo</th>
										<th>Ações</th>
									</tr>
								</tfoot>
								<tbody>
									
									@foreach ($categories as $category)
										<tr>
											<td>{{$category->name}}</td>
											<td>
												@if ($category->is_active)
													Sim
												@else
													Não
												@endif
											</td>
											<td>
												<div class="align-items-center row no-gutters">
													<a href="/admin/register/categories/{{$category->id}}/edit" class="btn btn-warning btn-circle ml-3 img-fluid">
														<i class="fas fa-pen"></i>
													</a>
													{{-- <form action="{{ route('categories.destroy', $category) }}" method="POST">
														@method("DELETE")
														@csrf
														<button class="btn btn-danger btn-circle ml-3">
															<i class="fas fa-trash"></i>
														</button>
													</form> --}}
												</div>
											</td>
										</tr>
									@endforeach
								</tbody>
							</table>
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

@section('scripts')
	<!-- Page level plugins -->
    <script src="{{asset('vendor/system/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('vendor/system/datatables/dataTables.bootstrap4.min.js')}}"></script>

    <!-- Page level custom scripts -->
    <script src="{{asset('js/system/demo/datatables-demo.js')}}"></script>
@endsection