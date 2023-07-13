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
    <h1 class="text-center">LISTA SALONES</h1>

@if (Session::has('mensaje'))

<h3 class="alert">{{Session::get('mensaje')}}</h3>
    
@endif
<br>
<a href="{{ url('salon/create') }} " class="btn btn-success">Registrar nuevo Salón</a>
<a href="{{ url('universidad') }} " class="btn btn-primary">Ver Universidades</a>
<br>
<table class="table table-striped text-center">
    <thead class="table-dark">
        <tr>
            <th>Id</th>
            <th>Universidad</th>
            <th>Categoría</th>
            <th>Tipo</th>
            <th class="text-start">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($salons as $salon )
        <tr>
            <td> {{$salon->id}}</td>
            <td> {{$salon->universidad->nombre}} </td>
            <td> {{$salon->categoria}} </td>
            <td> {{$salon->tipo}} </td>
            <td class="d-flex"> 
                <a href=" {{url('salon/'.$salon->id.'/edit')}} " 
                    class="btn-sm btn-secondary text-decoration-none">
                    Editar
                </a> 
            
                <form action=" {{ url('salon/'.$salon->id) }} " method="post" >
                
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
