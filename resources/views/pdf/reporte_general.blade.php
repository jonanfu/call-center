<!DOCTYPE html>

<head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

        <style>
        table {
          width: 100%;
          margin-top: 40px;
        }
          tr, th, thead, tbody, td{
            border: solid 1px black;
            margin: 0;
          }

          
          h2, h4 {
            text-align: center;
          }
          h1 {
            margin-bottom: 30mm;
          }
          img {
            width: 30mm;
            height: 30mm;
          }
          .call_center {
            float: right;

          }
          .upec{
            margin-top: 5mm;
          }
          footer {
            position: absolute;
            bottom:0px;
          }
          footer > div > p{
            text-align:center;
          }
        </style>
</head>
<body>

<img src="https://i.ibb.co/qRDns86/logo-upec.jpg" class="upec">
<img src="https://i.ibb.co/ccnZBVW/logo-call-center.png" class="call_center" alt="">

<h2>Universidad Politécnica Estatal del Carchi</h2>
<h2>Call Center Upec</h2>





<h3>Docente: {{auth()->user()->full_name}} </h3>
<h3>Carrera:
 @switch(auth()->user()->carrera)
                                @case(1)
                                Administración Pública
                                @break
                                @case(2)
                                Administración de Empresas
                                @break        
                                @case(3)
                                Agropecuaria
                                @break        
                                @case(4)
                                Alimentos
                                @break
                                @case(5)
                                Comercio Exterior
                                @break   
                                @case(6)
                                Computación
                                @break
                                @case(7)
                                Enfermeria
                                @break
                                @case(8)
                                Logistica y Transporte
                                @break
                                @case(9)
                                Turismo
                                @break
                            @endswitch

</h3> 
<h3>Fecha: {{ $now->format('d-m-Y') }}</h3>
<h3>Hora: {{ $now->format('H:i')}}</h3>
<h3>Reporte generado entre {{ $fecha_reporte['fecha_inicio']}} al {{$fecha_reporte['fecha_fin']}}</h3>

<h4>LLamadas</h4>

@foreach($llamadas as $llamada)
@if ($llamada->carrera == auth()->user()->carrera)
<table>
            <tr>
                <th>Código</th>
                <th>Responsable</th>
                <th>Nombre cliente</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Ciudad</th>
            </tr>
            <tr>
                <td>{{ $llamada->id }}</td>
                <td>{{ $llamada->full_name}}</td>
                <td>{{ $llamada->nombre_cliente }}</td>
                <td>{{ $llamada->telefono }}</td>
                <td>{{ $llamada->email }}</td>
                <td>{{ $llamada->ciudad }}</td>
          </tr>
          <tr>
                <th>Dirección</th>
                <td colspan="5">{{ $llamada->direccion }}</td>
            </tr>
          <tr>
             <th>Fecha</th>
             <td colspan="5">{{ $llamada->fecha }}</td>
          </tr>
          <tr>
            <th>Hora inicio</th>
            <td colspan="5">{{ $llamada->hora_inicio }}</td>
          </tr>
          <tr>
            <th>Hora Fin</th>
            <td colspan="5">{{ $llamada->hora_fin }}</td>
          </tr>
          
          <tr>
            <th>Asunto</th>
            <td colspan="5">{{ $llamada->asunto }}</td>    
          </tr>
          <tr>
            <th>Nival de alerta</th>
            <td colspan="5">@switch($llamada->tipo_alerta)
                        @case(1)
                            Baja
                            @break
                        @case(2)
                            Media
                            @break
                        @case(3)
                            Alta
                            @break
                    @endswitch
             </td> 
          </tr>
          <tr>
            <th>Respuesta</th>
            <td colspan="5">{{ $llamada->respuesta }}</td>
          </tr>
          <tr>
            <th>Atendido</th>
            <td colspan="5">@if( $llamada->atendido)
                        Atendido
                    @else
                        No Atendido
                    @endif
            </td>   
          </tr>
          <tr>
            <th>Nivel de Satisfacion</th>
            <td colspan="5">{{ $llamada->nivel_satisfacion }}</td>
          </tr>
          <tr>
            <th>Observación</th>
            <td colspan="5">{{ $llamada->observaciones }}</td>
          </tr>
    </table>
    @endif
    @endforeach 

    <footer>
          <div>
            <p>______________________________________________</p>
            <p>{{auth()->user()->full_name}}</p>
            <p>Docente</p>
          </div>
    </footer>
</body>

</html>