@extends('layouts.app')

@section('title','Edit Products')

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
				<div class="col-md-12">
					<div class="card">
						<div class="card-header bg-secondary">
							<h3>@yield('title')</h3>
						</div>
						<form method="POST" action="{{ route('products.update',$product) }}">
                            @csrf
							@method('PUT')
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Name<strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="name" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ $product->name }}">
										</div>
                                        <div class="form-group label-floating">
											 <label class="control-label">Description<strong style="color:red;">(*)</strong></label>
                                             <input type="text" class="form-control" name="description" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ $product->description }}">
                                        <div style="display:flex;justify-content: center;">
                                            
										</div>
                                        <div class="form-group label-floating">
                                        <label class="control-label">Price_Buy <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="price_buy" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ $product->price_buy }}">
										</div>
                                        <div class="form-group label-floating">
                                        <label class="control-label">Price_Sale <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="price_sale" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ $product->price_sale }}">
										</div>
                                        <div class="form-group label-floating">
                                        <label class="control-label">Quantity_in_stock<strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="quantity_in_stock" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{$product->quantity_in_stock }}">
										</div>
                                        <div class="form-group label-floating">
                                        <label class="control-label">Expiration_date<strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="expiration_date" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ $product->expiration_date }}">
										</div>
                                        <div class="form-group label-floating">
                                        <label class="control-label">Registered By:<strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="registradopor" value=" {{ Auth::user()->id}}">
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Imagen</label>
											<input type="file" class="form-control-file" name="image" id="image" >
										</div>
									</div>
								</div>
								<input type="hidden" class="form-control" name="registeredby">
							</div>
							<div class="card-footer">
								<div class="row">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-primary btn-block btn-flat">Registrar</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('products.index') }}" class="btn btn-danger btn-block btn-flat">Atras</a>
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