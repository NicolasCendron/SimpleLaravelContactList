<?php

namespace App\Http\Controllers;

use App\Services\ContactService;
use Illuminate\Http\Request;

class ContactController
{
    private $contactService;

    public function __construct(ContactService $contactService)
    {
        $this->contactService = $contactService;
    }

    public function store(Request $request)
    {
        $contact = $request->all();
        if ($contact instanceof string){
            $contact = json_decode($contact, true);
        }

        $novocontact = $this->contactService->insertOrUpdate($contact);
        return response()->json($novocontact, 201)
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'POST');;
    }

    public function index()
    {
        $contacts = $this->contactService->list();
        return response()->json($contacts);
    }

    public function show($id)
    {
        $contact = $this->contactService->fetch($id);
        
        if (!$contact) {
            return response()->json(['message' => 'Contact not found'], 404);
        }
        return response()->json($contact);
    }

    public function destroy($id)
    {
        $this->contactService->destroy($id); 
        return response()->json(['message' => 'Contact successfully deleted'])
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'DELETE');;
    }
    #destoy_all
    public function destroyAll()
    {
        $this->contactService->destroy_all();
        return response()->json(['message' => 'All contacts successfully deleted'])
        ->header('Access-Control-Allow-Origin', '*')
        ->header('Access-Control-Allow-Methods', 'DELETE');;
    }
}

        