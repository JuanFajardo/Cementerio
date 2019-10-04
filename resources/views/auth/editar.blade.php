@extends('master')

@section('title') Usuarios @endsection

@section('titulo')
  <h4> <i class="ti-user menu-icon"></i> Usuarios  - Editar</h4>
 @endsection

@section('usuario')
 active
@endsection

@section('boton')
  <a   href="{{url('Usuario')}}"  class="nuevo btn btn-primary btn-icon-text btn-rounded"  accesskey="n"> <i class="ti-plus btn-icon-prepend"></i> I<u>n</u>inicio </a>
@endsection

@section('cuerpo')

                {!! Form::model($user, ['action'=>['UsuarioController@update', $user->id], 'method'=>'PATCH', 'id'=>'form-create', 'class'=>'form-horizontal', 'role'=>'form', 'autocomplete'=>'off'  ])!!}
                  <h4>Datos de usuario</h4>
                  <hr>

                    {!! Form::hidden('id', null, ['id'=>'id', 'class'=>'form-control']) !!}

                  


                  <div class="row">
                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-12 col-xl-6">
                        <label for="name" class="col-md-4 control-label">Usuario</label>
                        {!! Form::text('name',  old('name'), ['id'=>'name', 'class'=>'form-control', 'placeholder'=>'nombreapellido']) !!}
                        @if ($errors->has('name'))
                          <span class="help-block">{{ $errors->first('name') }}</span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-12 col-xl-6">
                        <label for="email" class="col-md-4 control-label">Nombre Completo</label>
                        {!! Form::text('email',  old('email'), ['id'=>'email', 'class'=>'form-control', 'placeholder'=>'correo@correo.com']) !!}
                        @if ($errors->has('email'))
                          <span class="help-block">{{ $errors->first('email') }}</span>
                        @endif
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-12 col-xl-6">
                      <label for="password" class="col-md-4 control-label">Contraseña</label>
                      {!! Form::password('password', ['id'=>'password', 'class'=>'form-control', 'placeholder'=>'Clave s3cr3t4']) !!}
                      @if ($errors->has('password'))
                        <span class="help-block">{{ $errors->first('password') }}</span>
                      @endif
                    </div>
                    <div class="form-group col-md-12 col-xl-6">
                        <label for="grupo" class="col-md-4 control-label">Grupo</label>
                        {!! Form::select('grupo', ['Administrador'=>'Administrador', 'Encargado'=>'Encargado', 'Usuario'=>'Usuario'], null, ['id'=>'grupo', 'class'=>'form-control']) !!}
                    </div>
                  </div>


                  <div class="row">
                    <div class="col-md-6 col-xl-6">
                      <button type="submit" class="btn btn-warning btn-icon-text ">
                        <i class="ti-pencil-alt menu-icon"></i> Actualizar
                      </button>
                    </div>
                    <div class="col-md-6 col-xl-6">
                      <a href="{{asset('/index.php/Usuario')}}" class="btn btn-primary btn-icon-text">
                        <i class="ti-close menu-icon"></i> Cancelar</a>
                    </div>
                  </div>
          {!! Form::close() !!}
@endsection


@section('js')
  <script type="text/javascript">

  function cerrar(id){

    link  = '{{ asset("/index.php/Encargado/Eliminar/")}}/'+id;
    var salud = $("#encargado"+id);
    salud.fadeOut();
    $.getJSON(link, function(data, textStatus) {
    });

  }

    $('#agregar').click(function(event){
      event.preventDefault();
      var centro_salud = $('#salud').val();
      var id = $('#id').val();
      var centrosSalud = $('#centrosSalud').html("");
      var html = "";
      link  = '{{ asset("/index.php/Encargado/Agregar/")}}/'+centro_salud+"|"+id;
      $.getJSON(link, function(data, textStatus) {
        if(data.length > 0){

          $.each(data, function(index, el) {
            if(!el.error){
              console.log(el.id+" "+ el.centro_salud)
              html = html + '<p class="badge badge-danger" id="encargado'+el.id+'">  '+el.centro_salud+'   <b onclick="cerrar(\''+el.id+'\')" style="color:white;"><i class="ti-close menu-icon"></i> </b> </p>';
              centrosSalud.html(html);
            }
          });
        }
      });
    });
  </script>
@endsection
