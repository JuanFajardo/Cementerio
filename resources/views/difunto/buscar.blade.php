@extends('master')

@section('title') Registro de difuntos @endsection

@section('titulo')
  <h4> <i class="ti-search menu-icon"></i> Busqueda </h4>
 @endsection

@section('buscar')
 active
@endsection


@section('descripcion') Administracion de los proyectos @endsection

@section('boton')
  <a   href="#modalAgregar"   data-toggle="modal" class="nuevo btn btn-primary btn-icon-text btn-rounded" data-target="" accesskey="n"> <i class="ti-plus btn-icon-prepend"></i> <u>N</u>uevo </a>
@endsection


@section('cuerpo')

{!! Form::open(['accept-charset'=>'UTF-8', 'method'=>'POST', 'files'=>true, 'autocomplete'=>'off', 'id'=>'form-insert'] ) !!}
<div class="row">
  <div class="col-md-3">
    <label for="inicio"> <b><i>Nombre</i></b> </label>
    {!! Form::text('inicio', null, ['class'=>'form-control', 'placeholder'=>'Fecha Inicio', 'id'=>'inicio']) !!}
  </div>
  <div class="col-md-3">
    <label for="paterno" > <b><i>Ap. Paterno</i></b> </label>
    {!! Form::text('paterno', null, ['class'=>'form-control', 'placeholder'=>'Ap. Paterno', 'id'=>'paterno']) !!}
  </div>
  <div class="col-md-3">
    <label for="materno" > <b><i>Ap. Materno</i></b> </label>
    {!! Form::text('materno', null, ['class'=>'form-control', 'placeholder'=>'Ap. Materno', 'id'=>'materno']) !!}
  </div>
  <div class="col-md-3">
    <label for="fecha"> <b><i>Fecha Fallecimiento</i></b> </label>
    {!! Form::date('fecha', null, ['class'=>'form-control', 'placeholder'=>'Fecha Fallecimiento', 'id'=>'fecha']) !!}
  </div>
</div>

<div class="row" style="padding-top:20px;">
  <div class="col-md-6" style="padding-top:10px;">
    <button type="submit" name="btn"  value="xls" class="btn btn-success btn-icon-text" accesskey="e"> <i class="ti-receipt menu-icon"></i> Buscar </button>
  </div>
</div>
{!! Form::close() !!}

<div class="table-responsive" id="Buscar">
  <table id="tablaGamp" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
    <thead>
      <tr>
        <th>Inicial</th>
        <th>Sexo</th>
        <th>Edad</th>
        <th>Nombres</th>
        <th>Paterno</th>
        <th>Materno</th>
        <th>Esposo</th>
        <th>Fecha Defunsion</th>
        <th>Fecha Ingreso</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      @foreach($datos as $dato)
        <tr data-id="{{ $dato->id }}">
          <td>{{ $dato->inicial_nombre }}</td>
          <td>{{ $dato->sexo }}</td>
          <td>{{ $dato->edad }}</td>
          <td>{{ $dato->nombre }} </td>
          <td>{{ $dato->paterno }} </td>
          <td>{{ $dato->materno }} </td>
          <td>{{ $dato->esposo }} </td>
          <td>{{ $dato->fecha_fallecimiento }}</td>
          <td>{{ $dato->fecha_registro }}</td>
          <td>
            <a href="#modalModifiar"  data-toggle="modal" data-target="" class="actualizar" style="color: #B8823B;"> <i class="ti-pencil menu-icon"></i>Editar</a>
            <a href="#"  data-toggle="modal" data-target="" style="color: #ff0000;" class="eliminar"> <i class="ti-trash menu-icon"></i>Eliminar</a>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
{!! Form::open(['route'=>['Difunto.destroy', ':DATO_ID'], 'method'=>'DELETE', 'id'=>'form-delete']) !!}
{!! Form::close() !!}
@endsection

