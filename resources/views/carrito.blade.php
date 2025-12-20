@include('layout.header')

 <div class="container mt-5">
    @if(session('bienvenida'))
    <div class="alert alert-success">
        {{ session('bienvenida') }}
    </div>
    @endif
    <div class="card shadow"> 
        <div class="card-header">
            <h3>Carrito de Compras</h3>
        </div>
        <div class="card-body">
           <p>No hay productos en el carrito</p>
        </div> 
    </div>
</div>

@include('layout.footer')