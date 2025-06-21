#!/bin/bash

curl -X DELETE http://localhost:8000/api/contatos/destroy/1 \
     -H "Content-Type: application/json" \
