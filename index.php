<?php
    session_start();
    require ('certificado.php');
?>
<!DOCTYPE html>
<html lang="es-CO" class="h-100" data-bs-theme="dark">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Softparty_Certificados</title>
    <meta name="theme-color" content="#31817a">
    <meta name="MobileOptimized" content="width">
    <meta name="HandhledFriendly" content="true">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-traslucent">

    <!--Tags SEO-->
    <meta name="author" content="Softparty - ASEM - Programación de Software">
    <meta name="description" content="Aplicativo Web SoftParty, Centro de la Innovación, la Agroindustria y la Avación">
    <meta name="keywords"
        content="SENA, sena, Sena, Aplicativo, web, aplicativo, SOFTPARTY, SoftParty, softparty, Programación de Software, programación de software, Evento, evento, Rionegro, rionegro">
    <!--Favicons-->
    <link href="../assets/img/web_512x512.png" rel="icon" type="image/x-icon">
	<link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon" type="image/png">
	<link href="./assets/img/apple-touch-icon.png" rel="apple-touch-startup-image" type="image/png">

    <!--Styles Bootstrap 5.3.1-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <script type="text/javascript" src="../assets/js/bootstrap.bundle.min.js"></script>

    <script>
    // EVITAR REENVIO DE DATOS.
        if (window.history.replaceState) { // verificamos disponibilidad
        window.history.replaceState(null, null, location.href);
    }
    </script>
</head>

<body class="py-3 bg-cert h-100">

    <main class="pt-5 my-5 form-signin w-100 m-auto">

        <div class="card" style="background-color:#212529d1;">
            <div class="card-header text-center">
                <div class="row">
                    <div class="col">
                        <img class="mb-2" src="../assets/img/logosp.png" alt="Logo Sena" style="height: 48px">
                    </div>
                </div>
                <div class="text-center">
                    <h1 class="display-6 mb-0">Certicados</h1>
                    <div class="subheading-1 mb-2">ASEM</div>
                </div>
                <div class="card-body">
                    <?php if (is_array($mens)) { ?>
                        <div class="alert alert-<?php echo $mens[1]; ?> alert-dismissible">
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            <strong><?php echo $mens[0]; ?> !</strong>
                        </div>
                    <?php } ?>                    <form action="" method="post" enctype="application/x-www-form-urlencoded">
                        <div class="input-group mb-2 mt-3">
                            <span class="input-group-text"><i class="bi bi-person-vcard-fill"></i></span>
                            <input type="text" id="documento" name="documento" class="form-control"
                                placeholder="Digita tú documento" required autofocus autocomplete='off' onkeypress="return event.charCode >= 48 && event.charCode <= 57"/>
                        </div>
                        <div class="input-group mb-3">
                            <label for="aviso">Puedes Generar o Descargar tu certificado de asistencia al SoftParty.</label>
                        </div>
                        <div class="btn-group mx-auto w-100 py-3">
                            <button type="submit" class="btn btn-primary" name="generar">Generar</button>
                            <button type="button" onclick="location.href='https://sites.google.com/view/softparty/certificado'" onclick="closewindows()" class="btn btn-warning">Volver</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <footer class="text-center">
        <strong>©Softparty
            <script>document.write(new Date().getFullYear());
        function closewindows(){
              windows.close()
          }</script>
        </strong>
    </footer>
   
</body>

</html>