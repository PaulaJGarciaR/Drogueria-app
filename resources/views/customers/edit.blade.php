@extends('layouts.app')

@section('title','Edit Customers')

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
					<div class="card w-75 bg-white">
						<div class="card-header border-0" style="font-size: 1.75rem;font-weight: 700;  margin-bottom: 0.5rem; text-align: center;color:#3459FF;background:white;">
							@yield('title')
						</div>
						<div class="w-50 mx-auto">
							<div class="d-flex justify-content-center">
							<img src="https://res.cloudinary.com/dv8zlgkxm/image/upload/v1714876011/Esthyan_wuwlmi.png" alt=""  style="width:50%;" >
							</div>
						</div>
						<form method="POST" action="{{ route('customers.update',$customer)}}" enctype="multipart/form-data">
                            @csrf
							@method('PUT')
							<div class="card-body">
								<div class="row">
									<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label">Name<strong style="color:#3459FF;">(*)</strong></label>
											<input type="text" class="form-control" name="name" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ $customer->name }}">
										</div>
                                        <div class="form-group label-floating">
											 <label class="control-label">IdentificationDocument<strong style="color:#3459FF;">(*)</strong></label>
                                             <input type="text" class="form-control" name="identificationdocument" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ $customer->identificationdocument}}">  
										</div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Address<strong style="color:#3459FF;">(*)</strong></label>
											<input type="text" class="form-control" name="address" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ $customer->address }}">
										</div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Phone <strong style="color:#3459FF;">(*)</strong></label>
											<input type="text" class="form-control" name="phone" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{ $customer->phone }}">
										</div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Email<strong style="color:#3459FF;">(*)</strong></label>
											<input type="text" class="form-control" name="email" placeholder="Por ejemplo, Positiva" autocomplete="off" value="{{$customer->email}}">
										</div>
                                        <div class="form-group label-floating">
                                            <label class="control-label">Registered By:<strong style="color:#3459FF;">(*)</strong></label>
											<input type="text" class="form-control" name="registeredby" value=" {{ Auth::user()->id}}">
										</div>
                                        <div class="form-group label-floating">
											<label class="control-label">Image</label>
											@if ($customer->image != null)
                                                <p class="text-center"><img class="img-responsive img-thumbnail" src="{{ asset('uploads/customers/'.$customer->image) }}" style="height: 70px; width: 70px;" alt=""></p>
                                            @endif
											<input type="file" class="form-control-file" name="image" id="image"  value="{{ $customer->image }}">
										</div>
									</div>
								</div>
								<input type="hidden" class="form-control" name="registeredby">
							</div>
							<div class="card-footer">
								<div class="row d-flex justify-content-center">
									<div class="col-lg-2 col-xs-4">
										<button type="submit" class="btn btn-block btn-flat rounded" style="background-color: #7F96FF;font-weight: 700;color: black;">Register</button>
									</div>
									<div class="col-lg-2 col-xs-4">
										<a href="{{ route('customers.index') }}" class="btn btn-block btn-flat rounded" style=" background-color:#3459FF;border:none;font-weight: 700;color: black;">Back</a>
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