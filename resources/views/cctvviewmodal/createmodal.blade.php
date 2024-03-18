<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Create a Link</h1>
          <button style="background-color: red" type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('cctvview.store') }}" method="POST" class="formsurv">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="linkname" class="form-label">Name</label>
                    <input required="true" name="name" type="text" class="form-control" id="linkname" aria-describedby="linkname" placeholder="Name">
                    @error('namehub')
                      <div role="alert" x-data="{ showMessage: true }" x-show="showMessage" x-init="setTimeout(() => showMessage = false, 300)">
                          <span class="invalid-feedback" >
                              <strong class="errormessagecolor">{{ $message }}</strong>
                          </span>

                      </div>
                    @enderror
                    <div id="linkname" class="form-text textcolorwhite">Input the link Name.</div>
                    </div>
                    <div class="mb-3">
                        <label for="link" class="form-label">Link</label>
                        <input required="true" name="link" type="Url" class="form-control" id="link" value="https://" placeholder="Example: https://www.example.com">
                        <div id="link" class="form-text textcolorwhite">Paste Link Url.</div>
                    </div>
                    <div class="mb-3 form-check">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-dark" data-dismiss="modal">Close</button>
                <button type="submit" class="prevent btn btn-primary submit">Submit</button>
            </div>
        </form>
     


      </div>
    </div>
  </div>