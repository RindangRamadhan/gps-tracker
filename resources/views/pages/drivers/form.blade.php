<div class="form-group">
  <label>Name</label>
  <div class="input-group">
    <span class="input-group-prepend">
      <label class="input-group-text"><i class="icon-pencil"></i></label>
    </span>
    @if(isset($driver))
    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ $driver->name }}" autocomplete="off" autofocus>
    @else
    <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" autocomplete="off" autofocus>
    @endif
    <!-- Error Message -->
    @error('name')
      <em class="error invalid-feedback">{{ $message }}</em>
    @enderror
  </div>
</div>

<div class="form-group">
  <label>Email</label>
  <div class="input-group">
    <span class="input-group-prepend">
      <label class="input-group-text"><i class="icon-pencil"></i></label>
    </span>
    @if(isset($driver))
    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ $driver->user->email }}" autocomplete="off" autofocus>
    @else
    <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="off" autofocus>
    @endif
    <!-- Error Message -->
    @error('email')
      <em class="error invalid-feedback">{{ $message }}</em>
    @enderror
  </div>
</div>

<div class="form-group">
  <label>Phone Number</label>
  <div class="input-group">
    <span class="input-group-prepend">
      <label class="input-group-text"><i class="icon-pencil"></i></label>
    </span>
    @if(isset($driver))
    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone Number" name="phone_number" value="{{ $driver->no_telp }}" autocomplete="off" autofocus>
    @else
    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone Number" name="phone_number" value="{{ old('phone_number') }}" autocomplete="off" autofocus>
    @endif
    <!-- Error Message -->
    @error('phone_number')
      <em class="error invalid-feedback">{{ $message }}</em>
    @enderror
  </div>
</div>

<div class="form-group">
  <label>NIK</label>
  <div class="input-group">
    <span class="input-group-prepend">
      <label class="input-group-text"><i class="icon-pencil"></i></label>
    </span>
    @if(isset($driver))
    <input type="number" class="form-control @error('nik') is-invalid @enderror" placeholder="NIK" name="nik" value="{{ $driver->nik }}" autocomplete="off" autofocus>
    @else
    <input type="number" class="form-control @error('nik') is-invalid @enderror" placeholder="NIK" name="nik" value="{{ old('nik') }}" autocomplete="off" autofocus>
    @endif
    <!-- Error Message -->
    @error('nik')
      <em class="error invalid-feedback">{{ $message }}</em>
    @enderror
  </div>
</div>