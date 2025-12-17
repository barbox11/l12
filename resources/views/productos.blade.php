
@include('layout.header')

<div class="bg-black min-vh-100 py-5">

    {{-- CONTENEDOR PRINCIPAL --}}
    <div class="container">

        {{-- TÍTULO DE LA SECCIÓN --}}
        <div class="text-center mb-5">
            <h2 class="display-5 fw-bold text-black">
                Nuestra Colección
            </h2>

            {{-- LÍNEA DECORATIVA --}}
            <hr class="mx-auto text-success"
                style="width: 100px; height: 3px; opacity: 1;">

            <p class="text-secondary">
                Disponibilidad inmediata para entrega
            </p>
        </div>

        {{-- BOTONES DE FILTRO --}}
        <div class="d-flex justify-content-end mb-3 gap-2">

            <span class="align-self-center text-white me-2">
                Filtrar por:
            </span>

            <div class="btn-group" role="group">

                {{-- TODOS LOS PRODUCTOS --}}
                <a href="{{ url('productos') }}"
                    class="btn btn-outline-secondary">
                    Todos
                </a>

                {{-- PRODUCTOS ACTIVOS --}}
                <a href="{{ url('productos/filtrar/activo') }}"
                    class="btn btn-outline-success">
                    Activos
                </a>

                {{-- PRODUCTOS INACTIVOS --}}
                <a href="{{ url('productos/filtrar/inactivo') }}"
                    class="btn btn-outline-danger">
                    Inactivos
                </a>

            </div>
        </div>

        {{-- TABLA RESPONSIVE --}}
        <div class="table-responsive">

            <table class="table table-dark table-hover align-middle text-center border-secondary">

                {{-- ENCABEZADOS --}}
                <thead>
                    <tr class="table-active">
                        <th>Producto</th>
                        <th class="text-start">Detalles</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Acción</th>
                    </tr>
                </thead>

                {{-- CUERPO --}}
                <tbody>

                {{-- VALIDAMOS SI HAY PRODUCTOS --}}
                @if ($productos->count() > 0)

                    {{-- RECORREMOS LOS PRODUCTOS --}}
                    @foreach ($productos as $producto)

                    <tr>

                        {{-- IMAGEN --}}
                        <td>
                            <img
                                src="{{ url('img/' . $producto->sku . '.jpg') }}"
                                alt="{{ $producto->nombre }}"
                                class="rounded border border-secondary"
                                style="width:100px;height:100px;object-fit:cover;">
                        </td>

                        {{-- NOMBRE Y SKU --}}
                        <td class="text-start">
                            <h5 class="mb-0">
                                {{ $producto->nombre }}
                            </h5>
                            <small class="text-secondary">
                                SKU: {{ $producto->sku }}
                            </small>
                        </td>

                        {{-- STOCK CON COLOR --}}
                        <td>
                            @php
                                $stock = $producto->stock;
                                $color = 'bg-success';

                                if ($stock < 5) {
                                    $color = 'bg-danger';
                                } elseif ($stock <= 20) {
                                    $color = 'bg-warning text-dark';
                                }
                            @endphp

                            <span class="badge {{ $color }} rounded-pill px-3">
                                {{ $stock }} disp.
                            </span>
                        </td>

                        {{-- PRECIO --}}
                        <td class="fw-bold text-success">
                            ${{ number_format($producto->valor, 0, ',', '.') }}
                        </td>

                        {{-- ÚNICA ACCIÓN: VER DETALLE --}}
                        <td>
                            <a href="{{ url('productos/detalle/' . $producto->sku) }}"
                                class="btn btn-outline-light btn-sm rounded-pill px-3">
                                Ver Detalle
                            </a>
                        </td>

                    </tr>
                    @endforeach

                {{-- SI NO HAY PRODUCTOS --}}
                @else
                    <tr>
                        <td colspan="5" class="text-center py-5 text-secondary">
                            No hay productos disponibles
                        </td>
                    </tr>
                @endif

                </tbody>
            </table>
        </div>
    </div>
</div>

@include('layout.footer')
