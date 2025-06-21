<?php

namespace App\Http\Controllers;

use App\Services\ContatoService;
use Illuminate\Http\Request;

class ContatoController
{
    private $contatoService;

    public function __construct(ContatoService $contatoService)
    {
        $this->contatoService = $contatoService;
    }

    public function store(Request $request)
    {
        $contato = $request->all();
        $novoContato = $this->contatoService->insertOrUpdate($contato);
        return response()->json($novoContato, 201);
    }

    public function index()
    {
        $contatos = $this->contatoService->list();
        return response()->json($contatos);
    }

    public function show($id)
    {
        $contato = $this->contatoService->fetch($id);
        
        if (!$contato) {
            return response()->json(['message' => 'Contato nao encontrado'], 404);
        }
        return response()->json($contato);
    }

    public function destroy($id)
    {
        $this->contatoService->destroy($id); 
        return response()->json(['message' => 'Contato removido com sucesso']);
    }
    #destoy_all
    public function destroyAll()
    {
        $this->contatoService->destroy_all();
        return response()->json(['message' => 'Todos os contatos removidos com sucesso']);
    }
}