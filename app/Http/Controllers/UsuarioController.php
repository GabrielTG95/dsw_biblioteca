<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Usuario;
class LibroController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  {
        $records = Usuario::latest()->paginate(5);
        return view('usuarios.index', compact('records'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()   {
        return view('usuarios.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required'
        ]);
        $input = $request->all();
        /*if ($image = $request->file('image')) {
            $imageDestinationPath = 'uploads/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $input['image'] = "$postImage";
        }*/
        Usuario::create($input);
        return redirect()->route('usuarios.index')->with('success','Usuario created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario) {
        return view('usuarios.show',compact('usuario'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)  {
        return view('usuarios.edit',compact('usuario'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario) {
        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'rol' => 'required'
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
        $usuario->update($input);
        return redirect()->route('usuarios.index')->with('success','Usuario updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario) {
        $usuario->delete();
        return redirect()->route('usuarios.index')
            ->with('success','Usuario deleted successfully');
    }
}
