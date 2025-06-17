<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use App\Enums\CategoriaContato;
use App\Enums\TipoTelefone;

class ContatoService
{
    private $cacheKey = 'contatos';


    public function insertOrUpdate(array $contato)
    {
        $contatos = Cache::get($this->cacheKey, []);

        $id = $contato['id'] ?? count($contatos) + 1; // gera um ID se não for fornecido
        $contato['id'] = $id;
        $contatos[$id] = $contato;


        if (!isset($contato['categoria']) || !CategoriaContato::tryFrom(strtoupper($contato['categoria']))) {
            return [
                'error' => 'Categoria invalida. Use PESSOAL, PROFISSIONAL ou OUTRO.'
            ];
        }
        $contato['categoria'] = strtoupper($contato['categoria']);

        
        if (!isset($contato['nome']) || empty($contato['nome'])) {
            return [
                'error' => 'Nome é obrigatório.'
            ];
        }
        $contato['nome'] = trim($contato['nome']);

        #Para cada telefone no array telefones, verifica se o tipo é válido

        if (!isset($contato['telefones']) || !is_array($contato['telefones']) || count($contato['telefones']) < 1) {
            return [
                'error' => 'Telefones deve ser um array e deve conter ao menos um telefone.'
            ];
        }
    
        foreach ($contato['telefones'] as $telefone) {

            if (!isset($telefone['tipo_telefone']) || !TipoTelefone::tryFrom(strtoupper($telefone['tipo_telefone']))) {
                return [
                    'error' => 'Tipo de telefone invalido. Use MOVEL, FIXO ou OUTRO.'
                ];
            }
            if(!isset($telefone['numero']) || empty($telefone['numero'])) {
                return [
                    'error' => 'Número de telefone é obrigatório.'
                ];
            }
            $telefone['tipo_telefone'] = strtoupper($telefone['tipo_telefone']);
        }

    
        Cache::put($this->cacheKey, $contatos, 3600); // guarda por 1 hora
        echo "Contato adicionado com sucesso => ";
        echo json_encode($contato, JSON_PRETTY_PRINT);
        return $contato;
    }

    public function list()
    {
        return array_values(Cache::get($this->cacheKey, []));
    }

    public function fetch($id)
    {
        $contatos = Cache::get($this->cacheKey, []);
        return $contatos[$id] ?? null;
    }

    #destroy
    public function destroy($id)
    {
        $contatos = Cache::get($this->cacheKey, []);
        if (isset($contatos[$id])) {
            unset($contatos[$id]);
            Cache::put($this->cacheKey, $contatos, 3600); // guarda por 1 hora
        } 
    }

    #destroy_all
    public function destroy_all()
    {
        Cache::forget($this->cacheKey); // remove todos os contatos do cache
    }
    
}