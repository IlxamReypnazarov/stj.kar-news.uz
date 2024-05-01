<div>
    <div class="section-title"></div>
    <div class="form-group">
      <label>Fakultet</label>
      <select wire:model.live="facultyId"  name="faculty"  class="form-control selectric"  >
        <option value="">-select-</option>

        @foreach ($faculties as $faculty)
        <option value="{{$faculty->id}}" > {{$faculty->name}} </option>
        @endforeach

      </select>
    </div>
    <div class="form-group">
      <label  >Qaniygelik</label>
      <select wire:model.live="" name="profession" class="form-control selectric"  >
        <option value="">-select-</option>

        @foreach ($professions as $profession)
        <option value="{{$profession->id}}" > {{$profession->name}} </option>
        @endforeach

      </select>
    </div>
</div>
