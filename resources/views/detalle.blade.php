
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
                    {{ $producto->descripción ?? 'Sin descripción' }}
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
                {{-- BOTÓN AGREGAR A CARRITO --}}
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#loginPromptModal">
                    Agregar a carrito
                </button>

                {{-- BLOQUE COMENTADO PORQUE NO LO VAMOS A USAR: BOTÓN CAMBIAR ESTADO --}}
                {{-- Si el producto está activo, permitimos inactivarlo   --}}
                {{--
                @if ($producto->estado !== 'inactiva')

                    <a
                        href="{{ url('productos/estado/' . $producto->sku . '/inactiva') }}"
                        class="btn btn-danger">
                        Inactivar Producto
                    </a>

                @else
                    Si está inactivo, permitimos activarlo (Nota: quité las llaves de comentario aquí para evitar error)
                    <a
                        href="{{ url('productos/estado/' . $producto->sku . '/activa') }}"
                        class="btn btn-success">
                        Activar Producto
                    </a>
                @endif
                --}}
            </div>

            {{--
                ESTADO ACTUAL
            
            <div class="mt-3">
                Estado actual:

                @if ($producto->estado === 'activo')
                    <span class="badge bg-success">
                        Activo
                    </span>
                @else
                    <span class="badge bg-danger">
                        Inactivo
                    </span>
                @endif
            </div>
            --}}

        </div>
    </div>
</div>

<!-- Modal de Login -->
<div class="modal fade" id="loginPromptModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    
    <!-- Diálogo del modal -->
    <div class="modal-dialog modal-dialog-centered">
        
        <!-- Contenido del modal -->
        <div class="modal-content">
            
            <!-- Encabezado del modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Iniciar Sesión</h5>
                <!-- Botón X para cerrar -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            
            <!-- Cuerpo del modal -->
            <div class="modal-body">
                <p>Por favor, inicia sesión para agregar productos al carrito.</p>
            </div>
            
            <!-- Pie del modal con botones -->
            <div class="modal-footer">
                <!-- Botón Cancelar (cierra el modal) -->
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                
                <!-- Botón Iniciar Sesión (redirige a login) -->
                <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
            </div>
            
        </div>
        
    </div>
    
</div>

@include('layout.footer')
