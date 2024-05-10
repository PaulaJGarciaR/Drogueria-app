

@extends('layouts.app')

@section('title','Create Products')

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
					    <div class="card-header border-0 " style="font-size: 1.75rem;font-weight: 700;  margin-bottom: 0.5rem; text-align: center;color:#3459FF;background:white;">
							@yield('title')
					    </div>
						<div class="w-50 mx-auto">
							<div class="d-flex justify-content-center">
							<img src="https://res.cloudinary.com/dv8zlgkxm/image/upload/v1714876011/Esthyan_wuwlmi.png" alt=""  style="width:50%;" >
							</div>
						</div>
						
						<form method="POST" action="{{ route('sales.store') }}" enctype="multipart/form-data" class="bg-white">
							@csrf
                            <div class="card-body">
                        <div class="row">
                            <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
										<div class="form-group label-floating">
											<label class="control-label" for="selectcustomer">Customer<strong style="color:red;">(*)</strong></label>
											<select class="form-control" name="customer" id="customer">
												<option value>Selection Customer</option>
												@foreach($customers as $customer)
													<option value="{{ $customer->id }}">{{ $customer->name }}</option>
												@endforeach
											</select>
										</div>
									</div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
								<div class="form-group label-floating">
									<label class="control-label">Fecha de Venta<strong style="color:red;">(*)</strong></label>
									<input type="date" class="form-control" name="fechaventa" placeholder="YYYY-MM-DD" autocomplete="off" value="<?php echo date('Y-m-d');?>">
								</div>
							</div>
                        </form>

@push('scripts')
<script type="text/javascript">
	$("#formapago").select2({
		allowClear: true
	});
</script>
<script type="text/javascript">
	$.fn.datepicker.dates['es'] = {
		days: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
		daysShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
		daysMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
		months: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
		monthsShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
		format: "yyyy-mm-dd"
	};
	$('#fecha').datepicker({
		language: 'es'
	});
</script>


                            