
{{-- Incluye el encabezado común del sitio (header) --}}
@include('layout.header')

{{-- Contenedor principal sin padding --}}
<div class="container-fluid p-0">

    {{-- Sección HERO / portada principal --}}
    <div class="position-relative" style="height: 85vh;">

        {{-- Imagen de fondo a pantalla completa --}}
        <img
            src="https://cdn.pixabay.com/photo/2014/04/02/00/53/bird-of-paradise-flower-302889_1280.jpg"
            class="w-100 h-100"
            style="object-fit: cover; filter: brightness(60%);"
        >

        {{-- Texto centrado sobre la imagen --}}
        <div class="position-absolute top-50 start-50 translate-middle text-center text-white">

            {{-- Título principal --}}
            <h1 class="display-4 fw-bold"
                style="text-shadow: 2px 2px 8px rgba(0,0,0,0.7);">
                El verde que tu espacio necesita.
            </h1>

            {{-- Botón que redirige a la vista productos --}}
            <a
                class="btn btn-dark btn-lg rounded-pill px-5 mt-4"
                href="{{ url('/productos') }}">
                Ver productos
            </a>
        </div>
    </div>
</div>

{{-- 
    SECCIÓN PRODUCTOS DESTACADOS 
    --}}

<div class="container py-5">

    {{-- Título de la sección --}}
    <h2 class="text-center fw-bold mb-5">Productos Destacados</h2>

    {{-- Grid responsive con Bootstrap --}}
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-5">

        {{-- PRODUCTO 1 --}}
        <div class="col">
            <div class="card h-100 shadow-sm">

                {{-- Imagen del producto --}}
                <img
                    src="https://cdn.pixabay.com/photo/2012/06/24/10/00/orchid-50662_1280.jpg"
                    class="card-img-top"
                    style="height: 350px; object-fit: cover;"
                >

                {{-- Contenido del producto --}}
                <div class="card-body text-center">
                    <h5 class="card-title text-dark fw-bold">Orquídea</h5>
                    <p class="text-muted">70.000 $</p>

                    {{-- Botón de compra (placeholder) --}}
                    <a href="#" class="btn btn-dark rounded-pill px-4">Comprar</a>
                </div>
            </div>
        </div>

        {{-- PRODUCTO 2 --}}
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img
                    src="https://cdn.pixabay.com/photo/2020/02/14/15/45/orchid-4848687_1280.jpg"
                    class="card-img-top"
                    style="height: 350px; object-fit: cover;"
                >
                <div class="card-body text-center">
                    <h5 class="card-title text-dark fw-bold">Mini Orquídea</h5>
                    <p class="text-muted">60.000 $</p>
                    <a href="#" class="btn btn-dark rounded-pill px-4">Comprar</a>
                </div>
            </div>
        </div>

        {{-- PRODUCTO 3 --}}
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img
                    src="https://cdn.pixabay.com/photo/2019/12/07/09/06/orchid-4678933_1280.jpg"
                    class="card-img-top"
                    style="height: 350px; object-fit: cover;"
                >
                <div class="card-body text-center">
                    <h5 class="card-title text-dark fw-bold">Orquídea Blanca</h5>
                    <p class="text-muted">50.000 $</p>
                    <a href="#" class="btn btn-dark rounded-pill px-4">Comprar</a>
                </div>
            </div>
        </div>

        {{-- PRODUCTO 4 --}}
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img
                    src="https://cdn.pixabay.com/photo/2014/11/03/23/09/tulips-516018_1280.jpg"
                    class="card-img-top"
                    style="height: 350px; object-fit: cover;"
                >
                <div class="card-body text-center">
                    <h5 class="card-title text-dark fw-bold">Tulipanes</h5>
                    <p class="text-muted">30.000 $</p>
                    <a href="#" class="btn btn-dark rounded-pill px-4">Comprar</a>
                </div>
            </div>
        </div>

    </div>
</div>

{{-- 
    BANNER DE SUSCRIPCIÓN 
    --}}


<div class="container-fluid p-0">
    <div class="position-relative" style="height: 60vh;">

        {{-- Imagen de fondo del banner --}}
        <img
            src="https://cdn.pixabay.com/photo/2015/02/06/19/19/flower-626389_960_720.jpg"
            class="w-100 h-100"
            style="object-fit: cover; filter: brightness(50%);"
        >

        {{-- Texto alineado a la izquierda sobre la imagen --}}
        <div class="position-absolute start-0 top-50 translate-middle-y ps-5">

            <h2 class="text-white fw-bold display-6"
                style="text-shadow: 2px 2px 8px rgba(0,0,0,0.7); max-width: 500px;">
                Cultiva tu pasión por las plantas, descubre nuestra colección exclusiva
            </h2>

            {{-- Botón hacia productos --}}
            <a
                class="btn btn-dark btn-lg rounded-pill px-5 mt-4"
                href="{{ url('/productos') }}">
                Ver productos
            </a>
        </div>
    </div>
</div>

{{-- Incluye el pie de página (footer) --}}
@include('layout.footer')

