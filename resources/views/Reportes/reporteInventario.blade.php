
@include('Menus.admin')


<!-- <form role="form" name="form" method="post" action="{{ url('/Reportes/reporteInventario/') }}"> -->
  <link rel = "stylesheet" href = "{{ asset('css/reporteTabla.css') }}"/>
<link rel = "stylesheet" href = "{{ asset('css/botones.css') }}">
{!! csrf_field() !!}


<section class="contenido">

<!DOCTYPE html>
<html>
 <head>
  <title>reporte del inventario</title>
<!--   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" /> -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Reporte Consumibles</h3><br />
   
   <div class="row">
    <div class="col-md-7" align="Center">
     <h4>Datos del Invetario</h4>
    </div>
    <div class="col-md-5" align="right">
   <!--  <button> <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger">Convertir a PDF</a></button> -->
    <button class="boton" onclick="location.href='{{ url('/dynamic_pdf/pdf') }}'">convertir a PDF</button>

    </div>
    <div class="col-md-5" align="center">
    <!--  <a href="{{ url('/Reportes/reporteInventario/Impresoras') }}" class="btn btn-danger">
     Impresoras</a> -->
     <button class="boton" onclick="location.href='{{ url('/Reportes/reporteInventario/Impresoras') }}'">Impresoras</button>

    </div>
   </div>
   <br />
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
     <thead>
      <tr>
       <th>Nombre</th>
       <th>Descripcion</th>
       <th>Existencias</th>
       <th>Precio</th>
       <th>Costo</th>
       <th>Fecha de Creacion</th>
      </tr>
     </thead>
     <tbody>
     @foreach($inventory_data as $inventory)
      <tr>
       <td>{{ $inventory->nombre }}</td>
       <td>{{ $inventory->descripcion }}</td>
       <td>{{ $inventory->existencias }}</td>
       <td>{{ $inventory->precio }}</td>
       <td>{{ $inventory->costo }}</td>
       <td>{{ $inventory->FechaCreacion }}</td>
      </tr>
     @endforeach
     </tbody>
    </table>
   </div>
  </div>
</section>
 </body>
</html>