<div>
    <div class="section-title"></div>
    <div class="form-group">
      <label>Floor</label>
      <select wire:model.live="floorId"  name="floor"  class="form-control selectric"  >
        <option value="">-select-</option>

        @foreach ($floors as $floor)
        <option value="{{$floor->id}}" > {{$floor->name}} - {{ $floor->type }}</option>
        @endforeach

      </select>
    </div>
    <div class="form-group">
      <label  >Room</label>
      <select wire:model.live="" name="room" class="form-control selectric"  >
        <option value="">-select-</option>

        @foreach ($rooms as $room)
        @if ($room->capacity!=0)
        <option value="{{$room->id}}" > {{$room->room_name}} </option>
        @endif
        @endforeach

      </select>
    </div>
</div>
