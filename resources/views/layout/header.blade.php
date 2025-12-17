<!doctype html>
<html lang="es">
<head>
    {{-- 
    METADATOS BÁSICOS DEL DOCUMENTO 
    --}}

    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sistema UNISARC - Plantas y Macetas</title>


    {{-- Cargamos Bootstrap 5 desde CDN --}}
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >
<link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>

<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-lg">
    
    {{-- container-fluid ocupa todo el ancho --}}
    <div class="container-fluid px-4">

        <a class="navbar-brand fw-bold fs-4" href="{{ url('/inicio') }}">
            
            {{-- Imagen del logo --}}
            <img 
                src="https://i.pinimg.com/736x/a1/e7/be/a1e7be1b7c3e5040d7170c01e8c62b36.jpg"
                alt="logo"
                class="me-2"
                style="border-radius: 50%; width: 50px; height: 50px;">
        </a>
        {{--modo movil po si se necesita--}} 
        <button 
            class="navbar-toggler" 
            type="button" 
            data-bs-toggle="collapse" 
            data-bs-target="#navbarNav"
            aria-controls="navbarNav" 
            aria-expanded="false" 
            aria-label="Toggle navigation">

            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">

            <ul class="navbar-nav ms-auto">

                {{-- ENLACE A INICIO --}}
                <li class="nav-item">
                    <a class="nav-link fs-5" href="{{ url('/inicio') }}">
                        Inicio
                    </a>
                </li>

                {{-- ENLACE A PRODUCTOS --}}
                <li class="nav-item">
                    <a class="nav-link fs-5" href="{{ url('/productos') }}">
                        Productos
                    </a>
                </li>

            </ul>
        </div>
    </div>
</nav>
