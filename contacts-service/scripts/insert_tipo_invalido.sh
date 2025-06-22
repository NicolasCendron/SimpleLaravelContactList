#!/bin/bash

curl -X POST http://localhost:8000/api/contacts \
     -H "Content-Type: application/json" \
     -d '{
           "name": "Nicolas",
           "phones": [
             { "number": "51999999999", "phone_type": "ERRO" }
           ],
           "category": 1,
           "id":1         }'
