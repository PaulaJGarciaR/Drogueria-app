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
                                <div class="d-flex justify-content-center">
                                    <h3 style="font-weight:700;" class="text-center align-items-center d-flex">Detail Order</h3>
                                    <div class="card-header border-0 bg-white" style="font-size: 1.75rem;font-weight: 700; text-align: center; color:#000;">
							         <a  href="{{ route('ordersdetails.create') }}" class="btn btn-primary  bg-danger" title="Nuevo" style=" border: none;"><i class="fas fa-plus nav-icon text-white"></i></a>
						             </div>
                            </div>
                                
                        <div class="card-body">
							<table id="example1" class="table table-bordered table-hover">
								<thead class="text-primary">
									<tr>
										<th>ID</th>
										<th>Product Name</th>
										<th>Quantity</th>
                                        <th>SubTotal</th>
                                        <th>Action</th>
									</tr>
								</thead>
								<tbody>
                                   @foreach ($ordersdetails as $orderdetail)
										<tr>
											<td>{{$orderdetail->id}}</td>
                                            <td>{{$orderdetail->product_id}}</td>
                                            <td>{{$orderdetail->quantity}}</td>
                                            <td>{{$orderdetail->subtotal}}</td>
											<td>
											        <form class="d-inline delete-form"
                                                        action="" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class=" btn btn-danger btn-sm"
                                                            title="Delete">
                                                            <i class="fas fa-trash-alt"></i>
                                                        </button>
                                                    </form>
											</td>
                                      </tr>
                                      @endforeach
								</tbody>
							</table> 
						
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
            
            total = total + subtotal;
           document.getElementById('total').innerText=total;
        }
       
    </script>
@endpush