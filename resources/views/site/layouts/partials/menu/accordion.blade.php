<div id="menu-accordion" class="">
	<div class="container">
		<div class="row">
            <div class="accordion" id="accordionExample">
                @isset($categories)
                    @foreach ($categories as $category)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="category_{{ $category['id'] }}">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#category_{{ $category['id'] }}" aria-expanded="true" aria-controls="category_{{ $category['id'] }}">
                                    {{ $category['name'] }}
                                </button>
                            </h2>
                            <div id="category_{{ $category['id'] }}" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                @isset($category['products'])
                                    <div class="row">
                                        @foreach ($category['products'] as $product)
                                            <div class="card col-lg-4 col-sm-6">
                                                <div class="image">
                                                    <img src="{{ asset($product['image']) }}" alt="" class="img-80">
                                                    
                                                </div>
                                                <div class="title">
                                                    {{ $product['name'] }}
                                                </div>
                                                <div class="description">
                                                    {{ $product['description'] }}
                                                </div>
                                                <div class="price">
                                                    R$ {{ number_format($product['price'], 2, '.', ',') }}
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                @endisset
                            </div>
                        </div>
                        <hr>
                    @endforeach
                @endisset
            </div>
        </div>
    </div>
</div>