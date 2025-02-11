<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- esta vista es la plantilla base -->
     <main>
        <div class="container py-4">
            @yield('contentido')
            <!-- Aqui aparecerá lo que pongas en las vistas -->
            
            <footer class="pt-3 mt-4 text-muted border-top">
                IES Juan Bosco
            </footer>
        </div>
     </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>