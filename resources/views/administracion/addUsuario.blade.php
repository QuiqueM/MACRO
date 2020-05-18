@extends('layouts.app')
@section('content_header')
    <h2 class="text-center">Registra un usuario</h2>
@stop
@section('content')
    <div class="card">
        <div class="card-header">Listado de Usuarios <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#exampleModal">
            Nuevo
          </button></div>
        <div class="card-body">
            <div class="table-responsive p-3">
                <table class="table">
                    <thead class="thead-dark">
                      <tr class="text-center">
                        <th scope="col">ID</th>
                        <th scope="col">Usuario</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Rol</th>
                        <th scope="col">Acciones</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuario as $us)
                            <tr class="text-center">
                                <td>{{$us->id}}</td>
                                <td>{{$us->usuario}}</td>
                                <td>{{$us->email}}</td>
                                @if ($us->rol == 1)
                                    <td>Administrador</td>
                                @else
                                    <td>Empleado</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>    
            </div>
        </div>
        <div class="card-footer"></div>
    </div>
    <div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Datos del Usuario</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form method="POST" action="{{ url('/addUsuario') }}">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="form-row">
                        <div class="col">
                            <label for="">Nombre Completo</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                            <input type="text" class="form-control" name="nombre" placeholder="Jonh Doe" required> 
                        </div>
                        </div>
                        <div class="col">
                            <label for="">Dirección</label>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                            </div>
                            <input type="text" class="form-control" name="direccion" placeholder="av.universidad #123" required>
                        </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="">Telefono o Celular</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                                </div>
                                <input type="text" class="form-control" name="telefono" placeholder="123456789" required>
                            </div>
                        </div>
                        <div class="col">
                            <label for="">Usuario</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                                </div>
                                <input type="text" class="form-control" name="usuario" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col">
                            <label for="">Correo Electronico</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                                </div>
                                <input type="text" class="form-control" name="email" placeholder="example@email.com" required>
                            </div>
                        </div>
                        <div class="col">
                            <label for="">Contraseña</label>
                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                <div class="input-group-text">@</div>
                                </div>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Rol</label>
                        <select class="custom-select" name="rol" required>
                            <option selected>Seleccionar</option>
                            <option value="1">Administrador</option>
                            <option value="2">Empleado</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-success">Guardar</button>
                </div>
            </form>
          </div>
        </div>
      </div>
@endsection
@section('scripts')
    <script>
         var us = '<?php echo(session()->has("add")); ?> ';
            if(us  == true ){
                toastr.success("Usuario Agregado","Exito",{
                    "progressBar": true
                })
            }   
        $(document).ready( function () {
            $('.table').DataTable({"ordering":false,
                "language":{
                "sProcessing":     "Procesando...",
                "lengthMenu":      "Mostrar _MENU_ registros",
                "sZeroRecords":    "No se encontraron resultados",
                "sEmptyTable":     "Ningún dato disponible en esta tabla",
                "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ preguntas",
                "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 preguntas",
                "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix":    "",
                "sSearch":         "Buscar:",
                "sUrl":            "",
                "sInfoThousands":  ",",
                "sLoadingRecords": "Cargando...",
                "oPaginate": {
                    "sFirst":    "Primero",
                    "sLast":     "Último",
                    "sNext":     "Siguiente",
                    "sPrevious": "Anterior"
                },
                "oAria": {
                    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                }
            }
            
            });
            
            var us = '<?php echo(session()->has("add")); ?> ';
            if(us  == true ){
                toastr.success("Usuario Agregado","Exito",{
                    "progressBar": true
                })
            }        
        }); 
    </script>
@endsection