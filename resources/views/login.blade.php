{{-- Incluimos el header del layout --}}
@include('layout.header')

{{-- Contenedor principal con margen --}}
<div class="container mt-5 mb-5">
    
    {{-- Fila centrada --}}
    <div class="row justify-content-center">
        
        {{-- Columna del formulario --}}
        <div class="col-md-6 col-lg-5">
            
            {{-- Tarjeta con sombra --}}
            <div class="card shadow-lg border-0 rounded-3">
                
                {{-- Encabezado con color de fondo degradado (inline style) --}}
                <div class="card-header text-center py-4 border-0 rounded-top" 
                    style="background: linear-gradient(135deg, #4ade80 0%, #16a34a 100%);">
                    {{-- Icono de usuario --}}
                    <i class="fas fa-user-circle fa-3x text-white mb-3"></i>
                    {{-- Título --}}
                    <h3 class="mb-1 text-white">Iniciar Sesión</h3>
                    {{-- Subtítulo --}}
                    <small class="text-white">Bienvenido a Tienda de Plantas</small>
                </div>
                
                {{-- Cuerpo de la tarjeta --}}
                <div class="card-body p-5">
                    
                    {{-- Formulario --}}
                    <form action="{{ route('login') }}" method="POST">
                        
                        {{-- Token CSRF --}}
                        @csrf
                        
                        {{-- Campo: Email --}}
                        <div class="mb-4">
                            {{-- Etiqueta --}}
                            <label for="email" class="form-label fw-bold">
                                <i class="fas fa-envelope text-primary"></i> Correo Electrónico
                            </label>
                            {{-- Input --}}
                            <input type="email" 
                                    name="email" 
                                    id="email" 
                                    class="form-control form-control-lg" 
                                    placeholder="tu@email.com"
                                    required>
                        </div>
                        
                        {{-- Campo: Contraseña --}}
                        <div class="mb-4">
                            {{-- Etiqueta --}}
                            <label for="password" class="form-label fw-bold">
                                <i class="fas fa-lock text-primary"></i> Contraseña
                            </label>
                            {{-- Input --}}
                            <input type="password" 
                                    name="password" 
                                    id="password" 
                                    class="form-control form-control-lg" 
                                    placeholder="••••••••"
                                    required>
                        </div>
                        
                        {{-- Botón de envío --}}
                        <div class="d-grid gap-2">
                            {{-- Botón con degradado inline --}}
                            <button type="submit" 
                                    class="btn btn-lg text-white" 
                                    style="background: linear-gradient(135deg, #4ade80 0%, #16a34a 100%);">
                                <i class="fas fa-sign-in-alt"></i> Iniciar Sesión
                            </button>
                        </div>
                        
                    </form>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
    
</div>

{{-- Incluimos el footer del layout --}}
@include('layout.footer')