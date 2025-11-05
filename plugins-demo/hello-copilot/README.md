# Hello Copilot Plugin

Un plugin de demostración de WordPress creado para celebrar los 30 años del MUG Asociación Civil.

## Características

- **Menú de Administración**: Accede a través del panel de WordPress en el menú lateral "Hello Copilot"
- **Shortcode**: `[hola_copilot]` - Muestra un mensaje de bienvenida especial

## Instalación

Este plugin se instala automáticamente cuando inicias el entorno Docker. El directorio `plugins-demo` está montado en WordPress.

## Uso del Shortcode

### Básico
```
[hola_copilot]
```

### Con parámetro personalizado
```
[hola_copilot nombre="Pablo"]
```

Esto mostrará "¡Hola Pablo!" en lugar del saludo genérico.

## Activación

1. Ve a WordPress Admin: http://localhost:8080/wp-admin
2. Navega a Plugins → Plugins instalados
3. Busca "Hello Copilot"
4. Haz clic en "Activar"

## Panel de Administración

Una vez activado, encontrarás un nuevo menú "Hello Copilot" en el panel lateral de WordPress con:
- Información sobre el plugin
- Instrucciones de uso
- Vista previa del shortcode

## Desarrollado para

🎉 **MUG Asociación Civil - 30 Aniversario** 🎉

Con ❤️ por la comunidad de MySQL
