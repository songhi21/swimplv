<div class="modal fade" id="edit<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog textcolorwhite" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Update Information</h5>
        <button style="background-color: red" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-dismiss="modal" aria-label="Close"></button>
          {{-- <span aria-hidden="true">&times;</span> --}}
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('useraccount.update',$id) }}" method="POST" class="formsurv">
          @method("PUT")
          @csrf
          <div class="mb-3">
            <label for="namehubedit" class="form-label">Name</label>
            <input required="true" name="name" type="text" class="submit form-control" placeholder="Name" value="<?php echo $name?>">
            <label for="linkhubedit" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="<?php echo $email ?>" required autocomplete="email">
            
          </div>
          <div class="modal-footer">
            <button type="submit" class="submit btn btn-primary">Submit</button>
            <button type="button" class="btn btn-dark" data-dismiss="modal" aria-label="Close">Close</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>