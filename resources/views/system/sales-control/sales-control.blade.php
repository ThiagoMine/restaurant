@extends("system.layouts.app")

@section('title', "Controle de Mesas")

@section("content")
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow d-flex
                justify-content-between">
                <!-- Page Heading -->
                <h1 class="h3 mb-4 text-gray-800">Gestão de Vendas</h1>

                <div>
                    <a href="/admin/sales-control/open-command" class="btn btn-lg btn-primary mx-2 mb-3">
                        <span>Abrir Comanda</span>
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
                    @if ($sales)
                        @foreach ($sales as $sale)
                            <div class="card border-left-warning shadow h-500 py-2 w-30 m-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Comanda Aberta</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">Comanda  {{$sale->command_number}} - {{ $sale->contact_name }}</div>
                                        </div>
                                        <div class="col-auto">
                                            @if($sale->has_delivery)
                                                <img src="{{ asset('images/fernandinho.png') }}" alt="" class="option-icon">
                                            @else
                                                @if ($sale->for_trip)
                                                    <img src="{{ asset('images/bag_icon.png') }}" alt="" class="option-icon">
                                                @else
                                                    <img src="{{ asset('images/table_icon.png') }}" alt="" class="option-icon">
                                                @endif
                                            @endif
                                        </div>
                                    </div>
                                    <div class="align-items-center row no-gutters mt-3">
                                        <a href="/admin/order/create-order/{{ $sale->command_number }}" class="btn btn-lg btn-success mx-2">
                                            <span>Pedido</span>
                                        </a>
        
                                        <a href="/admin/sales-control/command/{{ $sale->command_number }}" class="btn btn-lg btn-warning mx-2">
                                            <span>Visualizar</span>
                                        </a>
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