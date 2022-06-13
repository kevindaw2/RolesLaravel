<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Piso;

class PisoController extends Controller
{
    function __construct()
    {
         $this->middleware('permission:ver-piso|crear-piso|editar-piso|borrar-piso')->only('index');
         $this->middleware('permission:crear-piso', ['only' => ['create','store']]);
         $this->middleware('permission:editar-piso', ['only' => ['edit','update']]);
         $this->middleware('permission:borrar-piso', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         //Con paginación
         $pisos = Piso::paginate(5);
         return view('pisos.index',compact('pisos'));
         //al usar esta paginacion, recordar poner en el el index.blade.php este codigo  {!! $pisos->links() !!}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pisos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'titulo' => 'required',
            'calle' => 'required',
            'ciudad' => 'required',
            'piscina' => 'required',
            'contenido' => 'required',
        ]);

        Piso::create($request->all());

        return redirect()->route('pisos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Piso $piso)
    {
        return view('pisos.editar',compact('piso'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Piso $piso)
    {
         request()->validate([
            'titulo' => 'required',
            'contenido' => 'required',
        ]);

        $piso->update($request->all());

        return redirect()->route('pisos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Piso $piso)
    {
        $piso->delete();

        return redirect()->route('pisos.index');
    }
}
