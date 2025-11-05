# mug-demo2

## ¡Felices 30 años al MUG Asociación Civil! 🎉

Este proyecto es una demostración de WordPress con Docker para celebrar el 30º aniversario del MUG (Grupo de Usuarios de MySQL) Asociación Civil.

## Requisitos

- Docker
- Docker Compose

## Configuración

1. Copiar el archivo de ejemplo de variables de entorno:
```bash
cp .env.example .env
```

2. Iniciar los contenedores:
```bash
docker-compose up -d
```

3. Acceder a los servicios:
- **WordPress**: http://localhost:8080
- **phpMyAdmin**: http://localhost:8081

## Servicios

- **WordPress**: latest
- **MySQL**: 8
- **phpMyAdmin**: latest

## Credenciales por defecto

- Base de datos: `wp`
- Usuario: `wp`
- Contraseña: `wp`

## Plugin Demo

El directorio `./plugins-demo` contiene plugins personalizados que se montan automáticamente en WordPress.

### Hello Copilot Plugin

Plugin de demostración que incluye:
- Menú de administración
- Shortcode `[hola_copilot]`

## Detener los contenedores

```bash
docker-compose down
```

## Limpiar volúmenes (elimina todos los datos)

```bash
docker-compose down -v
```