@section('js')
<script type="text/javascript">
  $(document).ready(function(){
    $('#tablaGamp').DataTable({
      "order": [[ 1, 'asc']],
      "language": {
        "bDeferRender": true,
        "sEmtpyTable": "No ay registros",
        "decimal": ",",
        "thousands": ".",
        "lengthMenu": "Mostrar _MENU_ datos por registros",
        "zeroRecords": "No se encontro nada,  lo siento",
        "info": "Mostrar paginas [_PAGE_] de [_PAGES_]",
        "infoEmpty": "No ay entradas permitidas",
        "search": "Buscar ",
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

  $('#nacionalidad_').change(function(){
    var pais = $('#nacionalidad_').val();
    var options = $("#departamento_");
    options.empty();
    var link = '{{asset("index.php/Extra/Pais/")}}/'+pais;
    $.getJSON(link, function(data, textStatus) {
      if(data.length > 0){
        $.each(data, function(index, el) {
          options.append($("<option />").val(el.id).text(el.departamento));
        });
      }
    });
  });
  $('#departamento_').change(function(){
    var departamento = $('#departamento_').val();
    var options = $("#provincia_");
    options.empty();
    var link = '{{asset("index.php/Extra/Departamento/")}}/'+departamento;
    $.getJSON(link, function(data, textStatus) {
      if(data.length > 0){
        $.each(data, function(index, el) {
          options.append($("<option />").val(el.id).text(el.provincia));
        });
      }
    });
  });
  $('#provincia_').change(function(){
    var provincia = $('#provincia_').val();
    var options = $("#localidad_");
    options.empty();
    var link = '{{asset("index.php/Extra/Provincia/")}}/'+provincia;
    $.getJSON(link, function(data, textStatus) {
      if(data.length > 0){
        $.each(data, function(index, el) {
          options.append($("<option />").val(el.id).text(el.localidad));
        });
      }
    });
  });

  $('#nacionalidad').change(function(){
    var pais = $('#nacionalidad').val();
    var options = $("#departamento");
    options.empty();
    var link = '{{asset("index.php/Extra/Pais/")}}/'+pais;
    $.getJSON(link, function(data, textStatus) {
      if(data.length > 0){
        $.each(data, function(index, el) {
          options.append($("<option />").val(el.id).text(el.departamento));
        });
      }
    });
  });
  $('#departamento').change(function(){
    var departamento = $('#departamento').val();
    var options = $("#provincia");
    options.empty();
    var link = '{{asset("index.php/Extra/Departamento/")}}/'+departamento;
    $.getJSON(link, function(data, textStatus) {
      if(data.length > 0){
        $.each(data, function(index, el) {
          options.append($("<option />").val(el.id).text(el.provincia));
        });
      }
    });
  });
  $('#provincia').change(function(){
    var provincia = $('#provincia').val();
    var options = $("#localidad");
    options.empty();
    var link = '{{asset("index.php/Extra/Provincia/")}}/'+provincia;
    $.getJSON(link, function(data, textStatus) {
      if(data.length > 0){
        $.each(data, function(index, el) {
          options.append($("<option />").val(el.id).text(el.localidad));
        });
      }
    });
  });


  $('#nombre_').blur(function(){
    var nombre = $('#nombre_').val();
    $('#inicial_nombre_').val( nombre[0] );
  });

  $('#nombre').blur(function(){
    var nombre = $('#nombre').val();
    $('#inicial_nombre').val( nombre[0] );
  });

  $('.actualizar').click(function(event){
    event.preventDefault();
    var fila = $(this).parents('tr');
    var id = fila.data('id');
    var form = $('#form-update')
    var url = form.attr('action').replace(':DATO_ID', id);
    form.get(0).setAttribute('action', url);
    link  = '{{ asset("/index.php/Difunto/")}}/'+id;
    $.getJSON(link, function(data, textStatus) {
      if(data.length > 0){
        $.each(data, function(index, el) {

          $('#registro_civil').val(el.registro_civil);
          $('#boleta_entierro').val(el.boleta_entierro);
          $('#certificado_defuncion').val(el.certificado_defuncion);
          $('#nombre').val(el.nombre);
          $('#paterno').val(el.paterno);
          $('#materno').val(el.materno);
          $('#esposo').val(el.esposo);
          $('#inicial_nombre').val(el.inicial_nombre);
          $('#fecha_nacimiento').val(el.fecha_nacimiento);
          $('#fecha_fallecimiento').val(el.fecha_fallecimiento);
          $('#hora_fallecimiento').val(el.hora_fallecimiento);
          $('#diagnostico').val(el.diagnostico);
          $('#medico').val(el.medico);
          $('#edad').val(el.edad);
          $('#sexo').val(el.sexo);
          $('#estado_civil').val(el.estado_civil);
          $('#religion').val(el.religion);
          $('#profesion').val(el.profesion);
          $('#lugar_procedencia').val(el.lugar_procedencia);
          $('#hijo').val(el.hijo);
          $('#padre').val(el.padre);
          $('#madre').val(el.madre);
          $('#conyuge').val(el.conyuge);
          $('#senas_particulares').val(el.senas_particulares);
          $('#ultimo_domicilio').val(el.ultimo_domicilio);
          $('#direccion').val(el.direccion);
          $('#fecha_registro').val(el.fecha_registro);
          $('#nacionalidad').val(el.nacionalidad);
          $('#departamento').val(el.departamento);
          $('#provincia').val(el.provincia);
          $('#localidad').val(el.localidad);
          $('#libro').val(el.libro);
          $('#folio').val(el.folio);
          $('#partida').val(el.partida);
          $('#distrito').val(el.distrito);

          $('#imagen').attr('src', '{{asset("/b6cda5b804a986866d768637dcf0c69b/")}}/'+el.imagen);


        });
      }
    });
  });

  $('.eliminar').click(function(event) {
    event.preventDefault();
    var fila = $(this).parents('tr');
    var id = fila.data('id');
    var form = $('#form-delete');
    var url = form.attr('action').replace(':DATO_ID',id);
    var data = form.serialize();
    if(confirm('Esta seguro de eliminar los datos')){
      $.post(url, data, function(result, textStatus, xhr) {
        alert(result);
        fila.fadeOut();
      }).fail(function(esp){
        fila.show();
      });
    }
  });
</script>
@endsection
