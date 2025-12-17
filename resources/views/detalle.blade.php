
@include('layout.header')


{{-- 
    CONTENIDO PRINCIPAL DE LA PÁGINA
--}}
<div class="container py-5">

    {{-- TÍTULO PRINCIPAL --}}
    <h1 class="mb-4">
        Producto SKU: {{ $producto->sku }}
    </h1>

    {{-- FILA PRINCIPAL --}}
    <div class="row">

        {{-- 
            COLUMNA IMAGEN
        --}}
        <div class="col-md-6">

            <img
                src="{{ asset('img/' . $producto->sku . '.jpg') }}"
                alt="{{ $producto->nombre }}"
                class="img-fluid rounded"
                onerror="this.src='{{ asset('img/no-image.png') }}'">
        </div>

        {{-- 
            COLUMNA INFORMACIÓN
        --}}
        <div class="col-md-6">

            {{-- NOMBRE DEL PRODUCTO --}}
            <h2>{{ $producto->nombre }}</h2>

            {{-- SKU --}}
            <p class="text-muted">
                SKU: {{ $producto->sku }}
            </p>

            {{-- DESCRIPCIÓN --}}
            <div class="mt-3 mb-3">
                <h5>Descripción:</h5>

                {{-- Si la descripción viene vacía, mostramos texto por defecto --}}
                <p>
                    {{ $producto->descripcion ?? 'Sin descripción' }}
                </p>
            </div>

            {{-- PRECIO --}}
            <h3 class="text-success">
                ${{ number_format($producto->valor, 0, ',', '.') }}
            </h3>

            {{-- STOCK --}}
            <p>
                Stock disponible:
                <span class="badge bg-success">
                    {{ $producto->stock }}
                </span>
            </p>

            {{-- 
                BOTONES DE ACCIÓN
            --}}
            <div class="mt-4 d-flex gap-2">

                {{-- VOLVER AL LISTADO --}}
                <a href="{{ url('/productos') }}" class="btn btn-secondary">
                    Volver
                </a>

                @if ($producto->estado !== 'inactiva')

                    <a
                        href="{{ url('productos/estado/' . $producto->sku . '/inactiva') }}"
                        class="btn btn-danger">
                        Inactivar Producto
                    </a>

                @else
                    {{-- Si está inactivo, permitimos activarlo --}}
                    <a
                        href="{{ url('productos/estado/' . $producto->sku . '/activa') }}"
                        class="btn btn-success">
                        Activar Producto
                    </a>
                @endif
            </div>

            {{--
                ESTADO ACTUAL
            --}}
            <div class="mt-3">
                Estado actual:

                @if ($producto->estado === 'activa')
                    <span class="badge bg-success">
                        Activo
                    </span>
                @else
                    <span class="badge bg-danger">
                        Inactivo
                    </span>
                @endif
            </div>

        </div>
    </div>
</div>

@include('layout.footer')
