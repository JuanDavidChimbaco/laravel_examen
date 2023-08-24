<?php

namespace App\Http\Controllers;

use App\Models\equipos;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class equiposController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $equipos = equipos::all();
        $imagenes = [
            'storage/Equipo1.jpg' => 'escudo 1',
            'storage/Equipo2.jpg' => 'escudo 2',
            'storage/Equipo3.jpg' => 'escudo 3',
            'storage/Equipo4.jpg' => 'escudo 4',
            'storage/Equipo5.jpg' => 'escudo 5',
            'storage/Equipo6.jpg' => 'escudo 6',
            'storage/Equipo7.jpg' => 'escudo 7',
            'storage/Equipo8.jpg' => 'escudo 8',
        ];
        $equiposRegistrados = DB::table('equipos')->count();
        return view('equipos\index', compact('equipos', 'imagenes','equiposRegistrados'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

    // Valida los datos del formulario
    $request->validate([
        'nombre' => 'required|string|max:255',
        'programa' => 'required|string|max:255',
        'escudo' => [
            'required',
            Rule::unique('equipos', 'escudo')->ignore($request->id),
        ],
    ]);

    // Crea un nuevo equipo y guarda los datos
    $equipo = new equipos();
    $equipo->nombre = $request->nombre;
    $equipo->programa = $request->programa;
    $equipo->escudo = $request->escudo;
    $equipo->save();

    return redirect()->route('equipos.index')->with('success', 'Equipo registrado con éxito.');
    }

    public function sorteo()
    {

    $equipos = equipos::inRandomOrder()->limit(8)->get();

    // Divide los equipos en pares para los enfrentamientos
    $enfrentamientos = [];
    for ($i = 0; $i < 8; $i += 2) {
        $enfrentamientos[] = ['equipo1' => $equipos[$i], 'equipo2' => $equipos[$i + 1]];
    }

    // Prepara la estructura de datos para el script del torneo
    $teams = [];
    $results = [];

    foreach ($enfrentamientos as $enfrentamiento) {
        $teams[] = [$enfrentamiento['equipo1']->nombre, $enfrentamiento['equipo2']->nombre];
        $results[] = [ [null, null] ]; // Agrega un nuevo resultado para cada enfrentamiento
    }

    $torneoData = [
        'teams' => $teams,
        'results' => $results,
    ];

    return view('equipos.sorteo', compact('torneoData'));
    }
}
