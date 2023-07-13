<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <h1 class="text-center">LISTA UNIVERSIDADES</h1>

@if (Session::has('mensaje'))

<h3 class="alert">{{Session::get('mensaje')}}</h3>
    
@endif
<br>
<a href="{{ url('universidad/create') }} " class="btn btn-success">Registrar nueva Universidad</a>
<a href="{{ url('salon') }} " class="btn btn-primary">Ver Salones</a>
<br>
<table class="table table-striped text-center">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Direccion</th>
            <th>Email</th>
            <th>Fecha</th>
            <th>Telefono</th>
            <th>Cantidad salones</th>
            <th class="text-start">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($universidads as $universidad )
        <tr>
            <td>{{$universidad->id}}</td>
            <td> {{$universidad->nombre}} </td>
            <td> {{$universidad->direccion}} </td>
            <td> {{$universidad->email}} </td>
            <td> {{$universidad->fecha}} </td>
            <td> {{$universidad->telefono}} </td>
            <td> {{$universidad->cant_salones}} </td>
            <td class="d-flex"> 
                <a href=" {{url('universidad/'.$universidad->id.'/edit')}} " 
                    class="btn-sm btn-secondary text-decoration-none">
                    Editar
                </a> 
            
                <form action=" {{ url('universidad/'.$universidad->id) }} " method="post" >
                
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('¿Quieres Borrar?')" value="Borrar" 
                    class="btn-sm btn-danger">
                    
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    
</body>
</html>
