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

                    <form class="form-horizontal" method="POST" action="{{ route('usuarios') }}">
                        {{ csrf_field() }}

                        <div class="row">

                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }} col-md-12 col-xl-6">
                              <label for="email" class="col-md-4 control-label">Nombres Y Apellidos</label>
                              <div class="">
                                  <input id="" type="text" class="form-control" name="email" value="{{ old('email') }}" required>
                              </div>
                          </div>

                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }} col-md-12 col-xl-6">
                              <label for="name" class="col-md-4 control-label">Nombre de Usuario </label>
                              <div class="">
                                  <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>
                                  @if ($errors->has('name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                          </div>
                        </div>

                        <div class="row">

                          <div class="form-group{{ $errors->has('grupo') ? ' has-error' : '' }}  col-md-12 col-xl-6">
                              <label for="grupo" class="col-md-4 control-label">Grupo</label>
                              <select name="grupo" id="grupo" class="form-control">
                                <option value="Administrador">Administrador</option>
                                <option value="Encargado">Encargado</option>
                                <option value="Usuario">Usuario</option>
                              </select>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }} col-md-12 col-xl-6">
                              <label for="password" class="col-md-4 control-label">Password</label>
                              <input id="password" type="password" class="form-control" name="password" required>
                              @if ($errors->has('password'))
                                <span class="help-block">
                                  <strong>{{ $errors->first('password') }}</strong>
                                </span>
                              @endif
                          </div>

                          <div class="form-group col-md-12 col-xl-6">
                              <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>
                              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                          </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12 col-xl-6">
                                <button type="submit" class="btn btn-primary btn-icon-text">
                                    <i class="ti-save menu-ico"></i> Registrar
                                </button>
                            </div>
                        </div>
                    </form>

@endsection
