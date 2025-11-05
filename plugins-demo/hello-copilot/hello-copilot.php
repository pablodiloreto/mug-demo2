<?php
/**
 * Plugin Name: Hello Copilot
 * Plugin URI: https://github.com/pablodiloreto/mug-demo2
 * Description: Un plugin de demostración para celebrar los 30 años del MUG Asociación Civil. Incluye un menú de administración y el shortcode [hola_copilot].
 * Version: 1.0.0
 * Author: MUG Asociación Civil
 * Author URI: https://mug.org.ar
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: hello-copilot
 */

// Evitar acceso directo
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Agregar menú de administración
 */
function hello_copilot_admin_menu() {
    add_menu_page(
        'Hello Copilot',              // Título de la página
        'Hello Copilot',              // Título del menú
        'manage_options',             // Capacidad requerida
        'hello-copilot',              // Slug del menú
        'hello_copilot_admin_page',   // Función callback
        'dashicons-smiley',           // Icono
        30                            // Posición
    );
}
add_action('admin_menu', 'hello_copilot_admin_menu');

/**
 * Renderizar página de administración
 */
function hello_copilot_admin_page() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
        
        <div class="card" style="max-width: 800px; margin-top: 20px;">
            <h2>¡Felices 30 años al MUG Asociación Civil! 🎉</h2>
            <p>Este plugin de demostración celebra tres décadas de la comunidad MUG (Grupo de Usuarios de MySQL) Asociación Civil.</p>
            
            <h3>Características del Plugin:</h3>
            <ul>
                <li><strong>Menú de Administración:</strong> Estás viéndolo ahora mismo.</li>
                <li><strong>Shortcode:</strong> Usa <code>[hola_copilot]</code> en cualquier página o entrada para mostrar un mensaje especial.</li>
            </ul>
            
            <h3>Cómo usar el shortcode:</h3>
            <ol>
                <li>Edita cualquier página o entrada</li>
                <li>Agrega el shortcode: <code>[hola_copilot]</code></li>
                <li>Publica o actualiza</li>
                <li>Visita la página para ver el mensaje</li>
            </ol>
            
            <div style="background: #f0f0f1; padding: 15px; margin-top: 20px; border-left: 4px solid #2271b1;">
                <h4>Ejemplo de salida del shortcode:</h4>
                <?php echo hello_copilot_shortcode(); ?>
            </div>
        </div>
    </div>
    <?php
}

/**
 * Shortcode [hola_copilot]
 */
function hello_copilot_shortcode($atts = [], $content = null) {
    // Atributos del shortcode
    $atts = shortcode_atts(
        array(
            'nombre' => 'visitante',
        ),
        $atts,
        'hola_copilot'
    );
    
    ob_start();
    ?>
    <div class="hello-copilot-message" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 30px; border-radius: 10px; text-align: center; margin: 20px 0;">
        <h2 style="color: white; margin-top: 0;">¡Hola <?php echo esc_html($atts['nombre']); ?>! 👋</h2>
        <p style="font-size: 18px; line-height: 1.6;">
            Bienvenido a la demostración de <strong>Hello Copilot</strong>
        </p>
        <p style="font-size: 16px;">
            🎉 <strong>¡Felices 30 años al MUG Asociación Civil!</strong> 🎉
        </p>
        <p style="font-size: 14px; opacity: 0.9; margin-bottom: 0;">
            Este plugin fue creado con ❤️ para celebrar tres décadas de comunidad y aprendizaje.
        </p>
    </div>
    <?php
    return ob_get_clean();
}
add_shortcode('hola_copilot', 'hello_copilot_shortcode');

/**
 * Agregar estilos al frontend
 */
function hello_copilot_enqueue_styles() {
    // Los estilos están inline en el shortcode para simplificar
    // En un plugin de producción, se cargarían desde un archivo CSS separado
}
add_action('wp_enqueue_scripts', 'hello_copilot_enqueue_styles');

/**
 * Mensaje de activación
 */
function hello_copilot_activation() {
    // Agregar una opción para indicar que el plugin fue activado
    add_option('hello_copilot_activated', true);
}
register_activation_hook(__FILE__, 'hello_copilot_activation');

/**
 * Mensaje de desactivación
 */
function hello_copilot_deactivation() {
    // Limpiar la opción de activación
    delete_option('hello_copilot_activated');
}
register_deactivation_hook(__FILE__, 'hello_copilot_deactivation');

/**
 * Mostrar mensaje después de la activación
 */
function hello_copilot_admin_notice() {
    if (get_option('hello_copilot_activated')) {
        ?>
        <div class="notice notice-success is-dismissible">
            <p><strong>Hello Copilot</strong> ha sido activado. ¡Usa el shortcode <code>[hola_copilot]</code> en tus páginas! 🎉</p>
        </div>
        <?php
        delete_option('hello_copilot_activated');
    }
}
add_action('admin_notices', 'hello_copilot_admin_notice');
