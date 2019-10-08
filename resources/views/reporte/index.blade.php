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
  <div class="col-md-4">
    <label for="inicio"> <b><i>Fecha Inicio</i></b> </label>
    {!! Form::date('inicio', null, ['class'=>'form-control', 'placeholder'=>'Fecha Inicio', 'id'=>'inicio']) !!}
  </div>
  <div class="col-md-4">
    <label for="fin" > <b><i>Fecha Fin</i></b> </label>
    {!! Form::date('fin', null, ['class'=>'form-control', 'placeholder'=>'Fecha Final', 'id'=>'fin']) !!}
  </div>
  <div class="col-md-4">
    <label for="fecha_fallecimiento"> <b><i>Fecha Fallecimiento</i></b> </label>
    {!! Form::date('fecha_fallecimiento', null, ['class'=>'form-control', 'placeholder'=>'Fecha Fallecimiento', 'id'=>'fecha_fallecimiento']) !!}
  </div>
</div>

<div class="row" style="padding-top:20px;">
  <div class="col-md-6" style="padding-top:10px;">
    <button type="submit" name="btn"  value="xls" class="btn btn-success btn-icon-text" accesskey="e"> <i class="ti-receipt menu-icon"></i> Reporte Generado en <u>E</u>XCEL</button>
  </div>
  <div class="col-md-6" style="padding-top:10px;">
    <button type="submit" name="btn"  value="doc" class="btn btn-primary btn-icon-text" accesskey="h"> <i class=" ti-html5 menu-icon"></i> Reporte Generado en <u>H</u>TML</button>
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
