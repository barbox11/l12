<!doctype html>
<html lang="es">
<head>
    {{-- =============================== --}}
    {{-- METADATOS BÁSICOS DEL DOCUMENTO --}}
    {{-- =============================== --}}

    {{-- Codificación de caracteres (acentos, ñ, etc.) --}}
    <meta charset="utf-8">

    {{-- Permite que el sitio sea responsive en móviles --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Título que aparece en la pestaña del navegador --}}
    <title>Sistema UNISARC - Plantas y Macetas</title>

    {{-- =============================== --}}
    {{-- BOOTSTRAP CSS --}}
    {{-- =============================== --}}

    {{-- Cargamos Bootstrap 5 desde CDN --}}
    <link 
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
        rel="stylesheet"
    >

    {{-- =============================== --}}
    {{-- CSS PERSONALIZADO DEL PROYECTO --}}
    {{-- =============================== --}}

    {{-- 
        asset() apunta a la carpeta public/
        public/css/estilos.css
    --}}
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
</head>

<body>

{{-- =============================== --}}
{{-- BARRA DE NAVEGACIÓN (NAVBAR) --}}
{{-- =============================== --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-lg">
    
    {{-- container-fluid ocupa todo el ancho --}}
    <div class="container-fluid px-4">

        {{-- =============================== --}}
        {{-- LOGO / MARCA --}}
        {{-- =============================== --}}
        <a class="navbar-brand fw-bold fs-4" href="{{ url('/inicio') }}">
            
            {{-- Imagen del logo --}}
            <img 
                src="https://i.pinimg.com/736x/a1/e7/be/a1e7be1b7c3e5040d7170c01e8c62b36.jpg"
                alt="logo"
                class="me-2"
                style="border-radius: 50%; width: 50px; height: 50px;">
        </a>

        {{-- =============================== --}}
        {{-- BOTÓN TOGGLE (MENÚ MÓVIL) --}}
        {{-- =============================== --}}
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

        {{-- =============================== --}}
        {{-- MENÚ DE NAVEGACIÓN --}}
        {{-- =============================== --}}
        <div class="collapse navbar-collapse" id="navbarNav">

            {{-- ms-auto → empuja el menú a la derecha --}}
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
