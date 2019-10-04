@extends('master')

@section('title') Reporte @endsection

@section('titulo')
  <h4> <i class="ti-bookmark-alt menu-icon"></i> Reporte</h4>
 @endsection

@section('reporte')
 active
@endsection


@section('cuerpo')
{!! Form::open(['accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data', 'method'=>'POST', 'files'=>true, 'autocomplete'=>'off', 'id'=>'form-insert'] ) !!}

<div class="row">
  <div class="col-md-3">
    <label for="inicio" > <b><i>Fecha Inicio</i></b> </label>
    {!! Form::date('inicio', null, ['class'=>'form-control', 'placeholder'=>'Fecha Inicio', 'id'=>'inicio', 'required']) !!}
  </div>
  <div class="col-md-3">
    <label for="fin" > <b><i>Fecha Fin</i></b> </label>
    {!! Form::date('fin', null, ['class'=>'form-control', 'placeholder'=>'Fecha Final', 'id'=>'fin', 'required']) !!}
  </div>
  <div class="col-md-3">
    <label for="salud" > <b><i>Centro de Salud</i></b> </label>
    {!! Form::select('salud', [], null, ['class'=>'form-control', 'placeholder'=>'todo', 'id'=>'salud']) !!}
  </div>
  <div class="col-md-3">
    <label for="usuario" > <b><i>Usuario</i></b> </label>
    {!! Form::select('usuario', $usuarios, null, ['class'=>'form-control', 'placeholder'=>'todo', 'id'=>'usuario']) !!}
  </div>

</div>

<div class="row" style="padding-top:20px;">
  <div class="col-md-4" style="padding-top:10px;">
    <button type="submit" name="btn" value="pdf" class="btn btn-danger btn-icon-text"> <i class="ti-agenda menu-icon"></i> Reporte Generado en PDF</button>
  </div>
  <div class="col-md-4" style="padding-top:10px;">
    <button type="submit" name="btn"  value="xls" class="btn btn-success btn-icon-text"> <i class="ti-receipt menu-icon"></i> Reporte Generado en EXCEL</button>
  </div>
  <div class="col-md-4" style="padding-top:10px;">
    <button type="submit" name="btn"  value="doc" class="btn btn-primary btn-icon-text"> <i class=" ti-html5 menu-icon"></i> Reporte Generado en HTML</button>
  </div>
</div>
{!! Form::close() !!}


@endsection

@section('js')
<script type="text/javascript">
  $(document).ready(function(){
    $('#tablaGamp').DataTable({
      "order": [[ 0, 'asc']],
      "language": {
        "bDeferRender": true,
        "sEmtpyTable": "No ay registros",
        "decimal": ",",
        "thousands": ".",
        "lengthMenu": "Mostrar _MENU_ datos por registros",
        "zeroRecords": "No se encontro nada,  lo siento",
        "info": "Mostrar paginas [_PAGE_] de [_PAGES_]",
        "infoEmpty": "No ay entradas permitidas",
        "search": "Busqueda Especifica ",
        "infoFiltered": "(Busqueda de _MAX_ registros en total)",
        "oPaginate":{
          "sLast":"Final",
          "sFirst":"Principio",
          "sNext":"Siguiente",
          "sPrevious":"Anterior"
        }
      }
    });
  });
</script>
@endsection
