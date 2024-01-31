@extends("system.layouts.app")

@section('title', "Controle da Cozinha")

@section("content")
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow d-flex
                justify-content-between">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Pedidos da Cozinha</h1>

                <div class="actions">
                    <a href="/admin/sales-control" class="btn btn-lg btn-primary mx-2 mb-3">
                        <span>Voltar para gestão de pedidos</span>
                    </a>
                    <a href="/admin" class="btn btn-lg btn-primary mx-2 mb-3">
                        <i class="fa fa-home"></i>
                    </a>
                </div>
            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <div class="row d-flex justify-content-start flex-wrap">
                    @if ($orders)
                        @foreach ($orders as $order)
                            <div class="card border-left-info shadow h-500 py-2 w-30 m-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pedido Aberto - {{ $order['id'] }}<br>
                                                {{$order["date"]}}
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Comanda  {{$order['command']}} - {{ $order['name'] }}</div>
                                        </div>
                                        <div class="col-auto">
                                            @if($order["has_delivery"])
                                                <img src="{{ asset('images/fernandinho.png') }}" alt="" class="option-icon">
                                            @else
                                                @if ($order["for_trip"])
                                                    <img src="{{ asset('images/bag_icon.png') }}" alt="" class="option-icon">
                                                @else
                                                    <img src="{{ asset('images/table_icon.png') }}" alt="" class="option-icon">
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="align-items-center no-gutters mt-3">
                                        @foreach ($order["itens"] as $item)
                                            <div class="kitchen-product mt-3">
                                                <div class="name py-2">
                                                    <span class="text-gray-900 fs-15em">{{ $item['name'] }}</span>
                                                </div>
                                                <div class="kitchen-comments py-1">
                                                    <span class="fs-12em">{{ $item['comments'] }}</span>
                                                </div>
                                                <div class="kitchen-additionals py-1">
                                                    @if (isset($item['additionals']))
                                                        <div class="additionals">   
                                                        @foreach ($item['additionals'] as $addtional)
                                                            <span class="text-blue-900 fs-12em">+</span>
                                                            <span class="fs-12em">{{ $addtional }}</span><br>
                                                        @endforeach
                                                        </div>
                                                    @endif
                                                </div>
                                                
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="align-items-center no-gutters mt-3">
                                        <form action="/admin/order/finalize-kitchen" method="POST">
                                            @csrf
                                            <input type="hidden" name="orderId" value="{{ $order['id'] }}">
                                            <button class="btn btn-success btn-icon-split btn-lg">
                                                <span class="icon text-white-50">
                                                    <i class="fas fa-flag"></i>
                                                </span>
                                                <span class="text">Finalizar</span>
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>    
                        @endforeach
                    @endif
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
@endsection