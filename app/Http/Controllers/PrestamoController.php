<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Prestamo;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Libro;
class PrestamoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  {
        $records = Prestamo::latest()->paginate(10);
        $users = User::get();
        $libros = Libro::get();
        return view('prestamos.index', compact('records','users', 'libros'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()   {
        $users = User::get();
        $libros = Libro::get();
        return view('prestamos.create',compact('users','libros'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'libro_id' => 'required',
            'usuario' => 'required'
        ]);
        $input = $request->all();
        $prestamos = Prestamo::where('usuario','=',$request['usuario'])
            ->whereNull('fecha_devolucion')
            ->count();
        $sancionActual = (User::select('sancion')->where('id','=',$request['usuario'])->get())[0]->sancion;
        if($prestamos >= 2){
            return redirect()->route('prestamos.index')->with('masDeDos','No se ha podido generar el prestamo.
                    El usuario ya cuenta con dos prestamos por devolver.');
        }else if(Carbon::parse($sancionActual) > Carbon::now()){
            return redirect()->route('prestamos.index')->with('masDeDos','No se ha podido generar el prestamo.
                    El usuario cuenta con una sanción hasta la fecha: '.$sancionActual.'.');
        }else{
            Prestamo::create($input);
            Libro::where('id','=',$request['libro_id'])->update(['disponible' => 1]);
            return redirect()->route('prestamos.index')->with('success','Prestamo creado con éxito.');
        }
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function show(Prestamo $prestamo) {
        $libros = Libro::get();
        $users = User::get();
        return view('prestamos.show',compact('prestamo','libros','users'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamo $prestamo)  {
        $users = User::get();
        $libros = Libro::get();
        return view('prestamos.edit',compact('prestamo','users','libros'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prestamo $prestamo) {
        $request->validate([
            'libro_id' => 'required',
            'usuario' => 'required',
            'fecha_prestamo' => 'required',
            'fecha_devolucion' => ''
        ]);
        $input = $request->all();
        $prestamo->update($input);
        $this->actualizarDisponibilidad($request['fecha_devolucion'], $request['libro_id']);
        $this->comprobarSancion($request['fecha_prestamo'],$request['fecha_devolucion'],$request['usuario']);
        return redirect()->route('prestamos.index')->with('success','Prestamo actualizado con éxito');
    }
    public function actualizarDisponibilidad($devolucion, $libro){
        if($devolucion != null){
            Libro::where('id','=',$libro)->update(['disponible' => 0]);
        }
        if($devolucion == null){
            Libro::where('id','=',$libro)->update(['disponible' => 1]);
        }
    }
    public function comprobarSancion($fechaPrestamo,$fechaDevolucion,$usuario){
        $prestamo = Carbon::parse($fechaPrestamo);
        $devolucion = Carbon::parse($fechaDevolucion);
        $diferencia = $devolucion->diffInDays($prestamo);
        $sancionActual = (User::select('sancion')->where('id','=',$usuario)->get())[0]->sancion;
        if ($diferencia > 6 && $sancionActual == null){
            $fecha = $devolucion->addDays(($diferencia-6)*2)->format('Y-m-d');
            User::where('id','=',$usuario)->update(['sancion' => $fecha]);
        }else if ($diferencia > 6 && $sancionActual != null){
            if (Carbon::now() >= Carbon::parse($sancionActual)){
                $fecha = $devolucion->addDays(($diferencia-6)*2)->format('Y-m-d');
            }else{
                $fecha = Carbon::parse($sancionActual)->addDays(($diferencia-6)*2)->format('Y-m-d');
            }
            User::where('id','=',$usuario)->update(['sancion' => $fecha]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prestamo $prestamo) {
        $prestamo->delete();
        return redirect()->route('prestamos.index')
            ->with('success','Prestamo deleted successfully');
    }
}
