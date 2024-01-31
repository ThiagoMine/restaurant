
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
						<h6 class="m-0 font-weight-bold text-primary">Relatório de Produtos:</h6>
					</div>
					<div class="card-body">
                        {{-- orders --}}
                        @foreach ($data as $item)
                            <div class="purchase">
                                <div class="content w-100 d-flex justify-content-between flex-wrap mb-2">
                                    <span class="number text-gray-900 h4">{{ $item["name"] }}</span>
                                    <span class="date text-gray-900">{{ $item["count"] }}</span>
                                </div>
                            </div>
                            <hr>
                        @endforeach
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
    <script>
        $(".show-more").on("click", function() {
            var purchaseId = $(this).data('purchaseid');
            if ($(".purchase-"+purchaseId).hasClass('hidden')) {
                $(".purchase-"+purchaseId).removeClass('hidden');
                $(this).find('i').css('transform', 'rotate(' + 90 + 'deg)');
            } else {
                $(".purchase-"+purchaseId).addClass('hidden');
                $(this).find('i').css('transform', 'rotate(' + -90 + 'deg)');
            }
        })
    </script>
@endsection