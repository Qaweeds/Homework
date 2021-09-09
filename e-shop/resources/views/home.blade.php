@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{__('Home page')}}</div>

                    <div class="col-md-12">
                        <div class="album py-5 bg-light">
                            <div class="container">
                                <div class="row">
                                    @each('products.parts.product_view', $products, 'product')
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="album py-5 bg-light">
                            <div class="container">
                                <div class="row d-flex justify-content-around align-items-center">
                                    @each('categories.parts.category_view', $categories, 'category')
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@endsection
