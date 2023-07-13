<?php

namespace App\Http\Controllers;

use App\Models\Universidad;
use Illuminate\Http\Request;

class UniversidadController extends Controller
{

    public function index()
    {
        $datos['universidads'] = Universidad::paginate(10);
        return view('universidad.index', $datos);
    }


    public function create()
    {
        return view('universidad.create');
    }

    public function store(Request $request)
    {

        $campos = [
            'nombre' => 'required|string|unique:universidads,nombre',
            'direccion' => 'required|string|max:100',
            'email' => 'required|email',
            'fecha' => 'required|date',
            'telefono' => 'required|string|max:30',
            'cant_salones' => 'required|numeric',

        ];

        $mensaje = [
            'required' => 'El :attribute es requerido',
            'nombre.unique' => 'El nombre ya existe en la base de datos',
        ];

        $this->validate($request, $campos, $mensaje);

        //$datosUniversidad = request()->all();
        $datosUniversidad = request()->except('_token');
        Universidad::insert($datosUniversidad);

        // return response()->json($datosUniversidad);
        return redirect('universidad')->with('mensaje', 'Universidad agregada con éxito');
    }

    public function show(Universidad $universidad)
    {
        //
    }

    public function edit($id)
    {
        $universidad = Universidad::findOrFail($id);
        return view('universidad.edit', compact('universidad'));
    }

    public function update(Request $request, $id)
    {
        $datosUniversidad = request()->except('_token', '_method');
        $universidad = Universidad::findOrFail($id);
        if ($universidad->salones->count() > $request->cant_salones) {
            echo '<script>';
            echo 'console.log("Mensaje de prueba");';
            echo '</script>';
            // Mostrar mensaje de error o realizar la acción adecuada
            return redirect('universidad/'.$id.'/edit')->with('mensaje', 'Primero debe borrar salones para esta universidad');
        }else{
            Universidad::where('id', '=', $id)->update($datosUniversidad);

        

        //return view('universidad.edit', compact('universidad'));
        return redirect('universidad')->with('mensaje', 'Universidad Actualizada');
        }
        
    }


    public function destroy($id)
    {
        Universidad::destroy($id);
        return redirect('universidad')->with('mensaje', 'Universidad Eliminada');
    }
}
