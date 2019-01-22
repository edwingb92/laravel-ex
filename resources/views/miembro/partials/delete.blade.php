

        <div class="modal modal-danger fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title text-center" id="myModalLabel">Confirmar</h4>
                        </div>
                        <form action="" method="post">
                            {{method_field('delete')}} {{csrf_field()}}
                            <div class="modal-body">
                                <p class="text-center">
                                    ¿Esta Seguro que desea eliminar el registro?
                                </p>
                                <input type="hidden" name="id" id="id" value="">
    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-warning" data-dismiss="modal">No, Cancelar</button>
                                <button type="submit" class="btn btn-danger">Sí, Eliminar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
    
    