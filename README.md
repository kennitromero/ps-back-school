## School Project

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


## Tareas realizadas para este proyecto.
- Creación de base de datos
  - Tabla estudiantes, Abner ✅
  - Tabla grados, Cristian ✅
  - Tabla generaciones, Keily ✅
  - Tabla grados con estudiantes, Esteban
  - Tabla asignaturas, Kevin ✅
  - Tabla grados y asignaturas, Jose
  - Tabla actividades, Samuel
- Creación de Seeders
  - Seeder de 10 estudiantes, Abner ✅
  - Seeder de 20 asignaturas, Kevin ✅
  - Seeder de la tabla grados, Cristian ✅
  - Seeder de la tabla generación, Keily
  - Seeder de actividades, Samuel
- Gestión de estudiantes
  - Crear, con validaciones y pruebas end-to-end: Abner
  - Actualizar Jose, con validaciones y pruebas end-to-end: Jose
- API asignación de estudiantes: Esteban
- API asignaturas: Kevin
- API asignación de asignaturas: Samuel
- Gestión de Actividades
  - API para crear actividad: Cristian
  - API para actualizar actividad: LIBRE
- Agregar capa de Repository

## Convenciones
- Nombre de la base datos: school
- Todas las tablas serán snake_case, ej: grades_subjects
- Todos los modelos van en singular, al igual que los factories
- Los seeders van en plural, ejemplo StudentsSeeder, SubjectsSeeder
- Todos los endpoints que se desarrollen deben tener
  - Definición del contrato de entrada y de salida
  - Agregar contrato a la documentación del README.md
  - Crear la ruta, el controlador y la lógica respectiva
  - Agregarle validaciones respectivas según corresponda
  - Agregar pruebas end-to-end
