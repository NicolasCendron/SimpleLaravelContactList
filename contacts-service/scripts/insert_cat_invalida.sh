#!/bin/bash

curl -X POST http://localhost:8000/api/contacts \
     -H "Content-Type: application/json" \
     -d '{
           "na,e": "Nicolas",
           "phones": [
             { "number": "51999999999", "phone_type": 1 }
           ],
           "category": "ERRO",
           "id":1         }'
