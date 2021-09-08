@extends('_layouts.main')


@section('heading')
    {{ $product['name'] }}
    <a href="/products/index_vue" class="btn btn-primary">Back</a>
@endsection


@section('content')
    <div>
        <div id="product-page" class="d-flex flex-row">
            <?php
                $prodname = $product['name'];
                $prodprce = $product['price'];

                $category_id = $product['category']['id'];
                $category    = toTitle($product['category']['name']);
                $subcategory = toTitle($product['subcategory']);
                
                if ($subcategory != $category && !empty($subcategory)) {
                    $category = $category . ' / ' . $subcategory;
                }

                $features = rtrim(str_replace('<p>', '', str_replace('</p>', ', ', $product['features'])), ', ');
                $keywords = toTitle($product['keywords']);
                $prodcode = $product['code'];
            ?>

            <div id="product-image">
                <img src="https://via.placeholder.com/900x600" alt="{{ $prodname }}">
            </div>

            <div id="product-info">
                <div id="product-header">
                    <h1>{{ $prodname }}</h1>
                    <h2>{{ $prodprce }} $</h2>
                </div>

                <hr><br>

                <div id="product-description">
                    <h5>{{ $product['description'] }}</h5>
                    <p><b>Category:</b> <a href="/api/categories/{{ $category_id }}">{{ $category }}</a></p>
                    <p><b>Features:</b> {{ $features }}</p>
                    <p><b>Keywords:</b> {{ $keywords }}</p>
                    <p><b>Product Code:</b> {{ $prodcode }}</p>
                </div>
            </div>
        </div>  
    </div>
@endsection