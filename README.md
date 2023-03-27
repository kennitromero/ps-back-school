## About Laravel

Proyecto final del Curso Backend Developer.

Se trata de una API para guardar los registro de notas y cursos
por los cuales pasa un estudiante en su formación escolar.

Modelo de base de datos: https://docs.google.com/spreadsheets/d/1DCzT6JaY8vq_Nxo5332U6KvAY-o-SPJ29okwyvGyLsk/edit?usp=sharing

Esta API tendrá las siguientes funcionalidades

- Gestión de estudiantes, permitirá registrar la información básica de un estudiante. Se pedirá la siguiente
  información:
    - Nombre
    - Apellidos
    - Número de documento (no pueden existir dos números iguales)
- Debe existir grupos predefinidos de 1° a 11°
- Debe existir unas generaciones (años estudiantiles) creados, desde el 2022 a 2030
- Asignación de estudiantes: recibirá un grupo de estudiantes, un grado, un grupo y un año lectivo (generación)
- Gestión de asignaturas, solo se guardará el nombre de la asignatura
- Asignación de asignaturas a cursos
- Gestión de actividades a las respectivas asignaturas
- Registro de calificaciones

## Contratos

### Gestión de estudiantes

- Creación y actualización de estudiante
```json
{
  "request": {
    "document": "10653211",
    "names": "Annie",
    "lastnames": "Ruz Estrada"
  },
  "response:": {
    "200": {
      "data":{
          "id": 1,
          "names": "Annie",
          "lastnames": "Ruz Estrada"
        }
    },
    "422": [
      {
        "error": {
          "code": "CODE_FORM_ERROR",
          "title": "document",
          "detail": "El documento debe ser numérico"
        }
      },
      {
        "error": {
          "code": "CODE_FORM_ERROR",
          "title": "document",
          "detail": "El documento es obligatorio"
        }
      },
      {
        "error": {
          "code": "CODE_FORM_ERROR",
          "title": "names",
          "detail": "El nombre es obligatorio"
        }
      },
      {
        "error": {
          "code": "CODE_FORM_ERROR",
          "title": "last_names",
          "detail": "El apellido es obligatorio"
        }
      }
    ],
    "400": [
      {
        "error": {
          "code": "CODE_DOCUMENT_USED",
          "title": "Documento ya registrado",
          "detail": "Ya existe un estudiante registrado con ese documento"
        }
      }
    ],
    "500": {
      "error": {
        "code": "GENERAL_ERROR",
        "title": "Ocurrió un error",
        "detail": "Estamos trabajando para solucionarlo."
      }
    }
  }
}
```
- Obtener estudiantes

```json
{
  "request": {},
  "response:": {
    "200": {
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
    },
    "400": [
      {
        "error": {
          "code": "CODE_THERE_ARE_NO_STUDENTS",
          "title": "No hay estudiantes",
          "detail": "No se han registrado estudiantes"
        }
      }
    ],
    "500": {
      "error": {
        "code": "CODE_GENERAL_ERROR",
        "title": "Ocurrió un error",
        "detail": "Estamos trabajando para solucionarlo."
      }
    }
  }
}
```


## Tareas realizadas para este proyecto.
