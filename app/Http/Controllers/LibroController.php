<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Libro;
class LibroController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  {
        $records = Libro::latest()->paginate(5);
        return view('libros.index', compact('records'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)   {
        return view('libros.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'isbn' => 'required|min:10|max:17',
            'titulo' => 'required|min:10|max:100',
            'autor' => 'required|min:10|max:100',
            'categoria' => 'required|min:5|max:100',
            'editorial' => 'required|min:10|max:100',
            'edicion' => 'required',
            'fecha_publicacion' => 'required',
            'image' => 'required'
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $imageDestinationPath = 'uploads/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $input['image'] = "$postImage";
        }
        Libro::create($input);
        return redirect()->route('libros.index')->with('success','Libro created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function show(Libro $libro) {
        return view('libros.show',compact('libro'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Libro  $libro
     * @return \Illuminate\Http\Response
     */
    public function edit(Libro $libro)  {
        return view('libros.edit',compact('libro'));
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
            'isbn' => 'required|min:10|max:17',
            'titulo' => 'required|min:5|max:100',
            'autor' => 'required|min:5|max:100',
            'categoria' => 'required|min:5|max:100',
            'editorial' => 'required|min:5|max:100',
            'edicion' => 'required',
            'fecha_publicacion' => 'required',
            'disponible' => ''
        ]);
        if ($request['disponible'] == 'on'){
            $request['disponible'] = 0;
        }else{
            $request['disponible'] = 1;
        }
        $input = $request->all();
        if ($image = $request->file('image')) {
            $imageDestinationPath = 'uploads/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $input['image'] = "$postImage";
        } else {
            unset($input['image']);
        }
        $libro->update($input);
        return redirect()->route('libros.index')->with('success','Libro updated successfully');
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
