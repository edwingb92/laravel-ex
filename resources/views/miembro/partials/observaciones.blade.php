
        <div class="modal fade" id="myModalObservacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Registro de Observación</h4>
                        </div>
                        <form action="{{route('Observacion.store')}}" method="post">
                            {{csrf_field()}}
                            <div class="modal-body">
                                <input type="hidden" name="miembros_id" id="miembro_id" value={{$miembro->id}}>
                                <input type="hidden" name="users_id" id="miembro_id" value={{Auth::user()->miembros_id}}>
                            @include('miembro.partials.formobservacion')
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
  
  
  <div class="modal fade" id="editObservacion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Editar Observación</h4>
                </div>
                <form action="{{route('Observacion.update','test')}}" method="post">
                    {{method_field('patch')}} {{csrf_field()}}
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id" value="">
                        <input type="hidden" name="miembros_id" id="miembro_id" value={{$miembro->id}}>
                        <input type="hidden" name="users_id" id="miembro_id" value={{Auth::user()->miembros_id}}>
                        @include('miembro.partials.formobservacion')
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>