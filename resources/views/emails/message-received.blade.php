<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> {{$subject}} </title>
</head>
<body>
    <h3> Datos del cliente </h3>
    <p> Te contactó un            : <strong> {{ strtoupper($json_nuevo_cliente['tipoFigura']) }} </strong>  </p>
     <p> Nombre            : <strong>{{$json_nuevo_cliente['nombres'] .' '. $json_nuevo_cliente['apellidos'] }}</strong> </p>
     <p> Numero Telefonico : <strong>{{$json_nuevo_cliente['telefono'] }}</strong> </p>
     <p> Ciudad            : <strong>{{$json_nuevo_cliente['ciudad'] }}</strong> </p>
     <p> Correo            : <strong>{{$json_nuevo_cliente['correo'] }}</strong> </p>
     <p> Empresa           : <strong>{{$json_nuevo_cliente['nombreEmpresa'] }}</strong> </p>

<h3> Las respuestas de <strong>{{$json_nuevo_cliente['nombres'] .' '. $json_nuevo_cliente['apellidos'] }}</strong> fueron las siguiente :</h4>
@switch($json_nuevo_cliente['tipoFigura'])
    @case('emprendedor')
    <div class="container" >
    <h4> ¿Cuál es el giro de tu proyecto?  </h4>
        {{ $json_nuevo_cliente['giroProyecto'] }}  
    <h4> ¿En que plan estas interesado?  </h4> 
     {{ $json_nuevo_cliente['plan'] }} 
    </div>
    @break
    @case('asociacion')
    <div class="container" >
        <h4>¿A qué se dedica la asociación?</h4> 
        {{ $json_nuevo_cliente['dedicaAsociacion'] }}
        <h4>¿Cuántas personas forman parte?</h4> 
       {{ $json_nuevo_cliente['cantidadPersonas'] }}
        <h4>¿Qué apoyo requieres de nuestra parte?</h4> 
       {{ $json_nuevo_cliente['tipoApoyo'] }}
    </div>
    @break
    @case('distribuidor')
    <div class="container" >
        <h4>¿En que cantidad de playeras en las que estás interesado?</h4> 
       {{ $json_nuevo_cliente['cantidadPlayeras'] }}
        <h4>¿Cuál es la frecuencia de compra?</h4> 
       {{ $json_nuevo_cliente['frecuenciaCompra'] }}
        <h4>¿En qué colores estás interesado?</h4> 
       {{ $json_nuevo_cliente['colorInteresado'] }}
    </div>
    @break
@endswitch

</body>
</html>