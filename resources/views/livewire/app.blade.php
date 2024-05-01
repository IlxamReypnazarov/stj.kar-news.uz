<div>
    <div class="section-title"></div>
    <div class="form-group">
      <label>Viloyat</label>
      <select wire:model.live="regionId"  name="region"  class="form-control selectric"  >
        <option value="">-select-</option>
        @foreach ($regions as $region)

        <option value="{{$region->id}}" > {{$region->name}} </option>
        @endforeach

      </select>

    </div>
    <div class="form-group">
      <label  >Shahar</label>

      <select wire:model.live="cityId" name="city"   class="form-control selectric"  >
        <option value="">-select-</option>
        @foreach ($cities as $city)

        <option value="{{$city->id}}" > {{$city->name}} </option>
        @endforeach

      </select>
    </div>
    <div class="form-group">
        <label  >MPJ(APJ)*</label>

        <select wire:model.live="" name="mpj"  class="form-control selectric"  >
          <option value="">-select-</option>
          @foreach ($quarters as $quarter)

          <option value="{{$quarter->id}}" > {{$quarter->name}} </option>
          @endforeach

        </select>
    </div>
    <div class="form-group form-float">
        <div class="form-line">
            <label class="form-label">Koshe(uy)*</label>
            <textarea name="street" cols="30" rows="3" class="form-control no-resize" required></textarea>
        </div>
    </div>
</div>
