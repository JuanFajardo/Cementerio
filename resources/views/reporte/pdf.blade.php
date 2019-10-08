<!DOCTYPE html>
<html lang="es" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>G.A.M.P. <?php echo date('Y-m-d'); ?> - Reporte </title>
  </head>
  <body>
    <table width="100%" border="0">
      <tr>
        <td width="10%">
          <img src="{{asset('img/escudogmp.jpg')}}" alt="">
        </td>
        <td> <h2> Gobierno Autónomo Municipal de Potosí </h2>
        </td>
      </tr>
      <tr>
        <td colspan="2"> Reporte desde  el {{ date('d-m-Y', strtotime($inicio)) }} hasta el {{ date('d-m-Y', strtotime($fin)) }}</td>
      </tr>
      <tr>
        <td colspan="2" style="font-size:10px;"> Fecha de generacion del reporte : <?php echo date('Y-m-d H:i:s'); ?> </td>
      </tr>
    </table>

    <table width="100%" border="1">
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
        </tr>
      </thead>
      <tbody><?php $nr = 1;?>
        @foreach($datos as $dato)
          <tr>
            <td>{{ $dato->inicial_nombre }}</td>
            <td>{{ $dato->sexo }}</td>
            <td>{{ $dato->edad }}</td>
            <td>{{ $dato->nombre }} </td>
            <td>{{ $dato->paterno }} </td>
            <td>{{ $dato->materno }} </td>
            <td>{{ $dato->esposo }} </td>
            <td>{{ $dato->fecha_fallecimiento }}</td>
            <td>{{ $dato->fecha_registro }}</td>
          </tr><?php $nr = $nr + 1; ?>
        @endforeach
      </tbody>
    </table>
  </body>
</html>
