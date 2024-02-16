
@extends("system.layouts.app")

@section('title', "Registrar Pedidos")

@section("content")
	<!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav
                class="navbar navbar-expand navbar-light bg-white topbar d-flex justify-content-between mb-4 static-top shadow">
                <h1 class="h3 mb-4 text-gray-800">Gerar Pedido</h1>
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
            <div class="container-fluid h-80 row">

                <!-- Page Heading -->
                <!-- Orders -->
                <div class="col-lg-9 mb-4 h-100">
                    <div class="card shadow mb-4 h-100">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Escolha seu produto</h6>
                        </div>
                        <div class="card-body bg-gradient-dark h-100">
                            <!-- Vertical Tabs -->
                            <div class="d-flex h-100 product-holder">	
                                <div class="w-30">
                                    <ul class="nav nav-tabs flex-column" id="myTab" role="tablist">
                                        @foreach ($categories as $category)
                                            <li class="nav-item">
                                                <a class="nav-link categories-tabs @if($loop->first) active @endif" id="{{$category['seo_name']}}-tab" data-toggle="tab" href="#{{$category['seo_name']}}"
                                                    role="tab" aria-controls="{{$category['seo_name']}}" aria-selected="true">{{$category['name']}}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                                <div class="w-70 h-100">
                                    <!-- Tab content -->
                                    <div class="ml-1 p-1 h-100 tab-content bg-gradient-light scroll-enable" id="myTabContent">
                                        @foreach ($categories as $category)
                                            <div class="tab-pane fade @if($loop->first) show active @endif" id="{{$category['seo_name']}}" role="tabpanel"
                                                aria-labelledby="{{$category['seo_name']}}-tab">
                                                <h3 class="text-center">{{$category['name']}}</h3>
                                                <div class="d-flex justify-content-around bg-transparent flex-wrap">
                                                    @if (isset($category['products']) && (count($category['products']) >0))

                                                        @foreach ($category['products'] as $product)
                                                            <!-- Product Item -->
                                                            <div class="product-item border border-secondary p-3 w-30 mt-5">
                                                                <div class="image-item">
                                                                    <img class="img-item" src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
                                                                </div>
                                                                <div class="name text-gray-900 fs-15em">{{ $product['name'] }}</div>
                                                                <div class="price text-gray-900">R$ {{ number_format($product['price'], 2, ",", ".") }}</div>
                                                                <div class="action"> 
                                                                    {{-- <a class="btn btn-lg btn-success mx-2" href="#" data-toggle="modal" data-target="#addProductModal-{{$category['seo_name']}}">
                                                                        <span>adicionar</span>
                                                                    </a>	 --}}
                                                                    <a class="btn btn-lg btn-success mx-2 addProductModal" href="#"
                                                                        data-productid="{{$product['id']}}" 
                                                                        data-name="{{$product['name']}}" 
                                                                        data-price="{{$product['price']}}" 
                                                                        data-categoryId="{{$product['id']}}" 
                                                                        data-category="{{$category['seo_name']}}">
                                                                        <span>adicionar</span>
                                                                    </a>					
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    @else
                                                        <h3> Nenhum Produto cadastrado</h3>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 mb-4">
                    <div class="card shadow mb-4">
                        <form action="{{ url()->to('/') }}/admin/order/create-order/1" method="POST" id="order-form">
                            @csrf
                            <input type="hidden" name="command" value="{{$command}}">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Pedido</h6>
                            </div>
                            <div class="card-body">
                                <div class="full-filipeta p-3">
                                    <div class="order">
                                        <div class="my-1">
                                            <span>Código:</span>
                                            <span class="text-gray-900">Xa1H#</span>
                                        </div>
                                        <h6>Items</h6>

                                        <div class="no-product">
                                            <span class="name text-gray-900 fs-15em">
                                                Nenhum produto adicionado ainda
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-5">
                                    <a class="btn btn-lg btn-success mx-2 finish-order">
                                        <span>Finalizar pedido e enviar para a cozinha</span>
                                    </a>                                    
                                </div>
                            </div>
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
    <!-- End of Content Wrapper -->
@endsection

@section('modals')
    @foreach ($categories as $category)
        <div class="modal" id="addProductModal-{{$category['seo_name']}}">
            <div class="modal-dialog mw-70 w-70">
                <div class="modal-content">
            
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Informe as observações e os adicionais</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
            
                    <!-- Modal body -->
                    <div class="modal-body">
                        <form class="order-add-form">
                            <div class="obs form-group">
                                <h5>Informações Adicionais</h5>
                                <textarea class="form-control obs" name="obs" cols="50" rows="10"></textarea>
                            </div>
                            <hr>
                            @if (isset($category['additionals']) && (count($category['additionals']) >0))
                                <h5>Adicionais</h5>
                                <div class="aditionals d-flex flex-wrap">
                                @foreach ($category['additionals'] as $additional)
                                    <div class="form-group aditional-item w-30">
                                        <div class="form-check form-check-lg">
                                            <input type="checkbox" class="form-check-input" name="additionals" id="{{$additional['seo_name']}}" value="{{$additional['id']}} - {{$additional['name']}}">
                                            <label class="form-check-label" for="{{$additional['seo_name']}}">{{$additional['name']}}</label>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            @endif

                            @if ($category['id'] == 8)
                                <div class="form-group">
                                    <label for="product-name" class="fs-15em ">Nome do Produto:</label>
                                    <input 
                                        type="text" 
                                        class="form-control w-50" 
                                        id="product-name" 
                                        name="product-name" 
                                        placeholder="Informe o nome do Produto"
                                    >
                                </div>
                                <div class="form-group">
                                    <label for="product-price" class="fs-15em ">Valor do Produto:</label>
                                    <input 
                                        type="number" 
                                        class="form-control w-50" 
                                        id="product-price" 
                                        name="product-price" 
                                        placeholder="Informe o nome do Produto"
                                    >
                                </div>
                            @endif
                            @if ($category['id'] == 4 && isset($category['products']) && (count($category['products']) >0))
                            <div class="form-group half-item w-30">
                                <div class="form-check form-check-lg">
                                    <input type="checkbox" class="form-check-input" name="has_half" id="has_half" value="has_half">
                                    <label class="form-check-label" for="has_half">É meia a meia</label>
                                </div>
                                <div class="form-select select-half hidden">
                                    <select class="form-select" name="half" id="half">
                                        @foreach ($category['products'] as $product)
                                            <option value="{{ $product['name']."|".$product['price']."|".$product['id'] }}">{{ $product['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @endif
                            <div class="hidden product-information">
                                
                            </div>
                        </form>
                    </div>
            
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success btn-add-product"
                            data-category="{{$category['seo_name']}}">Adicionar</button>
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    </div>
        
                </div>
            </div>
        </div>
    @endforeach
@endsection

@section('scripts')
    <script src="{{asset('js/system/create-order.js')}}"></script>  
@endsection