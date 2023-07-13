<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <h1 class="text-center">Editar Salones</h1>

    @if (count($errors) > 0)

        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>

        </div>


    @endif

    <form action="{{ url('/salon/' . $salon->id) }}" method="post" class="row justify-content-center">
        @csrf
        {{ method_field('PATCH') }}
        <fieldset class="bg-light d-flex flex-column border p-3 my-2 col-4">
            <label for="universidad_id">Universidad:</label>
            <select name="universidad_id" id="universidad_id" required>
                @foreach ($datos['universidads'] as $universidad)
                    <option value="{{ $universidad->id }}"
                        {{ $salon->universidad_id == $universidad->id ? 'selected' : '' }}>
                        {{ $universidad->nombre }}
                    </option>
                @endforeach
            </select>
            <br>
            <label for="categoria">Categoria:</label>
            <select name="categoria" id="categoria" required>
                <option value="estandar" {{ $salon->categoria == 'estandar' ? 'selected' : '' }}>Estandar</option>
                <option value="auditorio" {{ $salon->categoria == 'auditorio' ? 'selected' : '' }}>Auditorio</option>
                <option value="videoconferencia" {{ $salon->categoria == 'videoconferencia' ? 'selected' : '' }}>
                    Videoconferencia</option>
            </select>
            <label for="tipo">Tipo:</label>
            <select name="tipo" id="tipo" required>
                <option value="sencillo" {{ $salon->tipo == 'sencillo' ? 'selected' : '' }}>Sencillo</option>
                <option value="amoblado" {{ $salon->tipo == 'amoblado' ? 'selected' : '' }}>Amoblado</option>
                <option value="mediano" {{ $salon->tipo == 'mediano' ? 'selected' : '' }}>Mediano</option>
                <option value="grande" {{ $salon->tipo == 'grande' ? 'selected' : '' }}>Grande</option>
            </select>
            <br>
            <input type="submit" value="Editar" class="btn btn-success">
            <br>
            <a href="{{ url('salon') }}" class="btn btn-danger">Cancelar</a>
        </fieldset>
    </form>

</body>

</html>
