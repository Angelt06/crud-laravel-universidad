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
    <h1 class="text-center">Editar Universidades</h1>
    @if (Session::has('mensaje'))
        <h3 class="alert">{{ Session::get('mensaje') }}</h3>
    @endif

    @if (count($errors) > 0)

        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>

        </div>


    @endif

    <form action="{{ url('/universidad/' . $universidad->id) }}" method="post" class="row justify-content-center">

        @csrf
        {{ method_field('PATCH') }}
        <fieldset class="bg-light d-flex flex-column border p-3 my-2 col-4">
            @include('universidad.form', ['modo' => 'Editar'])
        </fieldset>


    </form>

</body>

</html>
