# Duna Web Platform Projects

Projeto de API para consultas, utilizando PHP puro 

## Code formatting.

- `npm rum format`

## Usage

- `composer install`

- Complete o arquivo .env com as seguintes informações para uso

```
DB_HOST=
DB_USERNAME=
DB_PASSWORD=
DB_NAME=
FIXED_TOKEN=


```

-  Para rodar o projeto `php -S localhost:8000`



## Endpoints 

- DELETE CONSULTS 

Rota : `/api/consults`
Method: Delete
Authorization: SeuToken

- GET CONSULTS 

Rota : `/api/consults`
Method: GET
Authorization: SeuToken

- PUT CONSULTS 

Rota : `/api/consults/:id`
Method: PUT
Authorization: SeuToken
Body: 
```
   {
    "id":5,
    "user_id":5,
    "date":"10-03-2022"
   }
```


- POST CONSULTS 

Rota : `/api/consults`
Method: POST
Authorization: SeuToken
Body: 
```
   {
    "id":5,
    "user_id":5,
    "date":"10-03-2022"
   }
```


- lOGIN  

Rota : `/api/user`
Method: POST
Authorization: SeuToken
Body: 
```
   {
    "email":"",
    "password":""
   }
```

- POST CONSULTS 

Rota : `/api/users`
Method: POST
Authorization: SeuToken
Body: 
```
   {
    "name":"",
    "email":"",
    "password":""
   }
```
