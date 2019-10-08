<?php
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Reporte_'.date('Y_m_d_h_i_s').'.xls');
?>
<table width="100%" border="0">
  <tr>
    <td> <h2> Gobierno Autónomo Municipal de Potosí </h2>
    </td>
  </tr>
  <tr>
    <td> Reporte desde  el {{ date('d-m-Y', strtotime($inicio)) }} hasta el {{ date('d-m-Y', strtotime($fin)) }}</td>
  </tr>
  <tr>
    <td style="font-size:10px;"> Fecha de generacion del reporte : <?php echo date('Y-m-d'); ?> </td>
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
