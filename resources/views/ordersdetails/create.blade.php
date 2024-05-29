@extends('layouts.app')

@section('title', 'Order Details')

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

						<form method="POST" action="{{ route('orders.store') }}" enctype="multipart/form-data"
							class="bg-white">
							@csrf

							<div class="">
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
                                            <label class="control-label" id="subtotal" value="{{old('subtotal)}}"></label>
                                        </div>
                                        <div>
                                            <div><label class="control-label">Total:</label></div>
                                            <label class="control-label" id="total" value="{{old('total_payment')}}"></label>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center w-50 mx-auto">
                                        <div type="submit" id="add"
                                            class="rounded bg-danger text-white w-25 text-center"
                                            style="font-weight: 700;" onclick="addListProducts()">Add </div>
                                    </div>
							<div class="card-footer">
								<div class="row d-flex justify-content-center">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-block btn-flat rounded bg-danger "
											style="font-weight: 700;">Register</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('products.index') }}"
											class="btn btn-danger btn-block btn-flat rounded"
											style="border:none;font-weight: 700;color: black;background:#ff98a2;">Back</a>
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
            
            total = total + subtotal;
           document.getElementById('total').innerText=total;
        }
       
    </script>
@endpush