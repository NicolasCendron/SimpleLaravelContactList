#!/bin/bash

curl -X POST http://localhost:8000/api/contatos \
     -H "Content-Type: application/json" \
     -d '{
           "nome": "Rafaela",
           "telefones": [
             { "numero": "51899998989", "tipo_telefone": "FIXO" }
           ],
           "categoria": "PROFISSIONAL",
            "id": 2
         }'
