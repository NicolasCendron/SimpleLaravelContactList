#!/bin/bash

curl -X DELETE http://localhost:8000/api/contacts/destroy/1 \
     -H "Content-Type: application/json" \
