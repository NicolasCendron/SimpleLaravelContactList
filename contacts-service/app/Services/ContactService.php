<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use App\Enums\ContactCategory;
use App\Enums\PhoneType;

class ContactService
{
    private $cacheKey = 'contacts';


    public function insertOrUpdate(array $contact)
    {
        $contacts = Cache::get($this->cacheKey, []);

        $id = $contact['id'] ?? count($contacts) + 1; // gera um ID se não for fornecido
        $contact['id'] = $id;
        $contacts[$id] = $contact;


        if (!isset($contact['category']) || !ContactCategory::tryFrom($contact['category'])) {
            return [
                'error' => 'Invalid Contact Category.'
            ];
        }
        
        if (!isset($contact['name']) || empty($contact['name'])) {
            return [
                'error' => 'Please provide a contact name.'
            ];
        }
        $contact['name'] = trim($contact['name']);

        #Para cada telefone no array phones, verifica se o tipo é válido

        if (!isset($contact['phones']) || !is_array($contact['phones']) || count($contact['phones']) < 1) {
            return [
                'error' => 'phones must be an array with at least one registry.'
            ];
        }
    
        foreach ($contact['phones'] as $telefone) {

            if (!isset($telefone['phone_type']) || !PhoneType::tryFrom($telefone['phone_type'])) {
                return [
                    'error' => 'Invalid Phone Type.'
                ];
            }
            if(!isset($telefone['number']) || empty($telefone['number'])) {
                return [
                    'error' => 'Please provide Phone Number.'
                ];
            }
        }

    
        Cache::put($this->cacheKey, $contacts, 3600); // guarda por 1 hora
        echo "Contact Inserted Successfully => ";
        echo json_encode($contact, JSON_PRETTY_PRINT);
        return $contact;
    }

    public function list()
    {
        return array_values(Cache::get($this->cacheKey, []));
    }

    public function fetch($id)
    {
        $contacts = Cache::get($this->cacheKey, []);
        return $contacts[$id] ?? null;
    }

    #destroy
    public function destroy($id)
    {
        $contacts = Cache::get($this->cacheKey, []);
        if (isset($contacts[$id])) {
            unset($contacts[$id]);
            Cache::put($this->cacheKey, $contacts, 3600); // guarda por 1 hora
        } 
    }

    #destroy_all
    public function destroy_all()
    {
        Cache::forget($this->cacheKey); // remove todos os contacts do cache
    }
    
}