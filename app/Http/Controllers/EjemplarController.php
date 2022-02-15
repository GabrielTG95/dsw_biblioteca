<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Ejemplar;
class EjemplarController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()  {
        $records = Ejemplar::latest()->paginate(5);
        return view('ejemplares.index', compact('records'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()   {
        return view('ejemplares.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $request->validate([
            'isbn' => 'required|min:3|max:255',
            'prestado' => '',
        ]);
        $input = $request->all();
        /*if ($image = $request->file('image')) {
            $imageDestinationPath = 'uploads/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $input['image'] = "$postImage";
        }*/
        Ejemplar::create($input);
        return redirect()->route('ejemplares.index')->with('success','Ejemplar created successfully.');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Ejemplar  $ejemplar
     * @return \Illuminate\Http\Response
     */
    public function show(Ejemplar $ejemplar) {
        return view('ejemplares.show',compact('ejemplar'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ejemplar  $ejemplar
     * @return \Illuminate\Http\Response
     */
    public function edit(Ejemplar $ejemplar)  {
        return view('ejemplares.edit',compact('ejemplar'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ejemplar  $ejemplar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ejemplar $ejemplar) {
        $request->validate([
            'title' => 'required|min:3|max:255',
            'body' => 'required|min:10|max:4096'
        ]);
        $input = $request->all();
        if ($image = $request->file('image')) {
            $imageDestinationPath = 'uploads/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($imageDestinationPath, $postImage);
            $input['image'] = "$postImage";
        } else {
            unset($input['image']);
        }
        $ejemplar->update($input);
        return redirect()->route('ejemplares.index')->with('success','Ejemplar updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ejemplar  $ejemplar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ejemplar $ejemplar) {
        $ejemplar->delete();
        return redirect()->route('ejemplares.index')
            ->with('success','Ejemplar deleted successfully');
    }
}
