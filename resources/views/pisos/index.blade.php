@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Pisos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                        @can('crear-piso')
                        <a class="btn btn-warning" href="{{ route('pisos.create') }}">Nuevo</a>
                        @endcan

                        <table class="table table-striped mt-2">
                                <thead style="background-color:#191d21 !important;">
                                    <th style="display: none;">ID</th>
                                    <th style="color:#fff;">Titulo</th>
                                    <th style="color:#fff">Calle</th>
                                    <th style="color:#fff">Ciudad</th>
                                    <th style="color:#fff;">Contenido</th>
                                    <th style="color:#fff;">Acciones</th>
                              </thead>
                              <tbody>
                            @foreach ($pisos as $piso)
                            <tr>
                                <td style="display: none;">{{ $piso->id }}</td>
                                <td>{{ $piso->titulo }}</td>
                                <td>{{ $piso->calle }}</td>
                                <td>{{ $piso->ciudad }}</td>
                                <td>{{ $piso->contenido }}</td>
                                <td>
                                    <form action="{{ route('pisos.destroy',$piso->id) }}" method="POST">
                                        @can('editar-piso')
                                        <a class="btn btn-info" href="{{ route('pisos.edit',$piso->id) }}">Editar</a>
                                        @endcan

                                        @csrf
                                        @method('DELETE')
                                        @can('borrar-piso')
                                        <button type="submit" class="btn btn-danger">Borrar</button>
                                        @endcan
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <!-- Ubicamos la paginacion a la derecha -->
                        <div class="pagination justify-content-end">
                            {!! $pisos->links() !!}
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
