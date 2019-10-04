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

      <th> Nro</th>
      <th> Usuario </th>
      <th> IP</th>
      <th> Fecha</th>
      <th> Centro de Salud </th>
      <th> Busqueda </th>

    </tr>
  </thead>
  <tbody><?php $nr = 1;?>
    @foreach($datos as $dato)
      <tr>
        <td> {{$nr}}</td>
        <td> {{ $dato->usuario }}  </td>
        <td> {{ $dato->ip }} </td>
        <td> {{ date('d-m-Y H:i:s', strtotime($dato->created_at)) }}  </td>
        <td> {{ $dato->dato }}  </td>
        <td> {{ $dato->centrosalud }}      </td>
      </tr><?php $nr = $nr + 1; ?>
    @endforeach
  </tbody>
</table>
