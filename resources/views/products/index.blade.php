@extends('layouts.app')
@section('content')
<div class="wrapper mt-4">
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!-- Main content -->
    <section class="content ">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card bg-white">
              <div class="card-header border-0 bg-white mt-2">
                <h4 class=" m-0 text-center justify-content-center text-purple "><b>Product List</b></h4>
              </div>
              <!-- /.card-header -->
              <div class="card-body bg-white">
                <table id="example2" class="table table-hover rounded">
                  <thead>
                  <tr class="">
                    <th style="border-color:#6c757d;background:#d4bbfc">Id</th>
                    <th style="border-color:#6c757d;background:#d4bbfc">Name</th>
                    <th style="border-color:#6c757d;background:#d4bbfc">Description</th>
                    <th style="border-color:#6c757d;background:#d4bbfc">Price_buy</th>
                    <th style="border-color:#6c757d;background:#d4bbfc">Price_sale</th>
                    <th style="border-color:#6c757d;background:#d4bbfc">Quantity_in_stock</th>
                    <th style="border-color:#6c757d;background:#d4bbfc">Expiration_Date</th>
                    <th style="border-color:#6c757d;background:#d4bbfc">Photo</th>
                    <th style="border-color:#6c757d;background:#d4bbfc">Action</th>
                  </tr>
                  </thead>
                <tbody>
                  @foreach($products as $product)
                  <tr>
                  <td style="background:#f2ebfb;"><b>{{$product->id}}</b></td>
                    <td class=" border-0 border-bottom border-2" style="border-color:#6c757d;">{{$product->name}}</td>
                    <td class=" border-0 border-bottom border-2" style="border-color:#6c757d;">{{$product->description}}</td>
                    <td class=" border-0 border-bottom border-2" style="border-color:#6c757d;">{{$product->price_buy}}</td>
                    <td class=" border-0 border-bottom border-2" style="border-color:#6c757d;">{{$product->price_sale}}</td>
                    <td class=" border-0 border-bottom border-2" style="border-color:#6c757d;">{{$product->quantity_in_stock}}</td>
                    <td class=" border-0 border-bottom border-2" style="border-color:#6c757d;">{{$product->expiration_date}}</td>
                    <td class=" border-0 border-bottom border-2" style="border-color:#6c757d;" >{{$product->photo}}</td>
                    <td class=" border-0 border-bottom border-2" style="border-color:#6c757d;">
                       <a href="{{route('products.edit', $product->id)}}" class="btn btn-info btn-sm" title="Editar"><i class="fas fa-pencil-alt"></i></a>

                       <form class="d-inline delete-form" action="{{route('products.destroy', $product)}}" method="POST">
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                       </form>
                    </td>
                  </tr>
                  
                  @endforeach
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
</div>
@endsection
@push('script')
<script type="text/javascript">
		$(function () {
			$("#example1").DataTable({
				"responsive": true, 
				"lengthChange": true, 
				"autoWidth": false,
				//"buttons": ["excel", "pdf", "print", "colvis"],
				"language": 
						{
							"sLengthMenu": "Mostrar MENU entradas",
							"sEmptyTable": "No hay datos disponibles en la tabla",
							"sInfo": "Mostrando START a END de TOTAL entradas",
							"sInfoEmpty": "Mostrando 0 a 0 de 0 entradas",
							"sSearch": "Buscar:",
							"sZeroRecords": "No se encontraron registros coincidentes en la tabla",
							"sInfoFiltered": "(Filtrado de MAX entradas totales)",
							"oPaginate": {
								"sFirst": "Primero",
								"sPrevious": "Anterior",
								"sNext": "Siguiente",
								"sLast": "Ultimo"
							},
							/*"buttons": {
								"print": "Imprimir",
								"colvis": "Visibilidad Columnas"
								/*"create": "Nuevo",
								"edit": "Cambiar",
								"remove": "Borrar",
								"copy": "Copiar",
								"csv": "fichero CSV",
								"excel": "tabla Excel",
								"pdf": "documento PDF",
								"collection": "Colección",
								"upload": "Seleccione fichero...."
							}*/
						}
			});//.buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
		});
	</script>
@endpush