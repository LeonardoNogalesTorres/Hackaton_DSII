<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidente;

class IncidenteController extends Controller
{
    // Mostrar tablero con todos los incidentes (Rol: Coordinador / Operador) 
    public function index()
    {
        // Traemos todos los incidentes ordenados por los más recientes
        $incidentes = Incidente::orderBy('created_at', 'desc')->get();
        return view('incidentes.index', compact('incidentes'));
    }

    // Mostrar el formulario de registro (Rol: Operador) 
    public function create()
    {
        return view('incidentes.create');
    }

    // Guardar el incidente en MySQL con validaciones técnicas [cite: 180, 205]
    public function store(Request $request)
    {
        // Validamos que los datos obligatorios del MVP estén presentes [cite: 180, 205, 270, 271]
        $request->validate([
            'titulo' => 'required|min:5|max:150',
            'descripcion' => 'required',
            'tipo_incidente' => 'required'
        ]);

        // Creamos el registro en MySQL
        Incidente::create([
            'titulo' => $request->titulo,
            'descripcion' => $request->descripcion,
            'tipo_incidente' => $request->tipo_incidente,
            'estado' => 'Pendiente', // Todo incidente inicia en Pendiente por defecto [cite: 281, 286]
            'rol_usuario_registra' => 'Operador' // Simulación de rol actual para el MVP [cite: 291]
        ]);

        // Redireccionar al tablero con un mensaje de éxito
        return redirect()->route('dashboard.index')->with('success', '¡Incidente registrado exitosamente en el sistema!');
    }

    // Cambiar estado o asignar responsable (Rol: Coordinador) [cite: 284, 285, 296, 297]
    public function updateEstado(Request $request, $id)
    {
        $incidente = Incidente::findOrFail($id);
        
        // Actualizamos el estado y el responsable asignado [cite: 284, 296, 297]
        $incidente->update([
            'estado' => $request->estado, // 'Pendiente', 'En proceso' o 'Resuelto' [cite: 285]
            'responsable_asignado' => $request->responsable_asignado
        ]);

        return redirect()->route('dashboard.index')->with('success', 'Incidente actualizado.');
    }
}