#!/bin/bash

curl -X POST http://localhost:8000/api/contacts \
     -H "Content-Type: application/json" \
     -d '{
           "name": "Nicolas",
           "phones": [
             { "number": "+55 (51) 9.9999-9999", "phone_type": 1 },
             { "number": "+55 (51) 8.8888-8888", "phone_type": 2 }
           ],
           "category": 1,
           "id":1         }'
