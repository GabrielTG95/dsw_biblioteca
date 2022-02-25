<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Prestamo;
use Carbon\Carbon;
class PrestamoController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  {
        $records = Prestamo::latest()->paginate(5);
        return view('prestamos.index', compact('records'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()   {
        return view('prestamos.create');
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
        /*if ($image = $request->file('image')) {
            $imageDestinationPath = 'uploads/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $input['image'] = "$postImage";
        }*/
        Prestamo::create($input);
        return redirect()->route('prestamos.index')->with('success','Prestamo created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function show(Prestamo $prestamo) {
        return view('prestamos.show',compact('prestamo'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestamo  $prestamo
     * @return \Illuminate\Http\Response
     */
    public function edit(Prestamo $prestamo)  {
        return view('prestamos.edit',compact('prestamo'));
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
            'usuario' => 'required',
            'fecha_prestamo' => 'required',
            'fecha_devolucion' => 'required'
        ]);
        $input = $request->all();
        /*if ($image = $request->file('image')) {
            $imageDestinationPath = 'uploads/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $input['image'] = "$postImage";
        } else {
            unset($input['image']);
        }*/
        $prestamo->update($input);
        return redirect()->route('prestamos.index')->with('success','Prestamo updated successfully');
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
