@extends('master')

@section('title') Usuarios @endsection

@section('titulo')
  <h4> <i class="ti-user menu-icon"></i> Usuarios </h4>
 @endsection

@section('usuario')
 active
@endsection

@section('boton')
  <a   href="{{url('Usuario')}}"  class="nuevo btn btn-primary btn-icon-text btn-rounded"  accesskey="n"> <i class="ti-plus btn-icon-prepend"></i> I<u>n</u>inicio </a>
@endsection


@section('cuerpo')

                    <form class="form-horizontal" method="POST" action="{{ route('usuario.cambiar') }}">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Nueva Clave</label>
                            <div class="col-md-6">
                                <input id="clave" type="text" class="form-control" name="clave" value="" required autofocus>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Cambiar Contraseña
                                </button>
                            </div>
                        </div>
                    </form>

@endsection
