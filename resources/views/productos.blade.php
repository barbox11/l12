
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

                {{-- 
            BOTÓN PARA ABRIR EL MODAL DE CREAR PRODUCTO
        --}}
        <div class="d-flex justify-content-end mb-4">
            <button 
                class="btn btn-success"
                data-bs-toggle="modal"
                data-bs-target="#modalCrearProducto">
                + Crear nuevo producto
            </button>
        </div>

        {{-- BOTONES DE FILTRO
        <div class="d-flex justify-content-end mb-3 gap-2">

            <span class="align-self-center text-white me-2">
                Filtrar por:
            </span>

            <div class="btn-group" role="group">

                 TODOS LOS PRODUCTOS
                <a href="{{ url('productos') }}"
                    class="btn btn-outline-secondary">
                    Todos
                </a>
                

                 PRODUCTOS ACTIVOS
                <a href="{{ url('productos/filtrar/activo') }}"
                    class="btn btn-outline-success">
                    Activos
                </a>
                

                 PRODUCTOS INACTIVOS
                <a href="{{ url('productos/filtrar/inactivo') }}"
                    class="btn btn-outline-danger">
                    Inactivos
                </a>
            

            </div>
        </div>
        --}}


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
                                } elseif ($stock == 0) {
                                    $color = 'bg-warning';
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

                        <td class="text-center">
                            <div class="btn-group" role="group">
                                
                            
                                {{-- Botón Ver Detalle --}}
                                <a href="{{ route('productos.show', $producto->sku) }}"
                                    class="btn btn-outline-light btn-sm rounded-pill px-3 me-2">
                                    Ver Detalle
                                </a>

                                {{-- Botón Eliminar con modal de confirmación --}}
                                <button type="button" 
                                        class="btn btn-outline-danger btn-sm rounded-pill px-3"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#modalEliminarProducto{{ $producto->sku }}">
                                    Eliminar
                                </button>

                                {{-- Botón Editar Producto --}}
                                <a href="{{ route('productos.edit', $producto->sku) }}"
                                    class="btn btn-outline-warning btn-sm rounded-pill px-3 ms-2">
                                    Editar
                                </a>
                            
                            </div>
                {{-- MODAL CONFIRMACIÓN ELIMINAR PRODUCTO --}}
                        <div class="modal fade" id="modalEliminarProducto{{ $producto->sku }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-danger text-white">
                                        <h5 class="modal-title">Confirmar eliminación</h5>
                                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                                    </div>

                                    <div class="modal-body text-center py-4">
                                        <i class="bi bi-exclamation-triangle text-danger" style="font-size: 3rem;"></i>
                                        <h4 class="mt-3">¿Estás seguro?</h4>
                                        <p class="text-muted">
                                            Vas a eliminar el producto <strong> {{ $producto->nombre }}, {{ $producto->sku }}</strong>.<br>
                                            Esta acción <strong>no se puede deshacer</strong>.
                                        </p>
                                    </div>

                                    <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                            Cancelar
                                        </button>

                                        {{-- Formulario que se envía al confirmar --}}
                                        <form action="{{ route('productos.destroy', $producto->sku) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">
                                                Sí, eliminar permanentemente
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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

            {{-- PAGINADOR --}}
            <div class="d-flex justify-content-center mt-4">
            {{ $productos->links() }}
    </div>
        </div>
    </div>
</div>
{{-- 
    MODAL CREAR PRODUCTO
--}}
<div 
    class="modal fade" 
    id="modalCrearProducto" 
    tabindex="-1" 
    aria-hidden="true">

    <div class="modal-dialog modal-lg">

        <div class="modal-content">

            {{-- CABECERA DEL MODAL --}}
            <div class="modal-header">
                <h5 class="modal-title">
                    Crear nuevo producto
                </h5>

                {{-- Botón X para cerrar --}}
                <button 
                    type="button" 
                    class="btn-close" 
                    data-bs-dismiss="modal">
                </button>
            </div>

            {{-- 
                FORMULARIO
                action apunta a /productos (store)
            --}}
            <form method="POST" action="{{ route('productos.store') }}">

                {{-- Protección CSRF obligatoria en Laravel --}}
                @csrf

                <div class="modal-body">

                    {{-- SKU --}}
                    <div class="mb-3">
                        <label class="form-label">SKU</label>
                        <input 
                            type="text"
                            name="sku"
                            class="form-control"
                            required>
                    </div>

                    {{-- NOMBRE --}}
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input 
                            type="text"
                            name="nombre"
                            class="form-control"
                            required>
                    </div>

                    {{-- STOCK --}}
                    <div class="mb-3">
                        <label class="form-label">Stock</label>
                        <input 
                            type="number"
                            name="stock"
                            class="form-control"
                            min="0"
                            required>
                    </div>

                    {{-- VALOR --}}
                    <div class="mb-3">
                        <label class="form-label">Valor</label>
                        <input 
                            type="number"
                            name="valor"
                            class="form-control"
                            min="0"
                            required>
                    </div>

                    {{-- DESCRIPCIÓN --}}
                    <div class="mb-3">
                        <label class="form-label">Descripción</label>
                        <textarea 
                            name="descripción"
                            class="form-control"
                            rows="3">
                        </textarea>
                    </div>

                </div>

                {{-- PIE DEL MODAL --}}
                <div class="modal-footer">

                    <button 
                        type="button" 
                        class="btn btn-secondary"
                        data-bs-dismiss="modal">
                        Cancelar
                    </button>

                    <button 
                        type="submit" 
                        class="btn btn-success">
                        Guardar producto
                    </button>

                </div>

            </form>

        </div>
    </div>
</div>

@include('layout.footer')
