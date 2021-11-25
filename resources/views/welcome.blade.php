<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Zoo Center</title>
    <link rel="shortcut icon" href="img/perrito.ico" type="image/x-icon">
    <link rel="stylesheet" href="css/estilos.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700,800&display=swap" rel="stylesheet"> 
</head>

<body>
    <header>
        <nav>
            <a href="#">Inicio</a>
            <a href="{{ route('login') }}">Login</a>
            <a href="#">Portafolio</a>
            <a href="#">Servicios</a>
            <a href="·">Contacto</a>
        </nav>
        <section class="textos-header">
            <h1>Bienvenidos al Hospital Veterinario Zoo Center</h1>
            <h2>Estamos al servicio de tu mascota. Todos los dias y a Toda hora</h2>
        </section>
        <div class="wave" style="height: 150px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none"
                style="height: 100%; width: 100%;">
                <path d="M0.00,49.98 C150.00,150.00 349.20,-50.00 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
                    style="stroke: none; fill: #fff;"></path>
            </svg></div>
    </header>
    <main>
        <section class="contenedor sobre-nosotros">
            <h2 class="titulo">Nosotros</h2>
            <div class="contenedor-sobre-nosotros">
                <img src="img/ilustracion1.svg" alt="" class="imagen-about-us">
                <div class="contenido-textos">
                    <h3><span>1</span>Misión</h3>
                    <p>Garantizar la calidad de vida de nuestros pacientes mediante el equipamiento y consolidación de recursos humanos de alto nivel técnico-científico que promuevan la conciencia social en el cuidado y respeto hacia los animales y la naturaleza, demostrando eficiencia en la prevención, diagnóstico y tratamiento de enfermedades que afectan a los animales de compañía.</p>
                    <h3><span>2</span>Visión</h3>
                    <p>Ser un centro veterinario de referencia a nivel local y nacional en la prevención, diagnóstico y tratamiento oportuno de enfermedades propias de nuestros pacientes, siendo socialmente reconocidos por aportar de modo técnico científico al sector veterinario y promover la tenencia responsable de mascotas.</p>
                </div>
            </div>
        </section>
        <section class="portafolio">
            <div class="contenedor">
                <h2 class="titulo">Nuestros Servicios</h2>
                <div class="galeria-port">
                    <div class="imagen-port">
                        <img src="img/interna.png" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Medicina Interna Veterinaria</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/especialidad.png" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Especialidades Veterinarias</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/medicina.png" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Medicina Preventiva</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/cuidados.png" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Cuidados Intensivos</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/laboratorio.png" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Laboratorio Clinico</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/diagnostico.png" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Diagnostico Por Imagen</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/emergencias.png" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Emergencia</p>
                        </div>
                    </div>
                    <div class="imagen-port">
                        <img src="img/nutricion.png" alt="">
                        <div class="hover-galeria">
                            <img src="img/icono1.png" alt="">
                            <p>Nutricion</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="clientes contenedor">
            <h2 class="titulo">Que dicen nuestros clientes</h2>
            <div class="cards">
                <div class="card">
                    <img src="img/face1.jpg" alt="">
                    <div class="contenido-texto-card">
                        <h4>Nazareth Ordoñez</h4>
                        <p>es una excelente clínica y Dany el mejor veterinario del mundo!!! salvo a mi perra Zarpa la cual le adora!!</p>
                    </div>
                </div>
                <div class="card">
                    <img src="img/face2.jpg" alt="">
                    <div class="contenido-texto-card">
                        <h4>Bianca Ayala</h4>
                        <p>Excelentes precios.. en castraciones como en vacunas..
                            Muy buenos profesionales.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="about-services">
            <div class="contenedor">
                <h2 class="titulo">Otros Servicios</h2>
                <div class="servicio-cont">
                    <div class="servicio-ind">
                        <img src="img/cardio.png" alt="">
                        <h3>Cardiologia Veterinaria</h3>
                        <p>La cardiología es muy importante para conseguir que nuestras mascotas tengan una mejor calidad de vida y prevenir la aparición de problemas cardiovasculares o tratando los existentes.</p>
                    </div>
                    <div class="servicio-ind">
                        <img src="img/trauma.png" alt="">
                        <h3>Traumatología Veterinaria</h3>
                        <p>Realizamos los servicios de diagnóstico y tratamientos de las posibles alteraciones del sistema musculoesquelético de mascotas. Para su diagnóstico en nuestras instalaciones contamos con las últimas tecnologías.</p>
                    </div>
                    <div class="servicio-ind">
                        <img src="img/exotico.png" alt="">
                        <h3>Animales no Convencionales</h3>
                        <p>Nuestro servicio veterinario para animales exóticos dispone de un equipamiento diagnóstico adaptado a estas mascotas, incluyendo radiología, ecografía y analíticas sanguíneas.</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <footer>
        <div class="contenedor-footer">
            <div class="content-foo">
                <h4>Phone</h4>
                <p>75054466</p>
            </div>
            <div class="content-foo">
                <h4>Email</h4>
                <p>fac.ficct@uagrm.edu</p>
            </div>
            <div class="content-foo">
                <h4>Location</h4>
                <p>Avenida El Trompillo 1039, Santa Cruz de la Sierra</p>
            </div>
        </div>
        <h2 class="titulo-final">&copy; Domeki Design | Freddy Arriaga Cruz</h2>
    </footer>
</body>

</html>