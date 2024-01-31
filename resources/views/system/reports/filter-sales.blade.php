
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
						<h6 class="m-0 font-weight-bold text-primary">Relatório de vendas:</h6>
					</div>
					<div class="card-body">
                        {{-- orders --}}
                        @foreach ($data as $item)
                            <div class="purchase">
                                <div class="content w-100 d-flex justify-content-between flex-wrap mb-2">
                                    <span class="number text-gray-900 h4">Compra {{ $item["purchaseId"] }}</span>
                                    <span class="date text-gray-900">{{ $item["created_at"] }}</span>
                                </div>
                                <div class="sub-total">
                                    <div class="content w-100 d-flex justify-content-between flex-wrap mb-2">
                                        <span class="number text-blue-900 fs-15em">Total da Compra</span>
                                        <span class="date text-blue-900 fs-15em">R$ {{ number_format($item["total"], 2, ",", ".") }}</span>
                                    </div>
                                </div>
                                <a class='show-more' data-purchaseid="{{$item["purchaseId"]}}">
                                    Demais informações
                                    <i class="fa fa-angle-right"></i>
                                </a>
                                @foreach ($item['orders'] as $order)
                                    @if (isset($order['products']))
                                        <div class="orders hidden purchase-{{$item["purchaseId"]}}">
                                            <h5>Pedido {{$order['orderId']}} - Items</h5>

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
                                                    <span class="date text-blue-900 fs-15em">R$ {{ number_format($order["orderTotal"], 2, ",", ".") }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                
                            </div>
                            <hr>
                        @endforeach

                        <div class="report-total">
                            <div class="content w-100 d-flex justify-content-between flex-wrap mb-2">
                                <span class="number text-blue-900 fs-15em">Total vendido no período: </span>
                                <span class="date text-blue-900 fs-15em">R$ {{ number_format($reportTotal, 2, ",", ".") }}</span>
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