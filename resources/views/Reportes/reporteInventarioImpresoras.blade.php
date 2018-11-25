@include('Menus.admin')


<form role="form" name="form" method="post" action="{{ url('/Reportes/reporteInventrio/Impresoras/') }}">
{!! csrf_field() !!}


<section class="contenido">

<!DOCTYPE html>
<html>
 <head>
  <title>reporte del inventario</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
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
   <h3 align="center">Prueba del reporte inventario</h3><br />
   
   <div class="row">
    <div class="col-md-7" align="right">
     <h4>Invetory Data</h4>
    </div>
    <div class="col-md-5" align="right">
     <a href="{{ url('dynamic_pdf2/pdf2') }}" class="btn btn-danger">Convert into PDF</a>
    </div>
    <div class="col-md-5" align="left">
     <a href="{{ url('/Reportes/reporteInventrio/') }}" class="btn btn-danger">consumibles</a>
    </div>
   </div>
   <br />
   <div class="table-responsive">
    <table class="table table-striped table-bordered">
     <thead>
      <tr>
       <th>Modelo</th>
       <th>Marca</th>
       <th>Existencias</th>
       <th>Precio</th>
       <th>Costo</th>
        <th>Precio de Renta</th>
       <th>Fecha de Compra</th>
      </tr>
     </thead>
     <tbody>
     @foreach($inventory_data as $inventory)
      <tr>
       <td>{{ $inventory->modelo }}</td>
       <td>{{ $inventory->marca }}</td>
       <td>{{ $inventory->existencias }}</td>
       <td>{{ $inventory->precio }}</td>
       <td>{{ $inventory->costo }}</td>
       <td>{{ $inventory->precioRenta }}</td>
       <td>{{ $inventory->FechaCompra }}</td>
      </tr>
     @endforeach
     </tbody>
    </table>
   </div>
  </div>
</section>
 </body>
</html>