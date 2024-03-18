<div class="modal fade" id="changepassword<?php echo $id ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static">
  <div class="modal-dialog textcolorwhite" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        <form method="POST" action="{{ route('changepassword') }}">
          @csrf
          <input type="hidden" name="product_id" value="{{$id}}" />
          <div class="row mb-3">
            <label  class="col-md-4 col-form-label text-md-end">Name</label>

            <div class="col-md-6">
                <input disabled="true" type="text" class="form-control" value={{$name}} autocomplete="on">
            </div>
          </div>
          <div class="row mb-3">
            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

            <div class="col-md-6">
                <input  type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
          </div>

          <div class="row mb-3">
              <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

              <div class="col-md-6">
                  <input  type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
              </div>
          </div>

          <div class="row mb-0">
            <div class="col-md-6 offset-md-4">
              <button type="submit" class="submit btn btn-primary">
                  {{ __('Reset Password') }}
              </button>
            </div>
          </div>
        </form>
      </div> 
      <div class="modal-footer text-center">
          
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
      </div>
    </div>
  </div>
</div>