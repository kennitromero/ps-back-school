## Creación de estudiante

Request
`/api/1.0/students`

```json
{
    "document": "10653211",
    "names": "Annie",
    "lastnames": "Ruz Estrada"
}
```

Response HTTP 200
```json
{
    "data": {
        "id": 1,
        "names": "Annie",
        "lastnames": "Ruz Estrada"
    }
}
```

Respuesta 400

```json
{
  "error": {
    "code": "CODE_THERE_ALREADY_STUDENT_WITH_DOCUMENT",
    "title": "Documento ya existente",
    "detail": "Estudiante con documento ya existente."
  }
}
```

Response 422 (no se puede procesar la petición)
```json
{
    "error": {
        "code": "CODE_FORM_ERROR",
        "title": "document",
        "detail": "El documento es obligatorio"
    }
}
```
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
