@extends('layouts.app')

@section('title', 'Create Orders')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
        </div>
    </section>
    @include('layouts.partial.msg')

    <section class="content">
        <div class="container-fluid ">
            <div class="row ">
                <div class="col-md-12 d-flex justify-content-center">
                    <div class="card w-75 bg-white">
                        <div class="card-header border-0 "
                            style="font-size: 1.75rem;font-weight: 700;  margin-bottom: 0.5rem; text-align: center;color:#000;background:white;">
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
                                <div class="">
                                    <h3 style="font-weight:700;" class="text-center">Detail Order</h3>
                                    <div class="d-flex justify-content-evenly">
                                        <div class="col-lg-3 col-sm-3 col-md-3 col-xs-3">
                                            <div class="form-group label-floating">
                                                <label class="control-label">Product</label>
                                                <select class="form-control" name="product_id[]" id="product"
                                                    onblur="getPrice()" onblur="getId()"
                                                    value="{{ old('product_id') }}">
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
                                            <input type="text" class="form-control" name="quantity" id='quantity'
                                                onblur="getQuantity()" placeholder="Quantity" autocomplete="off"
                                                value="{{ old('quantity') }}">
                                        </div>
                                        <div class="bg-white">
                                            <label class="control-label">Price_Sale:</label>
                                            <div>
                                                <label class="control-label" id="price_sale"></label>
                                            </div>
                                        </div>
                                        <div>
                                            <div><label class="control-label">Subtotal:</label></div>
                                            <label class="control-label" id="subtotal"></label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center w-50 mx-auto">
                                        <div type="submit" id="add"
                                            class="rounded bg-danger text-white w-25 text-center"
                                            style="font-weight: 700;" onclick="addListProducts()">Add </div>
                                    </div>
                                    <div class=" mt-4  mx-auto rounded" style="background-color:#dae0f2;">
                                        <div class="d-flex justify-content-evenly mx-auto pt-2">
                                            <h6 style="font-weight:700;background-color:#ff98a2"
                                                class="text-center p-2 rounded">Product_Name</h6>
                                            <h6 style="font-weight:700;background-color:#ff98a2"
                                                class="text-center p-2 rounded">Quantity</h6>
                                            <h6 style="font-weight:700;background-color:#ff98a2"
                                                class="text-center p-2 rounded">Subtotal</h6>
                                            <h6 style="font-weight:700;background-color:#ff98a2"
                                                class="text-center p-2 rounded">Action</h6>
                                        </div>
                                        <div class="p-2">
                                            <ul class="w-100 text-center"
                                                style="list-style-type:none; word-spacing:180px;" id="dataList"></ul>
                                        </div>
                                        <div class=" d-flex justify-content-center rounded" style="background-color:#C2C6D5">
                                            <label for="" class="mr-2">Total:</label>
                                            <label for="" id="total"></label>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group label-floating">
                                    <label class="control-label">Registered By:<strong
                                            class="text-danger">(*)</strong></label>
                                    <input type="text" class="form-control" name="registeredby"
                                        value=" {{ Auth::user()->id}}">
                                </div>
                                <div class="form-group label-floating">
											<label class="control-label">Status:<strong
													class="text-danger">(*)</strong></label>
											<input type="text" class="form-control" name="status" value="1">
										</div>

                                <input type="hidden" class="form-control" name="status" value="1">
                                <input type="hidden" class="form-control" name="registeredby"
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
@push('scripts')
    <script>
        var price = 0;
        var selectProduct = 0;
        var selectedOption = 0;
        var quantity = 0;
        var subtotal = 0;
        function getPrice() {
            selectProduct = document.getElementById('product');
            selectedOption = selectProduct.options[selectProduct.selectedIndex];
            price = selectedOption.getAttribute('data-price');
            document.getElementById("price_sale").innerText = price;
        }
        function getQuantity() {
            quantity = parseFloat(document.getElementById("quantity").value);
            subtotal = quantity * parseFloat(price);
            document.getElementById('subtotal').innerText = subtotal;
        }
        var total = 0;
        function addListProducts() {
            var productName = selectedOption.textContent;
            let newData = document.createElement("li");
            newData.textContent = productName + " " + quantity + " " + subtotal;
            document.getElementById("dataList").appendChild(newData);
            var buttonDelete = document.createElement('button');
            buttonDelete.style.border = 'none';
            buttonDelete.style.marginLeft = '200px';
            buttonDelete.style.backgroundColor = '#FF1C2F';
            buttonDelete.style.marginTop = '4px';
            buttonDelete.textContent = "✘";
            buttonDelete.onclick = function () { newData.remove(); }
            newData.appendChild(buttonDelete);
            total = total + subtotal;
           document.getElementById('total').innerText=total;
        }
       
    </script>
@endpush