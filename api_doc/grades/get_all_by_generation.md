## Obtener grados de una generación

No hay request

```json
{}
```

Respuesta 200
```json
{
    "data": [
        {
            "id": 1,
            "grade": 10
        },
        {
            "id": 2,
            "grade":11
        }
    ]
}
```

Respuesta 400

```json
{
  "error": {
    "code": "CODE_THERE_ARE_NO_GRADES",
    "title": "No hay grados",
    "detail": "No se registra el grado"
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
