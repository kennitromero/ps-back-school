## Obtener estudiante
`/api/1.0/students/{studentId}`

No hay request

```json
{}
```

Respuesta 200
```json
{
    "data": {
        "id": 1,
        "document": "63848266",
        "names": "Annie",
        "last_names": "Ruz Estrada"
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

Response 500

```json
{
    "error": {
        "code": "GENERAL_ERROR",
        "title": "Ocurrió un error",
        "detail": "Estamos trabajando para solucionarlo."
    }
}
```
