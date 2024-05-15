@extends('layouts.app')

@section('title', 'Add order')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        </div>
    </section>
    @include('layouts.partial.msg')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="card w-75 bg-white mx-0">
                        <div class="card-header border-0 "
                            style="font-size: 1.75rem;font-weight: 700;  margin-bottom: 0.5rem; text-align: center;background:white;">
                            @yield('title')
                        </div>
                        <div class="w-50 mx-auto">
                            <div class="d-flex justify-content-center">
                                <img src="https://res.cloudinary.com/depwl0l0w/image/upload/v1715459231/Logo_tryic6.png"
                                    alt="" style="width:50%;">
                            </div>
                        </div>
                        <form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body" id="form-fields">
                                <div class="row d-flex">
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-6">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Customer<strong
                                                    style="color:red;">(*)</strong></label>
                                            <select type="text" class="form-control" name="customer"
                                                value="{{ old('customer') }}">
                                                <option value="">Name Customer</option>
                                                @foreach ($customers as $customer)
                                                    <option value="{{ $customer->id }}">
                                                        {{$customer->name}}
                                                    </option>

                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                        <div class="form-group label-floating">
                                            <label class="control-label">Date Order<strong
                                                    style="color:red;">(*)</strong></label>
                                            <input type="date" class="form-control" name="date" placeholder="YYYY-MM-DD"
                                                autocomplete="off" value="{{old('date_of_sale')}}">
                                        </div>
                                    </div>
                                </div>
                                <div class="bg-primary">
                                    <h3 style="font-weight:700;" class="text-center">Detail Order</h3>
                                    <div class="d-flex justify-content-evenly">
                                        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Product</label>
                                                <select type="text" class="form-control" name="product" id="product"
                                                    onblur="getPrice()" value="{{ old('product') }}">
                                                    <option value="">Name Product</option>
                                                    @foreach ($products as $product)
                                                        <option value="{{ $product->id }}"
                                                            data-price="{{$product->price_sale}}">
                                                            {{$product->name}}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="control-label">Quantity:</label>
                                            <input type="text" class="form-control" name="quantity" 
                                                placeholder="Quantity" autocomplete="off" value="{{ old('quantity') }}">
                                        </div>
                                        <div class="bg-white">
                                            <label class="control-label">Price_Sale:</label>
                                            <div>
                                                <label class="control-label" id="price_sale"></label>
                                            </div>
                                        </div>
                                        <div>
                                            <label class="control-label">Subtotal:</label>
                                            <input type="text" class="form-control" name="subtotal"
                                                placeholder="subtotal" autocomplete="off" value="{{ old('subtotal') }}">
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center w-50 mx-auto">
                                        <button type="submit"
                                            class="btn  btn-block btn-flat rounded bg-danger text-black w-25"
                                            style="font-weight: 700;">Add </button>
                                    </div>
                                </div>
                                <div class="form-group label-floating">
											<label class="control-label">Registered By:<strong
													class="text-danger">(*)</strong></label>
											<input type="text" class="form-control" name="registeredby"
												value=" {{ Auth::user()->id}}">
										</div>

                                <input type="hidden" class="form-control" name="estado" value="1">
                                <input type="hidden" class="form-control" name="registradopor"
                                    value="{{ Auth::user()->id }}">

                            </div>
                            <div class="card-footer">
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-2 col-xs-4">
                                        <button type="submit"
                                            class="btn  btn-block btn-flat rounded bg-danger text-black"
                                            style="font-weight: 700;">Register </button>
                                    </div>
                                    <div class="col-lg-2 col-xs-4">
                                        <a href="{{ route('orders.index') }}"
                                            class="btn btn-danger btn-block btn-flat rounded"
                                            style=" background-color:#ff98a2;border:none;font-weight: 700;color: black;">Back</a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


@endsection
<script>

    function getPrice() {
        var selectProduct = document.getElementById('product');
        var selectedOption = selectProduct.options[selectProduct.selectedIndex];
        var price = selectedOption.getAttribute('data-price');
        document.getElementById("price_sale").innerText = price;

    }

</script>