<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Libro;
use App\Models\Categoria;
class LibroController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  {
        $records = Libro::latest()->paginate(9);
        $categorias = Categoria::get();
        return view('libros.index', compact('records','categorias'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)   {
        $categorias = Categoria::get();
        return view('libros.create',compact('categorias'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'isbn' => 'required',
            'titulo' => 'required',
            'autor' => 'required',
            'categoria' => 'required',
            'editorial' => 'required',
            'edicion' => 'required',
            'fecha_publicacion' => 'required',
            'portada' => 'required'
        ]);
        $input = $request->all();
        if ($image = $request->file('portada')) {
            $imageDestinationPath = 'uploads/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $input['portada'] = "$postImage";
        }
        Libro::create($input);
        return redirect()->route('libros.index')->with('success','Libro creado con éxito.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro) {
        $categorias = Categoria::get();
        return view('libros.show',compact('libro','categorias'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)  {
        $categorias = Categoria::get();
        return view('libros.edit',compact('libro','categorias'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro) {
        $request->validate([
            'isbn' => 'required',
            'titulo' => 'required',
            'autor' => 'required',
            'categoria' => 'required',
            'editorial' => 'required',
            'edicion' => 'required',
            'fecha_publicacion' => 'required',
            'disponible' => '',
            'portada' => ''
        ]);
        if ($request['disponible'] == 'on'){
            $request['disponible'] = 0;
        }else{
            $request['disponible'] = 1;
        }
        $input = $request->all();
        if ($image = $request->file('portada')) {
            $imageDestinationPath = 'uploads/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $input['portada'] = "$postImage";
        } else {
            unset($input['portada']);
        }
        $libro->update($input);
        return redirect()->route('libros.show',compact('libro'))->with('success','Libro actualizado con éxito.');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function destroy(Libro $libro) {
        $libro->delete();
        return redirect()->route('libros.index')
            ->with('success','Libro deleted successfully');
    }
}
