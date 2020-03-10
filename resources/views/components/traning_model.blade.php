<div class="modal fade" id="traning_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title"></h5>
          {{--  --}}
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id='tran_form'>
            <div class="modal-body">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <input id='support' type="text" class="form-control" name='support' placeholder="Supportive training">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group">
                            <textarea id="editor" class="form-control" name='text' placeholder="Descripton" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group ">
                            <input  name='at' class="form-control" id="datepicker" placeholder="At" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                
                <button id='tran_submit' type="submit" class="btn btn-primary">
                </button>
            </div>
        </form>
      </div>
    </div>
</div>