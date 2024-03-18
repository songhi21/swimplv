<div class="modal fade" id="delete<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog "  role="document">
    <div class="modal-content textcolorwhite">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><?php echo "Are you sure you want to permanently remove this item?" ?></p>
      </div>
      <div class="modal-footer text-center">
          <form action="{{ route('useraccount.destroy',$id)}} " method="POST" class="formsurv">
              @csrf
              @method('DELETE')
              <button  type="submit" class="submit btn btn-danger ">Ok</button>
          </form>
          <button type="button" class=" btn btn-secondary " data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>