<?php
// Incluir la conexión a la base de datos y la sesión
include("database.php");
session_start();
// NOTA: Si el catálogo aún no funciona, DESCOMENTA esta línea para ver errores de la DB
// error_reporting(E_ALL); ini_set('display_errors', 1);

// Datos de las 5 herramientas que quieres añadir manualmente
$herramientas_manuales = [
    [
        'nombre' => 'ChatGPT-4',
        'descripcion' => 'Chatbot de OpenAI utilizado para generar ideas, traducir y gestionar tareas. Ofrece mejoras significativas en velocidad y precisión.',
        'categoria' => 'Generación de Texto',
        'precio' => 20.00,
        'imagen_url' => 'https://cdn.kulturegeek.fr/wp-content/uploads/2023/03/ChatGPT-OpenAI-Logo-1024x682.jpg',
        'id' => 'manual_1' // ID ficticio para el formulario
    ],
    [
        'nombre' => 'Claude',
        'descripcion' => 'Asistente de Anthropic ideal para programación y revisiones de código, destacando por su precisión y facilidad de uso.',
        'categoria' => 'Programación / Texto',
        'precio' => 20.00,
        'imagen_url' => 'https://claude.ai/images/opengraph-image@2x.png',
        'id' => 'manual_2'
    ],
    [
        'nombre' => 'You.com',
        'descripcion' => 'Motor de búsqueda impulsado por IA con un chatbot integrado para acompañarte en el proceso de búsqueda y ser más eficiente.',
        'categoria' => 'Búsqueda / Chatbot',
        'precio' => 20.00,
        'imagen_url' => 'https://mspoweruser.com/wp-content/uploads/2023/02/THUMBNAIL_002a.jpg',
        'id' => 'manual_3'
    ],
    [
        'nombre' => 'Rytr',
        'descripcion' => 'Plataforma de IA que ayuda a vendedores y empresarios a dirigir tráfico y generar más conversiones con contenido de formato corto.',
        'categoria' => 'Generación de Contenido',
        'precio' => 7.50,
        'imagen_url' => 'https://th.bing.com/th/id/R.fb36ff266794411704fd3976c36f6f4e?rik=6fFtiaTu%2fstxlQ&riu=http%3a%2f%2fwww.toolpilot.ai%2fcdn%2fshop%2ffiles%2frytrlogo.jpg%3fv%3d1686391683&ehk=wBp%2fo7E6%2fioQSxNjiJcefn%2flxLu0IQhrf0mcGxVTrlc%3d&risl=&pid=ImgRaw&r=0',
        'id' => 'manual_4'
    ],
    [
        'nombre' => 'Tome',
        'descripcion' => 'IA especialista en la creación de presentaciones que combina modelos de texto (GPT) e imágenes (DALL-E 2) para crear narrativas.',
        'categoria' => 'Presentaciones',
        'precio' => 20.00,
        'imagen_url' => 'https://techbriefly.com/wp-content/uploads/2023/01/tome-ai-5.jpg',
        'id' => 'manual_5'
    ]
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>IA para Todos | Guía y Catálogo de Herramientas</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600;800&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>

<header class="hero" id="top">
    <nav class="main-nav">
        <a href="index.php">Inicio</a>
        <a href="#que_es">¿Qué es la IA?</a>
        <a href="#tipos">Tipos</a>
        <a href="#historia">Orígenes</a>
        <a href="#catalogo">Catálogo</a>
        <a href="quienes_somos.html">Quiénes Somos</a>
        <a href="contacto.html">Contacto</a>
        <?php if (isset($_SESSION['rol']) && $_SESSION['rol'] == 'admin'): ?>
            <a href="agregar.php" class="admin-link">➕ Agregar Producto</a>
            <a href="logout.php" class="admin-link">🚪 Salir</a>
        <?php else: ?>
            <a href="loging.php" class="admin-link">🔑 Acceso Admin</a>
        <?php endif; ?>
    </nav>

    <div class="hero-content">
        <h1>🚀 La Inteligencia Artificial: Tu Próximo Paso</h1>
        <p>Aprende, descubre herramientas y transforma tu futuro con la tecnología más avanzada.</p>
        <div class="hero-ctas">
            <a href="#catalogo" class="cta-button primary">Ver Catálogo IA</a>
            <a href="#que_es" class="cta-button secondary">Empezar a Aprender</a>
        </div>
    </div>
</header>

<main>
    <section id="que_es" class="section-container info-section fade-in">
        <h2>¿Qué es la Inteligencia Artificial?</h2>
        <div class="info-grid">
            <div class="info-card">
                <h3>Definición y Objetivo</h3>
                <p>Es la rama de la informática que diseña tecnología que emula la inteligencia humana. Su meta no es reemplazar, sino **contribuir al desarrollo de las capacidades humanas** mejorando la experiencia del usuario y el desempeño en diversas áreas.</p>
                <a href="#funcionamiento" class="btn-card">Saber cómo funciona</a>
            </div>
            <div class="info-card" id="funcionamiento">
                <h3>Cómo Funciona</h3>
                <p>El manejo de **datos es la pieza clave**. Cuantos más datos reciba un sistema de IA, más rápido y eficientemente puede aprender a identificar patrones y generar respuestas. Esto se logra mediante el diseño de algoritmos especializados.</p>
                <a href="#tipos" class="btn-card">Explorar Tipos de IA</a>
            </div>
            <div class="info-card">
                <h3>Contexto Actual (Deep Learning)</h3>
                <p>Hoy se busca que la IA sea capaz de integrar habilidades propias del comportamiento humano (como la empatía) para generar respuestas más personalizadas, usando técnicas avanzadas como el **Aprendizaje Profundo (Deep Learning)**.</p>
                <a href="#historia" class="btn-card">Ver Orígenes</a>
            </div>
        </div>
    </section>

    <section id="tipos" class="section-container tipos-section fade-in">
        <h2>Clasificación de la Inteligencia Artificial</h2>
        <div class="tipos-modulos">
            <div class="tipo-modulo">
                <h4>1. Máquinas Reactivas</h4>
                <p>La forma más básica. No recuerdan ni usan experiencias pasadas. (Ej: Deep Blue).</p>
            </div>
            <div class="tipo-modulo">
                <h4>2. Memoria Limitada</h4>
                <p>Pueden almacenar información transitoriamente para tomar decisiones, pero no aprenden de datos históricos a largo plazo. (Ej: Autos autónomos).</p>
            </div>
            <div class="tipo-modulo">
                <h4>3. Teoría de la Mente</h4>
                <p>Sistemas que pueden comprender el comportamiento, pensamientos y emociones de otros agentes. (Etapa de desarrollo).</p>
            </div>
            <div class="tipo-modulo">
                <h4>4. Autoconciencia</h4>
                <p>El último paso. Sistemas con capacidad de tener conciencia de sí mismos. (Aún teórico).</p>
            </div>
        </div>
    </section>

    <section id="historia" class="section-container timeline-section fade-in">
        <h2>📜 Orígenes y Evolución</h2>
        <div class="timeline">
            <div class="event"><span>1930s</span> Alan Turing introduce el concepto de la **Máquina de Turing**, base teórica del algoritmo.</div>
            <div class="event"><span>1940s</span> Konrad Zuse diseña la primera computadora electrónica digital, la **Z3**.</div>
            <div class="event"><span>1955-1956</span> **John McCarthy acuña el término IA**. Se realiza la Conferencia de Dartmouth.</div>
            <div class="event"><span>1970s</span> Crecimiento en prototipos, como Mycin (diagnóstico de enfermedades) y el lenguaje **PROLOG**.</div>
            <div class="event"><span>Actualidad</span> Crecimiento exponencial en salud, finanzas y comunicación, impulsado por el *Deep Learning*.</div>
        </div>
    </section>

    <section id="catalogo" class="section-container catalogo-section fade-in">
        <h2>🛠️ Catálogo de Herramientas IA</h2>

        <div class="catalogo-grid">
        
        <?php
        // 1. Mostrar las herramientas manuales
        foreach ($herramientas_manuales as $producto) {
            // Se usa htmlspecialchars para prevenir ataques XSS
            echo "<div class='producto-card'>";
            echo "<div class='producto-header'>";
            echo "<img src='" . htmlspecialchars($producto['imagen_url']) . "' alt='" . htmlspecialchars($producto['nombre']) . "'>";
            echo "<span class='categoria-badge'>" . htmlspecialchars($producto['categoria']) . "</span>";
            echo "</div>"; // Cierra producto-header

            echo "<div class='producto-body'>";
            echo "<h3>" . htmlspecialchars($producto['nombre']) . "</h3>";
            echo "<p class='descripcion'>" . htmlspecialchars($producto['descripcion']) . "</p>";
            // Muestra el precio en el formato correcto (con '/mes' para claridad)
            echo "<p class='precio'>Costo: <span class='price-tag'>$" . number_format($producto['precio'], 2) . "/mes</span></p>";
            
            // Formulario para "Pedir este plan"
            echo "<form action='procesar_compra.php' method='POST' class='form-compra'>
                      <input type='hidden' name='id_producto' value='" . $producto['id'] . "'>
                      <input type='hidden' name='precio' value='" . $producto['precio'] . "'>
                      <input type='text' name='nombre_cliente' placeholder='Tu nombre' required>
                      <input type='email' name='email_cliente' placeholder='Tu Email' required>
                      <button type='submit' class='btn-comprar'>💡 Pedir este plan</button>
                  </form>";
            echo "</div>"; // Cierra producto-body
            echo "</div>"; // Cierra producto-card
        }
        
        // 2. Mostrar los productos de la base de datos (tu código original)
        $sql = "SELECT * FROM productos";
        $result = $conn->query($sql);

        if ($result === FALSE) {
            echo "<p class='error-message'>Error al cargar el catálogo de la DB: " . $conn->error . "</p>";
        } elseif ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<div class='producto-card'>";
                // Usa una imagen por defecto si la URL está vacía
                $imagen_url = !empty($row['imagen']) ? htmlspecialchars($row['imagen']) : 'https://via.placeholder.com/280x150?text=Herramienta+IA';
                
                echo "<div class='producto-header'>";
                echo "<img src='" . $imagen_url . "' alt='" . htmlspecialchars($row['nombre']) . "'>";
                echo "<span class='categoria-badge'>" . htmlspecialchars($row['categoria']) . "</span>";
                echo "</div>"; // Cierra producto-header

                echo "<div class='producto-body'>";
                echo "<h3>" . htmlspecialchars($row['nombre']) . "</h3>";
                echo "<p class='descripcion'>" . htmlspecialchars($row['descripcion']) . "</p>";
                echo "<p class='precio'>Costo: <span class='price-tag'>$" . number_format($row['precio'], 2) . "</span></p>";
                
                // Formulario para "Pedir este plan"
                echo "<form action='procesar_compra.php' method='POST' class='form-compra'>
                        <input type='hidden' name='id_producto' value='" . $row['id'] . "'>
                        <input type='hidden' name='precio' value='" . $row['precio'] . "'>
                        <input type='text' name='nombre_cliente' placeholder='Tu nombre' required>
                        <input type='email' name='email_cliente' placeholder='Tu Email' required>
                        <button type='submit' class='btn-comprar'>💡 Pedir este plan</button>
                    </form>";
                echo "</div>"; // Cierra producto-body
                echo "</div>"; // Cierra producto-card
            }
        } else {
            // Si no hay productos en la DB y tampoco se definieron productos manuales, muestra el mensaje
            if (empty($herramientas_manuales)) {
                echo "<p class='no-products'>No hay herramientas registradas aún. ¡Sé el primero en agregar una!</p>";
                echo "<a href='agregar.php' class='cta-button primary'>Ir a Agregar Productos</a>";
            }
        }
        ?>
        </div>
    </section>
    <section id="registro" class="section-container form-section fade-in">
        <h2>📝 Registro de Alumnos</h2>
        <p>Registra a los alumnos para el curso / actividad.</p>
        <form action="procesar_alumnos.php" method="post" class="form-alumnos">
            <label for="nombre_alumno">Nombre:</label>
            <input id="nombre_alumno" type="text" name="nombre" placeholder="Nombre" required />
            <label for="apellido_alumno">Apellido:</label>
            <input id="apellido_alumno" type="text" name="apellido" placeholder="Apellido" required />
            <label for="email_alumno">Correo electrónico:</label>
            <input id="email_alumno" type="email" name="email" placeholder="Correo electrónico" required />
            <label for="carrera_alumno">Carrera:</label>
            <input id="carrera_alumno" type="text" name="carrera" placeholder="Carrera" required />
            <label for="semestre_alumno">Semestre:</label>
            <input id="semestre_alumno" type="text" name="semestre" placeholder="Semestre" required />
            <button type="submit" class="btn-submit">Registrar alumno</button>
        </form>
    </section>

    <section id="contacto" class="section-container form-container fade-in">
        <h2>✉️ Contáctanos</h2>
        <form action="procesar_contacto.php" method="post" class="form-alumnos" style="grid-template-columns: 1fr; max-width: 400px;">
            <label for="nombrec">Nombre:</label>
            <input id="nombrec" type="text" name="nombre" required>
            <label for="emailc">Correo Electrónico:</label>
            <input id="emailc" type="email" name="email" required>
            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="4" required></textarea>
            <button type="submit" class="btn-submit">Enviar Mensaje</button>
        </form>
    </section>

</main>

<footer>
    <p>&copy; 2025 IA para todos. Creado para el TEC de Ecatepec.</p>
</footer>

<button id="backToTop" title="Volver arriba">⬆</button>

<script>
    // Script simple para la animación de fade-in y el botón "Volver arriba"
    document.addEventListener('DOMContentLoaded', () => {
        const sections = document.querySelectorAll('.fade-in');
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.1 });

        sections.forEach(section => {
            observer.observe(section);
        });
        
        const backToTop = document.getElementById('backToTop');
        // Asegurar que el botón existe (aunque lo tienes en el HTML)
        if (backToTop) { 
            backToTop.addEventListener('click', () => {
                window.scrollTo({ top: 0, behavior: 'smooth' });
            });

            window.addEventListener('scroll', () => {
                if (window.scrollY > 300) {
                    backToTop.style.display = 'block';
                } else {
                    backToTop.style.display = 'none';
                }
            });
        }

    });
</script>
</body>
</html>
<?php
// Cierre de la conexión
if (isset($conn) && $conn) {
    $conn->close();
}
?>