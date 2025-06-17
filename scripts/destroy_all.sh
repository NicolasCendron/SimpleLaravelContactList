#!/bin/bash

curl -X DELETE http://localhost:8000/api/contatos/destroy_all \
     -H "Content-Type: application/json" \

