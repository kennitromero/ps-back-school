## Actualización de Materia

Request
`/api/1.0/subjects/{subjectId}`

```json
{
    "name": "Matemáticas"
}
```

Response HTTP 200
```json
{
    "data": {
        "id": 1,
        "name": "Matemáticas"
           }
}
```

Respuesta 400
```json
{
  "error": {
      "code": "CODE_THERE_NOT_EXIST_STUDENT_WITH_THIS_ID",
      "title": "No existe materia",
      "detail": "No existe materia con el Id suministrado."
  }
}
```

Response 422 (no se puede procesar la petición)
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