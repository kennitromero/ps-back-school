## Actualización de estudiante

Request
`/api/1.0/students/{studentId}`

```json
{
    "names": "Annie",
    "lastnames": "Ruz Estrada"
}
```

Response HTTP 200
```json
{
    "data": {
        "id": 1,
        "document": "123",
        "names": "Annie",
        "lastnames": "Ruz Estrada"
    }
}
```

Respuesta 400
```json
{
  "error": {
      "code": "CODE_THERE_NOT_EXIST_STUDENT_WITH_THIS_ID",
      "title": "No existe estudiante",
      "detail": "No existe estudiante con el Id suministrado."
  }
}
```

Response 422 (no se puede procesar la petición)
```json
{
    "error": {
        "code": "CODE_FORM_ERROR",
        "title": "names",
        "detail": "El nombre es obligatorio"
    }
}
```
```json
{
    "error": {
        "code": "CODE_FORM_ERROR",
        "title": "last_names",
        "detail": "El apellido es obligatorio"
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
