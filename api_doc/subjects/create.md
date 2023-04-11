## Creación de asignatura

Request
`/api/1.0/students`

```json
{
    "name": "Matemáticas"
}
```

Response HTTP 200
```json
{
    "data": {
        "id": 12,
        "name": "Matemáticas"
    }
}
```

Response 422
```json
{
    "error": {
        "code": "CODE_FORM_ERROR",
        "title": "name",
        "detail": "El nombre es obligatorio"
    }
}
```

Response 500 (error en el servidor)
```json
{
    "error": {
        "code": "GENERAL_ERROR",
        "title": "Ocurrió un error",
        "detail": "Estamos trabajando para solucionarlo."
    }
}
```
