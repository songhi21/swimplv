<div class="modal fade" id="edit<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Update Information</h5>
          <button style="background-color: red" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" data-dismiss="modal" aria-label="Close"></button>
            {{-- <span aria-hidden="true">&times;</span> --}}
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('cctvview.update',$id) }}" method="POST" class="formsurv">
            @method("PUT")
            @csrf
            <div class="mb-3">
                <label for="namehubedit" class="form-label">Name</label>
                <input required="true" name="name" type="text" class="form-control" placeholder="Name" value='<?php echo $name?>'>
                {{-- @error('namehub')
                  <div role="alert" x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 300)">
                      <span class="invalid-feedback" >
                          <strong class="errormessagecolor">{{ $message }}</strong>
                      </span>

                  </div>
                @enderror --}}
                <div id="linkname" class="form-text textcolorwhite">Input the link Name.</div>
                </div>
                <div class="mb-3">
                    <label for="linkhubedit" class="form-label textcolorwhite">Link</label>
                    <input require="true" name="link" type="Url" class="form-control" id="linkhubeidit" value='<?php echo $linkage?>' placeholder="Example: https://www.example.com">
                    <div id="link" class="form-text textcolorwhite">Paste Link Url.</div>
                </div>
                <div class="mb-3 form-check">
                </div>
                <div class="modal-footer">
                  {{-- <button type="button" class="btn btn-dark" data-dismiss="modal" aria-label="Close">Close</button> --}}
                  <button type="submit" class="submit btn btn-primary">Submit</button>
                </div>
            </div>

          </form>
      </div>
    </div>
  </div>