@extends('master')

@section('title') Registro de difuntos @endsection

@section('titulo')
  <h4> <i class="ti-heart-broken menu-icon"></i> Registro de difuntos </h4>
 @endsection

@section('difunto')
 active
@endsection


@section('descripcion') Administracion de los proyectos @endsection

@section('boton')
  <a   href="#modalAgregar"   data-toggle="modal" class="nuevo btn btn-primary btn-icon-text btn-rounded" data-target="" accesskey="n"> <i class="ti-plus btn-icon-prepend"></i> <u>N</u>uevo </a>
@endsection

@section('modal1')
<div id="modalAgregar" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">
    <div class="modal-content panel panel-primary">
      <div class="modal-header panel-heading">
        <b>Nuevo</b>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body panel-body">
        {!! Form::open(['accept-charset'=>'UTF-8', 'enctype'=>'multipart/form-data', 'method'=>'POST', 'files'=>true, 'autocomplete'=>'off', 'id'=>'form-insert'] ) !!}

        <h4> DATOS GENERALES </h4>
        <div class="row">
          <div class="col-md-4">
            <label for="registro_civil_" > <b><i>Registro civil</i></b> </label>
            {!! Form::text('registro_civil', '', ['class'=>'form-control', 'placeholder'=>'Apertura', 'id'=>'registro_civil_']) !!}
          </div>
          <div class="col-md-4">
            <label for="boleta_entierro_" > <b><i>Boleta Entierro</i></b> </label>
            {!! Form::text('boleta_entierro', '', ['class'=>'form-control', 'placeholder'=>'Boleta Entierro', 'id'=>'boleta_entierro_']) !!}
          </div>
          <div class="col-md-4">
            <label for="certificado_defuncion_" > <b><i>Certificado Defuncion</i></b> </label>
            {!! Form::text('certificado_defuncion', '', ['class'=>'form-control', 'placeholder'=>'Certificado Defuncion', 'id'=>'certificado_defuncion_']) !!}
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <label for="libro_" > <b><i>N Libro</i></b> </label>
            {!! Form::text('libro', '', ['class'=>'form-control', 'placeholder'=>'N Libro', 'id'=>'libro_']) !!}
          </div>
          <div class="col-md-3">
            <label for="folio_" > <b><i>N° Folio</i></b> </label>
            {!! Form::text('folio', '', ['class'=>'form-control', 'placeholder'=>'N° Folio', 'id'=>'folio_']) !!}
          </div>
          <div class="col-md-3">
            <label for="partida_" > <b><i>N° Partida</i></b> </label>
            {!! Form::text('partida', '', ['class'=>'form-control', 'placeholder'=>'N° Partida', 'id'=>'partida_']) !!}
          </div>
          <div class="col-md-3">
            <label for="distrito_" > <b><i>Distrito</i></b> </label>
            {!! Form::text('distrito', '', ['class'=>'form-control', 'placeholder'=>'Distrito', 'id'=>'distrito_']) !!}
          </div>
        </div>

        <div class="row">
          <div class="col-md-6">
            <label for="medico_" > <b><i>Nombre Medico</i></b> </label>
            {!! Form::text('medico', '', ['class'=>'form-control', 'placeholder'=>'Nombre Medico', 'id'=>'medico_', 'list'=>'lista_medico']) !!}
            <datalist id="lista_medico">
              @foreach($medicos as $medico)
                <option value="{{$medico->medico}}">
              @endforeach
            </datalist>
          </div>
          <div class="col-md-6">
            <label for="diagnostico_" > <b><i>Diagnostico</i></b> </label>
            {!! Form::text('diagnostico', '', ['class'=>'form-control', 'placeholder'=>'Diagnostico', 'id'=>'diagnostico_']) !!}
          </div>
        </div>
        <hr>
        <br>

        <div class="personales" style="background-color:#ebebeb; padding:10px;">
          <b> DATOS PERSONALES </b>
          <div class="row">
            <div class="col-md-3">
              <label for="nombre_" > <b><i>Nombre</i></b> </label>
              {!! Form::text('nombre', '', ['class'=>'form-control', 'placeholder'=>'Nombre', 'id'=>'nombre_']) !!}
            </div>
            <div class="col-md-3">
              <label for="paterno_" > <b><i>Ap. Paterno</i></b> </label>
              {!! Form::text('paterno', '', ['class'=>'form-control', 'placeholder'=>'Ap. Paterno', 'id'=>'paterno_']) !!}
            </div>
            <div class="col-md-3">
              <label for="materno_" > <b><i>Ap. Materno</i></b> </label>
              {!! Form::text('materno', '', ['class'=>'form-control', 'placeholder'=>'Ap. Materno', 'id'=>'materno_']) !!}
            </div>
            <div class="col-md-3">
              <label for="esposo_" > <b><i>Ap. Esposo</i></b> </label>
              {!! Form::text('esposo', '', ['class'=>'form-control', 'placeholder'=>'Ap. Esposo', 'id'=>'esposo_']) !!}
            </div>
          </div>

          <div class="row">
            <div class="col-md-2">
              <label for="inicial_nombre_" > <b><i>Inicial </i></b> </label>
              {!! Form::text('inicial_nombre', '', ['class'=>'form-control', 'placeholder'=>'Inicial', 'id'=>'inicial_nombre_', 'onlyread']) !!}
            </div>
            <div class="col-md-2">
              <label for="edad_" > <b><i>Edad</i></b> </label>
              {!! Form::number('edad', '', ['class'=>'form-control', 'placeholder'=>'Edad', 'id'=>'edad_']) !!}
            </div>
            <div class="col-md-2">
              <label for="sexo_" > <b><i>Sexo</i></b> </label>
              {!! Form::select('sexo', ['M'=>'Masculino', 'F'=>'Femenino'], '', ['class'=>'form-control', 'placeholder'=>'', 'id'=>'sexo_']) !!}
            </div>
            <div class="col-md-6">
              <label for="senas_particulares_" > <b><i>Señas Particulares</i></b> </label>
              {!! Form::text('senas_particulares', '', ['class'=>'form-control', 'placeholder'=>'Señas Particulares', 'id'=>'senas_particulares_']) !!}
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <label for="fecha_nacimiento_" > <b><i>Nacimiento</i></b> </label>
              {!! Form::date('fecha_nacimiento', '', ['class'=>'form-control', 'placeholder'=>'Fecha Nacimiento', 'id'=>'fecha_nacimiento_']) !!}
            </div>
            <div class="col-md-3">
              <label for="fecha_fallecimiento_" > <b><i>Fecha Fallecimiento</i></b> </label>
              {!! Form::date('fecha_fallecimiento', '', ['class'=>'form-control', 'placeholder'=>'Fecha Fallecimiento', 'id'=>'fecha_fallecimiento_']) !!}
            </div>
            <div class="col-md-3">
              <label for="fecha_registro_" > <b><i>Fecha</i></b> </label>
              {!! Form::date('fecha_registro', '', ['class'=>'form-control', 'placeholder'=>'Fecha ', 'id'=>'fecha_registro_']) !!}
            </div>
            <div class="col-md-3">
              <label for="hora_fallecimiento_" > <b><i>Hora Fallecimiento</i></b> </label>
              {!! Form::time('hora_fallecimiento', '', ['class'=>'form-control', 'placeholder'=>'Hora Fallecimiento', 'id'=>'hora_fallecimiento_']) !!}
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <label for="estado_civil_" > <b><i>Estado Civil</i></b> </label>
              {!! Form::select('estado_civil', ['SOLTERO'=>'SOLTER@', 'CASADO'=>'CASAD@', 'VIUDA'=>'VIUD@'], null, ['class'=>'form-control', 'placeholder'=>'', 'id'=>'estado_civil_']) !!}
            </div>
            <div class="col-md-4">
              <label for="religion_" > <b><i>Religion</i></b> </label>
              {!! Form::text('religion', '', ['class'=>'form-control', 'placeholder'=>'Religion', 'id'=>'religion_', 'list'=>'lista_religion']) !!}
              <datalist id="lista_religion">
                @foreach($religions as $religion)
                  <option value="{{$religion->religion}}">
                @endforeach
              </datalist>
            </div>
            <div class="col-md-4">
              <label for="profesion_" > <b><i>Profesion</i></b> </label>
              {!! Form::text('profesion', '', ['class'=>'form-control', 'placeholder'=>'Profesion', 'id'=>'profesion_', 'list'=>'lista_profesion']) !!}
              <datalist id="lista_profesion">
                @foreach($profesions as $profesion)
                  <option value="{{$profesion->profesion}}">
                @endforeach
              </datalist>
            </div>
          </div>
          <br>
          <hr>
          <br>
        </div>

        <b> DATOS DE LA DIRECCION </b>
        <div class="row">
          <div class="col-md-4">
            <label for="direccion_" > <b><i>Direccion</i></b> </label>
            {!! Form::text('direccion', '', ['class'=>'form-control', 'placeholder'=>'Direccion', 'id'=>'direccion_']) !!}
          </div>
          <div class="col-md-4">
            <label for="lugar_procedencia_" > <b><i>Lugar Procedencia</i></b> </label>
            {!! Form::text('lugar_procedencia', '', ['class'=>'form-control', 'placeholder'=>'Lugar Procedencia', 'id'=>'lugar_procedencia_']) !!}
          </div>
          <div class="col-md-4">
            <label for="ultimo_domicilio_" > <b><i>Ultimo Domicilio</i></b> </label>
            {!! Form::text('ultimo_domicilio', '', ['class'=>'form-control', 'placeholder'=>'Ultimo Domicilio', 'id'=>'ultimo_domicilio_']) !!}
          </div>
        </div>

        <div class="row">
          <div class="col-md-3">
            <label for="nacionalidad_" > <b><i>Nacionalidad</i></b> </label>
            {!! Form::select('nacionalidad', $paises, null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'nacionalidad_']) !!}
          </div>
          <div class="col-md-3">
            <label for="departamento_" > <b><i>Departamento</i></b> </label>
            {!! Form::select('departamento', [''=>''],  null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'departamento_']) !!}
          </div>
          <div class="col-md-3">
            <label for="provincia_" > <b><i>Provincia</i></b> </label>
            {!! Form::select('provincia', [''=>''], null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'provincia_']) !!}
          </div>
          <div class="col-md-3">
            <label for="localidad_" > <b><i>Localidad</i></b> </label>
            {!! Form::select('localidad', [''=>''], null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'localidad_', 'list'=>'lista_localidad']) !!}
          </div>
        </div>

        <hr><br>

        <div class="personales" style="background-color:#ebebeb; padding:10px;">
          <b> DATOS FAMILIARES </b>
          <div class="row">
            <div class="col-md-3">
              <label for="hijo_" > <b><i>Hijo</i></b> </label>
              {!! Form::text('hijo', '', ['class'=>'form-control', 'placeholder'=>'Hijo', 'id'=>'hijo_']) !!}
            </div>
            <div class="col-md-3">
              <label for="padre_" > <b><i>Padre</i></b> </label>
              {!! Form::text('padre', '', ['class'=>'form-control', 'placeholder'=>'Padre', 'id'=>'padre_']) !!}
            </div>
            <div class="col-md-3">
              <label for="madre_" > <b><i>Madre</i></b> </label>
              {!! Form::text('madre', '', ['class'=>'form-control', 'placeholder'=>'Madre', 'id'=>'madre_']) !!}
            </div>
            <div class="col-md-3">
              <label for="conyuge_" > <b><i>Conyuge</i></b> </label>
              {!! Form::text('conyuge', '', ['class'=>'form-control', 'placeholder'=>'Conyuge', 'id'=>'conyuge_']) !!}
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
              <label for="imagen_" > <b><i>Imagen</i></b> </label>
              {!! Form::file('imagen', null, ['class'=>'form-control', 'id'=>'imagen_']) !!}
            </div>
          </div>
          <hr>
          <br>
        </div>
        {!! Form::hidden('id_user', '1') !!}
        {!! Form::submit('A&ntilde;adir', ['class'=>'agregar btn btn-primary']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
</div>
@endsection




@section('modal2')
    <div id="modalModifiar" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content panel panel-warning ">
                <div class="modal-header panel-heading">
                    <b>Actualizar </b>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body panel-body">
                    {!! Form::open(['route'=>['Difunto.update', ':DATO_ID'], 'method'=>'PATCH', 'enctype'=>'multipart/form-data', 'id'=>'form-update' ])!!}


                    <h4> DATOS GENERALES </h4>
                    <div class="row">
                      <div class="col-md-4">
                        <label for="registro_civil" > <b><i>Registro civil</i></b> </label>
                        {!! Form::text('registro_civil', '', ['class'=>'form-control', 'placeholder'=>'Apertura', 'id'=>'registro_civil']) !!}
                      </div>
                      <div class="col-md-4">
                        <label for="boleta_entierro" > <b><i>Boleta Entierro</i></b> </label>
                        {!! Form::text('boleta_entierro', '', ['class'=>'form-control', 'placeholder'=>'Boleta Entierro', 'id'=>'boleta_entierro']) !!}
                      </div>
                      <div class="col-md-4">
                        <label for="certificado_defuncion" > <b><i>Certificado Defuncion</i></b> </label>
                        {!! Form::text('certificado_defuncion', '', ['class'=>'form-control', 'placeholder'=>'Certificado Defuncion', 'id'=>'certificado_defuncion']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <label for="libro" > <b><i>N Libro</i></b> </label>
                        {!! Form::text('libro', '', ['class'=>'form-control', 'placeholder'=>'N Libro', 'id'=>'libro']) !!}
                      </div>
                      <div class="col-md-3">
                        <label for="folio" > <b><i>N° Folio</i></b> </label>
                        {!! Form::text('folio', '', ['class'=>'form-control', 'placeholder'=>'N° Folio', 'id'=>'folio']) !!}
                      </div>
                      <div class="col-md-3">
                        <label for="partida" > <b><i>N° Partida</i></b> </label>
                        {!! Form::text('partida', '', ['class'=>'form-control', 'placeholder'=>'N° Partida', 'id'=>'partida']) !!}
                      </div>
                      <div class="col-md-3">
                        <label for="distrito" > <b><i>Distrito</i></b> </label>
                        {!! Form::text('distrito', '', ['class'=>'form-control', 'placeholder'=>'Distrito', 'id'=>'distrito']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <label for="medico" > <b><i>Nombre Medico</i></b> </label>
                        {!! Form::text('medico', '', ['class'=>'form-control', 'placeholder'=>'Nombre Medico', 'id'=>'medico', 'list'=>'lista_medico']) !!}
                      </div>
                      <div class="col-md-6">
                        <label for="diagnostico" > <b><i>Diagnostico</i></b> </label>
                        {!! Form::text('diagnostico', '', ['class'=>'form-control', 'placeholder'=>'Diagnostico', 'id'=>'diagnostico']) !!}
                      </div>
                    </div>
                    <hr>
                    <br>

                    <div class="personales" style="background-color:#ebebeb; padding:10px;">
                      <b> DATOS PERSONALES </b>
                      <div class="row">
                        <div class="col-md-3">
                          <label for="nombre" > <b><i>Nombre</i></b> </label>
                          {!! Form::text('nombre', '', ['class'=>'form-control', 'placeholder'=>'Nombre', 'id'=>'nombre']) !!}
                        </div>
                        <div class="col-md-3">
                          <label for="paterno" > <b><i>Ap. Paterno</i></b> </label>
                          {!! Form::text('paterno', '', ['class'=>'form-control', 'placeholder'=>'Ap. Paterno', 'id'=>'paterno']) !!}
                        </div>
                        <div class="col-md-3">
                          <label for="materno" > <b><i>Ap. Materno</i></b> </label>
                          {!! Form::text('materno', '', ['class'=>'form-control', 'placeholder'=>'Ap. Materno', 'id'=>'materno']) !!}
                        </div>
                        <div class="col-md-3">
                          <label for="esposo" > <b><i>Ap. Esposo</i></b> </label>
                          {!! Form::text('esposo', '', ['class'=>'form-control', 'placeholder'=>'Ap. Esposo', 'id'=>'esposo']) !!}
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-2">
                          <label for="inicial_nombre" > <b><i>Inicial </i></b> </label>
                          {!! Form::text('inicial_nombre', '', ['class'=>'form-control', 'placeholder'=>'Inicial', 'id'=>'inicial_nombre', 'onlyread']) !!}
                        </div>
                        <div class="col-md-2">
                          <label for="edad" > <b><i>Edad</i></b> </label>
                          {!! Form::number('edad', '', ['class'=>'form-control', 'placeholder'=>'Edad', 'id'=>'edad']) !!}
                        </div>
                        <div class="col-md-2">
                          <label for="sexo" > <b><i>Sexo</i></b> </label>
                          {!! Form::select('sexo', ['M'=>'Masculino', 'F'=>'Femenino'], '', ['class'=>'form-control', 'placeholder'=>'', 'id'=>'sexo']) !!}
                        </div>
                        <div class="col-md-6">
                          <label for="senas_particulares" > <b><i>Señas Particulares</i></b> </label>
                          {!! Form::text('senas_particulares', '', ['class'=>'form-control', 'placeholder'=>'Señas Particulares', 'id'=>'senas_particulares']) !!}
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-3">
                          <label for="fecha_nacimiento" > <b><i>Nacimiento</i></b> </label>
                          {!! Form::date('fecha_nacimiento', '', ['class'=>'form-control', 'placeholder'=>'Fecha Nacimiento', 'id'=>'fecha_nacimiento']) !!}
                        </div>
                        <div class="col-md-3">
                          <label for="fecha_fallecimiento" > <b><i>Fecha Fallecimiento</i></b> </label>
                          {!! Form::date('fecha_fallecimiento', '', ['class'=>'form-control', 'placeholder'=>'Fecha Fallecimiento', 'id'=>'fecha_fallecimiento']) !!}
                        </div>
                        <div class="col-md-3">
                          <label for="fecha_registro" > <b><i>Fecha</i></b> </label>
                          {!! Form::date('fecha_registro', '', ['class'=>'form-control', 'placeholder'=>'Fecha ', 'id'=>'fecha_registro']) !!}
                        </div>
                        <div class="col-md-3">
                          <label for="hora_fallecimiento" > <b><i>Hora Fallecimiento</i></b> </label>
                          {!! Form::time('hora_fallecimiento', '', ['class'=>'form-control', 'placeholder'=>'Hora Fallecimiento', 'id'=>'hora_fallecimiento']) !!}
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-4">
                          <label for="estado_civil" > <b><i>Estado Civil</i></b> </label>
                          {!! Form::select('estado_civil', ['SOLTERO'=>'SOLTER@', 'CASADO'=>'CASAD@', 'VIUDA'=>'VIUD@'], null, ['class'=>'form-control', 'placeholder'=>'', 'id'=>'estado_civil']) !!}
                        </div>
                        <div class="col-md-4">
                          <label for="religion" > <b><i>Religion</i></b> </label>
                          {!! Form::text('religion', '', ['class'=>'form-control', 'placeholder'=>'Religion', 'id'=>'religion', 'list'=>'lista_religion']) !!}
                        </div>
                        <div class="col-md-4">
                          <label for="profesion" > <b><i>Profesion</i></b> </label>
                          {!! Form::text('profesion', '', ['class'=>'form-control', 'placeholder'=>'Profesion', 'id'=>'profesion', 'list'=>'lista_profesion']) !!}
                        </div>
                      </div>
                      <br>
                      <hr>
                      <br>
                    </div>

                    <b> DATOS DE LA DIRECCION </b>
                    <div class="row">
                      <div class="col-md-4">
                        <label for="direccion" > <b><i>Direccion</i></b> </label>
                        {!! Form::text('direccion', '', ['class'=>'form-control', 'placeholder'=>'Direccion', 'id'=>'direccion']) !!}
                      </div>
                      <div class="col-md-4">
                        <label for="lugar_procedencia" > <b><i>Lugar Procedencia</i></b> </label>
                        {!! Form::text('lugar_procedencia', '', ['class'=>'form-control', 'placeholder'=>'Lugar Procedencia', 'id'=>'lugar_procedencia']) !!}
                      </div>
                      <div class="col-md-4">
                        <label for="ultimo_domicilio" > <b><i>Ultimo Domicilio</i></b> </label>
                        {!! Form::text('ultimo_domicilio', '', ['class'=>'form-control', 'placeholder'=>'Ultimo Domicilio', 'id'=>'ultimo_domicilio']) !!}
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3">
                        <label for="nacionalidad" > <b><i>Nacionalidad</i></b> </label>
                        {!! Form::select('nacionalidad', $paises, null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'nacionalidad']) !!}
                      </div>
                      <div class="col-md-3">
                        <label for="departamento" > <b><i>Departamento</i></b> </label>
                        {!! Form::select('departamento', $departamentos,  null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'departamento']) !!}
                      </div>
                      <div class="col-md-3">
                        <label for="provincia" > <b><i>Provincia</i></b> </label>
                        {!! Form::select('provincia', $provincias, null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'provincia']) !!}
                      </div>
                      <div class="col-md-3">
                        <label for="localidad" > <b><i>Localidad</i></b> </label>
                        {!! Form::select('localidad', $localidads, null, ['class'=>'form-control', 'placeholder'=>' ', 'id'=>'localidad']) !!}
                      </div>
                    </div>

                    <hr><br>

                    <div class="personales" style="background-color:#ebebeb; padding:10px;">
                      <b> DATOS FAMILIARES </b>
                      <div class="row">
                        <div class="col-md-3">
                          <label for="hijo" > <b><i>Hijo</i></b> </label>
                          {!! Form::text('hijo', '', ['class'=>'form-control', 'placeholder'=>'Hijo', 'id'=>'hijo']) !!}
                        </div>
                        <div class="col-md-3">
                          <label for="padre" > <b><i>Padre</i></b> </label>
                          {!! Form::text('padre', '', ['class'=>'form-control', 'placeholder'=>'Padre', 'id'=>'padre']) !!}
                        </div>
                        <div class="col-md-3">
                          <label for="madre" > <b><i>Madre</i></b> </label>
                          {!! Form::text('madre', '', ['class'=>'form-control', 'placeholder'=>'Madre', 'id'=>'madre']) !!}
                        </div>
                        <div class="col-md-3">
                          <label for="conyuge" > <b><i>Conyuge</i></b> </label>
                          {!! Form::text('conyuge', '', ['class'=>'form-control', 'placeholder'=>'Conyuge', 'id'=>'conyuge']) !!}
                        </div>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-12">
                          <img src="" id='imagen' alt="" width="550">
                        </div>
                      </div>
                      <hr>
                      <br>
                    </div>
                    {!! Form::hidden('id_user', '1') !!}

                    {!! Form::submit('Actualizar ', ['class'=>'btn btn-warning']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection


@section('cuerpo')
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
