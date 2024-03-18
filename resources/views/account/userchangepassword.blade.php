<form method="POST" action="{{ route('userchangepassword.update', Auth::user()->id) }}" class="formsurv">
    @csrf
    @method("PUT")
    <div class="row mb-3">
        <label for="oldPasswordInput" class="col-md-4 col-form-label text-md-end">Old Password</label>

        <div class="col-md-6">
            {{-- <label for="oldPasswordInput" class="form-label">Old Password</label> --}}
            <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                >
            @error('old_password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
    </div>
    <div class="row mb-3">
        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

        <div class="col-md-6">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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

