{{-- 
    INCLUIMOS EL HEADER 
--}}
@include('layout.header')


<div class="bg-black min-vh-100 py-5">

    {{-- Contenedor centrado de Bootstrap --}}
    <div class="container">

        {{-- 
            TÍTULO DE LA SECCIÓN 
        --}}
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-black">
                Nuestra Colección
            </h2>

            {{-- Línea decorativa --}}
            <hr class="mx-auto text-success" 
                style="width: 100px; height: 3px; opacity: 1;">

            <p class="text-secondary">
                Disponibilidad inmediata para entrega
            </p>
        </div>

        {{-- 
        BOTONES DE FILTRO 
        --}}
        <div class="d-flex justify-content-end mb-3 gap-2">

            <span class="align-self-center text-white me-2">
                Filtrar por:
            </span>

            <div class="btn-group" role="group">

                {{-- Ruta a todos los productos --}}
                <a href="{{ url('productos') }}" 
                    class="btn btn-outline-secondary">
                    Todos
                </a>

                {{-- Ruta a productos activos --}}
                <a href="{{ url('productos/filtrar/activo') }}" 
                    class="btn btn-outline-success">
                    Activos
                </a>

                {{-- Ruta a productos inactivos --}}
                <a href="{{ url('productos/filtrar/inactivo') }}" 
                    class="btn btn-outline-danger">
                    Inactivos
                </a>

            </div>
        </div>

        {{--
        TABLA RESPONSIVE 
        --}}
        
        <div class="table-responsive">

            <table class="table table-dark table-hover align-middle text-center border-secondary">

                {{-- ENCABEZADO DE LA TABLA --}}
                <thead>
                    <tr class="table-active">
                        <th class="py-3">Producto</th>
                        <th class="py-3 text-start">Detalles</th>
                        <th class="py-3">Stock</th>
                        <th class="py-3">Precio</th>
                        <th class="py-3">Acción</th>
                    </tr>
                </thead>

                {{-- CUERPO DE LA TABLA --}}
                <tbody>

                    {{-- 
                    VERIFICAMOS SI HAY PRODUCTOS 
                        --}}
                    @if (!empty($productos))

                        {{-- Recorremos el arreglo de productos --}}
                        @foreach ($productos as $producto)

                        <tr>

                            {{-- IMAGEN DEL PRODUCTO --}}
                            <td>
                                <img 
                                    src="{{ url('img/' . ($producto['sku'] ?? 'default') . '.jpg') }}"
                                    alt="{{ $producto['nombre'] ?? 'Producto' }}"
                                    class="rounded border border-secondary"
                                    style="width: 100px; height: 100px; object-fit: cover;">
                            </td>

                            {{-- NOMBRE Y SKU --}}
                            <td class="text-start">
                                <h5 class="mb-0">
                                    {{ $producto['nombre'] ?? 'Sin nombre' }}
                                </h5>
                                <small class="text-secondary">
                                    SKU: {{ $producto['sku'] ?? 'N/A' }}
                                </small>
                            </td>

                            {{--
                            STOCK CON COLORES DINÁMICOS 
                            --}}
                            <td>
                                @php
                                    // 1. Tomamos el stock o 0 si no existe
                                    $stock = $producto['stock'] ?? 0;

                                    // 2. Color por defecto (stock alto)
                                    $colorStock = 'bg-success';

                                    // 3. Reglas de color según cantidad
                                    if ($stock < 5) {
                                        $colorStock = 'bg-danger'; // crítico
                                    } elseif ($stock <= 20) {
                                        $colorStock = 'bg-warning text-dark'; // bajo
                                    }
                                @endphp

                                <span class="badge {{ $colorStock }} rounded-pill px-3">
                                    {{ $stock }} disp.
                                </span>
                            </td>

                            {{-- PRECIO DEL PRODUCTO --}}
                            <td class="fs-5 fw-bold text-success">
                                $
                                {{ 
                                    isset($producto['valor']) 
                                    ? number_format($producto['valor'], 0, ',', '.') 
                                    : '0' 
                                }}
                            </td>

                            {{-- BOTÓN VER DETALLE --}}
                            <td>
                                <a href="{{ url('productos/detalle/' . $producto['sku']) }}"
                                    class="btn btn-outline-light btn-sm rounded-pill px-3">
                                    Ver
                                </a>
                            </td>

                        </tr>
                        @endforeach

                    {{--
                    SI NO HAY PRODUCTOS 
                    --}}
                    @else
                        <tr>
                            <td colspan="5" class="text-center py-5">
                                <p class="text-secondary">
                                    No hay productos disponibles
                                </p>
                            </td>
                        </tr>
                    @endif

                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- 
INCLUIMOS EL FOOTER 
--}}
@include('layout.footer')
