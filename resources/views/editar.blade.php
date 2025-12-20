@include('layout.header')
<div class ="container mt-5">
    <div class ="row justify-content-center"> 
        <div class ="col-md-6"> 
            <h1>Editar Producto</h1>
            <form action="{{ route('productos.update', $producto->sku) }}" method="POST">
                @csrf
                @method('PUT')
                <div class =form-group>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" value="{{ $producto->nombre }}">
                </div>
                <div class =form-group>
                    <label for="stock">Stock</label>
                    <input type="number" name="stock" id="stock" class="form-control" value="{{ $producto->stock }}">
                </div>
                <div class =form-group>
                    <label for="valor">Valor</label>
                    <input type="number" name="valor" id="valor" class="form-control" value="{{ $producto->valor }}">
                </div>
                <div class =form-group>
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control">{{ $producto->descripcion }}</textarea>
                </div>
                <a href="{{ url('productos') }}" class="btn btn-secondary">Regresar</a>
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
</div>



@include('layout.footer')