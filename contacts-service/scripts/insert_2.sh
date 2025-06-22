#!/bin/bash

curl -X POST http://localhost:8000/api/contacts \
     -H "Content-Type: application/json" \
     -d '{
           "name": "Rafaela",
           "phones": [
             { "number": "+55 (51) 8.9999-8989", "phone_type": 1 }
           ],
           "category": 2,
           "id": 2
         }'
