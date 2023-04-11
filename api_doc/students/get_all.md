## Obtener estudiantes

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
            "document": "63848266",
            "names": "Annie",
            "last_names": "Ruz Estrada"
        },
        {
            "id": 2,
            "document": "63848266",
            "names": "Juan",
            "last_names": "Pérez Rodríguez"
        }
    ]
}
```

Respuesta 400

```json
{
  "error": {
    "code": "CODE_THERE_ARE_NO_STUDENTS",
    "title": "No hay estudiantes",
    "detail": "No se han registrado estudiantes"
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
