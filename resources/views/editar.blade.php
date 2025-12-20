{{-- Incluimos el header del layout --}}
@include('layout.header')

{{-- Contenedor principal con margen superior --}}
<div class="container mt-5">
    
    {{-- Fila centrada --}}
    <div class="row justify-content-center"> 
        
        {{-- Columna de 8 columnas (más ancho que antes) --}}
        <div class="col-md-8"> 
            
            {{-- Título de la página --}}
            <h1 class="mb-4">Editar Producto</h1>

            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show">
            <i class="fas fa-check-circle"></i> <strong>¡Éxito!</strong> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
            
            {{-- Formulario --}}
            <form action="{{ route('productos.update', $producto->sku) }}" method="POST">
                
                {{-- Token CSRF (obligatorio en Laravel) --}}
                @csrf
                
                {{-- Método PUT para actualizar --}}
                @method('PUT')
                
                {{-- Campo: Nombre --}}
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" 
                            name="nombre" 
                            id="nombre" 
                            class="form-control" 
                            value="{{ $producto->nombre }}">
                </div>
                
                {{-- Campo: Stock --}}
                <div class="mb-3">
                    <label for="stock" class="form-label">Stock</label>
                    <input type="number" 
                            name="stock" 
                            id="stock" 
                            class="form-control" 
                            value="{{ $producto->stock }}">
                </div>
                
                {{-- Campo: Valor --}}
                <div class="mb-3">
                    <label for="valor" class="form-label">Valor</label>
                    <input type="number" 
                            name="valor" 
                            id="valor" 
                            class="form-control" 
                            value="{{ $producto->valor }}">
                </div>
                
                {{-- Campo: Descripción --}}
                <div class="mb-3">
                    <label for="descripcion" class="form-label">Descripción</label>
                    <textarea name="descripcion" 
                                id="descripcion" 
                                class="form-control" 
                                rows="4">{{ $producto->descripcion }}</textarea>
                </div>
                
                {{-- Contenedor de botones con espaciado --}}
                <div class="mt-4">
                    {{-- Botón Regresar --}}
                    <a href="{{ url('productos') }}" class="btn btn-secondary">Regresar</a>
                    
                    {{-- Botón Actualizar --}}
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
                
            </form>
            
        </div>
        
    </div>
    
</div>
@include('layout.footer')