<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();        
        return view('usuarios.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
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
            'name' => 'required|max:255',
            'email' => 'required|unique:users|max:255',            
        ]);
        
        $dadosUsuarios = $request->all();
        $dadosUsuarios['password'] = bcrypt('password');
        $insert = User::create($dadosUsuarios);

        if (!$insert)
            return redirect()->route('user.create')->with('error', 'Ocorreu um erro na tentativa de inclusão de um novo usuário');
        
        return redirect()->route('user.index')->with('success', 'Usuário cadastrado com sucesso');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {        
        return view('usuarios.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('usuarios.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $dados = $request->all();
        
        $update = $user->update($dados);

        if (!$update)
            return redirect()->route('user.edit', $user)->with('error', 'Ocorreu um erro na tentativa de edição do usuário');
            
        return redirect()->route('user.index')->with('success', 'Usuário alterado com sucesso');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $deletar = $user->delete();

        if (!$deletar)
            return redirect()->route('user.index')->with('error', 'Ocorreu um erro na tentativa de exclusão do usuário');
        
        return redirect()->route('user.index')->with('success', 'Usuário deletado com sucesso');
    }
}
