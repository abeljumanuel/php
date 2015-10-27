<!DOCTYPE html>
 
<html lang="es">
 
<head>
<title>Titulo de la web</title>
<meta charset="utf-8" />
<link rel="stylesheet" href="estilos.css" />
<link rel="shortcut icon" href="/favicon.ico" />
<link rel="alternate" title="Pozolería RSS" type="application/rss+xml" href="/feed.rss" />
</head>
 
<body>
    <header>
       <h1>Numero Romanos</h1>
       <p>Numero Romanos para CIER</p>
    </header>
    <section>
       <article>
           <h2>Formulario<h2>
           <form action="proceso.php" method="post">
			  Ingrese un numero que pertenezca a los numeros Naturales:<br>
			  <input id="numero" type="number" name="numero" min="1">
			</form>
		</article>
    </section>
    <aside>
       <h3>Conversion a Romanos</h3>
           <p>Respuesta</p>
    </aside>
    <footer>
        Desarrollado 17 Julio 2015
    </footer>
</body>
</html>


