<div class="form-group">
  <label>Name</label>
  <div class="input-group">
    <span class="input-group-prepend">
      <label class="input-group-text"><i class="icon-pencil"></i></label>
    </span>
    @if(isset($car))
    <input type="text" class="form-control form-control-capitalize @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ $car->name }}" autocomplete="off" autofocus>
    @else
    <input type="text" class="form-control form-control-capitalize @error('name') is-invalid @enderror" placeholder="Name" name="name" value="{{ old('name') }}" autocomplete="off" autofocus>
    @endif
    <!-- Error Message -->
    @error('name')
      <em class="error invalid-feedback">{{ $message }}</em>
    @enderror
  </div>
</div>

<div class="form-group">
  <label>Plate Number</label>
  <div class="input-group">
    <span class="input-group-prepend">
      <label class="input-group-text"><i class="icon-pencil "></i></label>
    </span>
    @if(isset($car))
    <input type="text" class="form-control form-control-capitalize @error('plate_number') is-invalid @enderror" placeholder="Plate Number" name="plate_number" value="{{ $car->plate_number }}" autocomplete="off" autofocus>
    @else
    <input type="text" class="form-control form-control-capitalize @error('plate_number') is-invalid @enderror" placeholder="Plate Number" name="plate_number" value="{{ old('plate_number') }}" autocomplete="off" autofocus>
    @endif
    <!-- Error Message -->
    @error('plate_number')
      <em class="error invalid-feedback">{{ $message }}</em>
    @enderror
  </div>
</div>