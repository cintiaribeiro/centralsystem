<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Noticia;
use Illuminate\Http\Request;

class NoticiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticia::all();
        
        return view('noticias.index', compact('noticias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noticias.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'titulo' => 'required|max:255',
            'noticia' => 'required',            
        ]);
        
        $dadosNoticia = $request->all();

        $insert = auth()->user()->noticias()->create($dadosNoticia);

        if (!$insert)
            return redirect()->route('news.create')->with('error', 'Ocorreu um erro na tentativa de inclusão de uma nova notícia');
        
        return redirect()->route('news.index')->with('success', 'Notícia cadastrada com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Noticia  $news
     * @return \Illuminate\Http\Response
     */
    public function show(Noticia $news)
    {
        return view('noticias.show', compact('news'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function edit(Noticia $news)
    {
        return view('noticias.edit', compact('news'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Noticia $news)
    {
        $dados = $request->all();

        $update = $news->update($dados);

        if (!$update)
            return redirect()->route('news.edit', $news)->with('error', 'Ocorreu um erro na tentativa de edição da noticia');
            
        return redirect()->route('news.index')->with('success', 'Notícia alterada com sucesso');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Noticia  $noticia
     * @return \Illuminate\Http\Response
     */
    public function destroy(Noticia $news)
    {
        $deletar = $news->delete();

        if (!$deletar)
            return redirect()->route('news.index')->with('error', 'Ocorreu um erro na tentativa de exclusão da notícia');
        
        return redirect()->route('news.index')->with('success', 'Notícia deletada com sucesso');
    }
}
