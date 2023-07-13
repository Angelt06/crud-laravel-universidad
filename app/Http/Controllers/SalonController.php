<?php

namespace App\Http\Controllers;

use App\Models\Salon;
use App\Models\Universidad;
use Illuminate\Http\Request;

class SalonController extends Controller
{


    public function index()
    {
        $datos['salons'] = Salon::paginate(10);
        return view('salon.index', $datos);
    }


    public function create()
    {

        $datos['universidads'] = Universidad::all();
        return view('salon.create', $datos);
    }


    public function store(Request $request)
    {
        $universidadId = $request->input('universidad_id');
        $universidad = Universidad::find($universidadId);
        if ($universidad && $universidad->salones()->count() < $universidad->cant_salones) {
            $campos = [
                'universidad_id' => 'required',
                'categoria' => 'required|string',
                'tipo' => 'required|string',
            ];
            $mensaje = ['required' => 'El :attribute es requerido'];

            $this->validate($request, $campos, $mensaje);

            $datosSalon = request()->except('_token');
            Salon::insert($datosSalon);

            //return response()->json($datosSalon);
            return redirect('salon')->with('mensaje', 'Salón agregado con éxito');
        }else {
          
            return redirect('/salon/create')->with('mensaje', 'No se puede crear el salón. Se ha alcanzado el límite de salones permitidos para esta universidad.');
        }
    }

    public function show(Salon $salon)
    {
        //
    }


    public function edit($id)
    {
        $salon = Salon::findOrFail($id);
        $datos['universidads'] = Universidad::all();
        return view('salon.edit', compact('salon', 'datos'));
    }


    public function update(Request $request, $id)
    {
        $datosSalon = request()->except('_token', '_method');
        Salon::where('id', '=', $id)->update($datosSalon);

        $salon = Salon::findOrFail($id);
        return redirect('salon')->with('mensaje', 'Salón Actualizado');
    }

    public function destroy($id)
    {
        Salon::destroy($id);
        return redirect('salon')->with('mensaje', 'Salón Eliminado');
    }
}
