<?php

namespace App\Http\Controllers;

use App\Comic;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        /* $comics = Comic::all(); per vederli tutti sulla stessa pagina*/
        $comics = Comic::paginate(5);

        /* dump('$comics'); */
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $new_comic = new Comic();
        $new_comic->title = $data['title'];
        $new_comic->slug= Str::slug($data['title'], '-');
        $new_comic->description=$data['description'];
        $new_comic->image=$data['image'];  
        $new_comic->series=$data['series'];
        $new_comic->type=$data['type'];
        $new_comic->price=$data['price'];
        $new_comic->date=$data['date'];
        $new_comic->save();
        //dd($data);
        return redirect()->route('comics.show', $new_comic);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $comic = Comic::find($id);
        /* return view('comics.show', compact('comic')); */
        if($comic){
            return view('comics.show', compact('comic'));
        }
        abort(404,'Fumetto non presente nel database!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comic = Comic::find($id);
        /* return view('comics.edit', compact('comic')); */
        if($comic){
            return view('comics.edit', compact('comic'));
        }
        abort(404,'Fumetto non presente nel database!');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comic $comic)
    {
        //leggo il dato in arrivo dal form
        $data = $request->all();
        //dd($data);
        //seleziono la riga della tabella da aggiornare
        //$comic = Comic::find($id); --> $comic è l'entità originale non ancora sovrascritta
        $data['slug'] = Str::slug($data['title'],'-');
        $comic->update($data); 

        return redirect()->route('comics.show', $comic);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return redirect()->route('comics.index')->with('deleted',$comic->title); // serve a dare il messaggio che hai cancellato correttamente l'elemento
        
    }
}
