#!/bin/bash

curl -X POST http://localhost:8000/api/contatos \
     -H "Content-Type: application/json" \
     -d '{
           "nome": "Nicolas",
           "telefones": [
             { "numero": "51999999999", "tipo_telefone": "MOVEL" }
           ],
           "categoria": "ERRO",
           "id":1         }'
