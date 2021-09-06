@extends('_layouts.main')


@section('heading')
    {{ $product['name'] }}
    <a href="/products/index_vue" class="btn btn-primary">Back</a>
@endsection


@section('content')
    <div>
        <div id="product-page" class="d-flex flex-row">
            <div id="product-image">
                <img src="https://via.placeholder.com/900x600" alt="{{ $product['name'] }}">
            </div>

            <div id="product-info">
                <div id="product-header">
                    <h1>{{ $product['name'] }}</h2>
                    <h2>{{ $product['price'] }} $</h2>
                </div>

                <hr><br>

                <div id="product-description">
                    <?php
                        $category    = toTitle($product['category']['name']);
                        $subcategory = toTitle($product['subcategory']);
                        
                        if ($subcategory != $category && !empty($subcategory)) {
                            $category = $category . ' / ' . $subcategory;
                        }
                    ?>
                    <h5>{{ $product['description'] }}</h5>
                    <h6><b>Category:</b> {{ $category }}</h6>
                    <h6><b>Features:</b> {{ rtrim(str_replace('<p>', '', str_replace('</p>', ', ', $product['features'])), ', ') }}</h6>
                    <h6><b>Keywords:</b> {{ toTitle($product['keywords']) }}</h6>
                    <h6><b>Product Code:</b> {{ $product['code'] }}</h6>
                </div>
            </div>
        </div>  
    </div>
@endsection