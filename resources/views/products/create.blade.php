@extends('layouts.app')

@section('title','Crear Productos')

@section('content')

<div class="content-wrapper">
    <section class="content-header">
		<div class="container-fluid">
		</div>
    </section>
	<section class="content">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12">
					<div class="card">
						<div class="card-header bg-secondary">
							<h3>@yield('title')</h3>
						</div>
						<form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
							@csrf
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                        <div class="form-group label-floating">
											<label class="control-label">Id<strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="id" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ old('id') }}">
										</div>
										<div class="form-group label-floating">
											<label class="control-label">Name <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="name" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ old('name') }}">
										</div>
                                        <label class="control-label">Description<strong style="color:red;">(*)</strong></label>
                                        <div style="display:flex;justify-content: center;">
                                            <textarea name="description" rows="4" cols="190" value="{{ old('description') }}">
                                           </textarea>
                                          </div>
                                          <div class="form-group label-floating">
											<label class="control-label">Price_Buy <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="price_buy" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ old('price_buy') }}">
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Price_Sale <strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="price_sale" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ old('price_sale') }}">
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Quantity_in_stock<strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="quantity_in_stock" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ old('quantity_in_stock') }}">
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Quantity_in_stock<strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="quantity_in_stock" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ old('quantity_in_stock') }}">
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Expiration_date<strong style="color:red;">(*)</strong></label>
											<input type="text" class="form-control" name="expiration_date" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ old('expiration_date') }}">
										</div>

                                        <div class="row">
									<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Fotografía</label>
											<input type="file" class="form-control-file" name="image" id="image" >
										</div>
									</div>
								</div>
                                        
									</div>
								</div>
								<input type="hidden" class="form-control" name="estado" value="1">
								<input type="hidden" class="form-control" name="registradopor" value="{{ Auth::user()->id }}">
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
