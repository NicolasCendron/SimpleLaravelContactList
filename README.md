# Microsserviço de Agenda de contacts - Laravel

- https://github.com/NicolasCendron/SimpleLaravelContactList

## Requisitos
- Docker
- Docker Compose

## Como rodar
```bash
docker-compose up --build
```

## Test With Scripts
```bash
Open Scripts and run with Bash

- bash list.sh => List all Contacts
- bash destroy_all.sh => Remove all Contacts
- bash fetch_1.sh => get contact with id 1
- bash fetch_2.sh => get contact with id 2
- bash insert_1.sh => insert contact with id 1
- bash insert_2.sh => insert contact with id 2
- bash destroy_1.sh => delete contact with id 1
- bash insert_cat_invalida.sh => Insert with Wrong Contact Category
- bash insert_tipo_invalido.sh => Insert with Wrong Phone Type
```
# Insert Example

```json
{
   "name":"Nicolas",
   "phones":[
      {
         "number":"+55 (51) 9.9999-9999",
         "phone_type":1
      },
      {
         "number":"+55 (51) 8.8888-8888",
         "phone_type":2
      }
   ],
   "category":1,
   "id":1
}
```


## Next Steps: Solve Frotnend Cors Problem
- I Tried setting up FrontEnd with Vite + Vue but Encountered CORS Problems
- Should return to fix
