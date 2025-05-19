@extends('plantilla')

@section('contenido')
@include('components/navbar')

<div class="container mb-5">
    <div class="row mt-5">
        <div class="col mt-5">
            <div class="container mt-8">
                <div class="row mb-3 justify-content-center">
                    <div class="card justify-content-center" style="width: 25rem; background-color: rgba(255, 255, 255, 0.5);">
                        <img id="abejita" class="mx-auto d-block" src="{{ asset('img/xxx.png') }}" height="95" width="125px">
                        <div class="card-body row justify-content-center">

                            <h1 class="fw-bold text-center">Inicio</h1>

                            {{-- Botón de cerrar sesión --}}
                            <form action="{{ route('logout') }}" method="POST" class="text-center mt-3">
                                @csrf
                                <button type="submit" class="btn btn-danger">Cerrar sesión</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Protección contra navegación con flechitas (historial) --}}
<script>
    // Si se accede a esta página desde el historial (flecha atrás o adelante), forzamos recarga
    window.addEventListener("pageshow", function (event) {
        if (event.persisted || (window.performance && window.performance.navigation.type === 2)) {
            window.location.reload();
        }
    });
</script>
@endsection
