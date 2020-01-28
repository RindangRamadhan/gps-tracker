<div class="form-group">
  <label>SJ Number</label>
  <div class="input-group">
    <span class="input-group-prepend">
      <label class="input-group-text"><i class="icon-pencil"></i></label>
    </span>
    @if(isset($delivery))
    <input type="text" class="form-control @error('sj_number') is-invalid @enderror" readonly name="sj_number" value="{{ $delivery->sj_number }}" autocomplete="off">
    @else
    <input type="text" id="sj_number" class="form-control @error('sj_number') is-invalid @enderror" readonly name="sj_number" autocomplete="off">
    @endif
  </div>
</div>

<div class="form-group">
  <label>Driver</label>
  <div class="input-group">
    <span class="input-group-prepend">
      <label class="input-group-text"><i class="icon-pencil"></i></label>
    </span>    
    <select id="driver" class="form-control select2 @error('driver') is-invalid @enderror" name="driver" required autofocus>
      <option></option>
    </select>
    <!-- Error Message -->
    @error('driver')
      <span class="error-message" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
</div>

<div class="form-group">
  <label>Car</label>
  <div class="input-group">
    <span class="input-group-prepend">
      <label class="input-group-text"><i class="icon-pencil"></i></label>
    </span>    
    <select id="car" class="form-control select2 @error('car') is-invalid @enderror" name="car" required autofocus>
      <option></option>
    </select>
    <!-- Error Message -->
    @error('car')
      <span class="error-message" role="alert">
        <strong>{{ $message }}</strong>
      </span>
    @enderror
  </div>
</div>

<div class="form-group">
  <label>Location</label>
  <div class="input-group">
    <span class="input-group-prepend">
      <label class="input-group-text"><i class="icon-pencil"></i></label>
    </span>
    @if(isset($delivery))
    <input type="text" class="form-control @error('location') is-invalid @enderror" placeholder="Location" name="location" value="{{ $delivery->delivery_location }}" autocomplete="off" autofocus>
    @else
    <input type="text" class="form-control @error('location') is-invalid @enderror" placeholder="Location" name="location" value="{{ old('location') }}" autocomplete="off" autofocus>
    @endif
    <!-- Error Message -->
    @error('location')
      <em class="error invalid-feedback">{{ $message }}</em>
    @enderror
  </div>
  <i style="color: grey">ex: Indomaret A, Indomaret B</i>
</div>
