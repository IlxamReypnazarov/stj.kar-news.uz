{{-- @extends('student.layaut')

@section('title', 'APPLICATION') --}}

{{-- $table->string('lastname');
            $table->string('firstname');
            $table->string('jshshir');
            $table->string('phone');
            $table->string('regions');
            $table->string('districts');
            $table->string('quarters');
            $table->string('street');
            $table->string('privilege');
            $table->string('privilege_file');
            $table->string('fakultet');
            $table->string('group');
            $table->string('kurs'); --}}
{{-- @section('content')

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4>Application</h4>
                </div>
                <div class="card-body">
                    <form id="wizard_with_validation" method="POST">
                        <h3>Information about you</h3>
                        <fieldset>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">JSHSHIR*</label>
                                    <input type="text" class="form-control" name="jshshir" required>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Phone*</label>
                                    <input type="number" class="form-control" name="phone" id="password" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Fakultet</label>
                                <select class="form-control">
                                    <option>Matematika</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Qaniygelik</label>
                                <select class="form-control">
                                    <option>Option 1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Gruppa</label>
                                <select class="form-control">
                                    <option>Option 1</option>
                                </select>
                            </div>
                        </fieldset>
                        <h3>information about place of residence</h3>
                        <fieldset>
                          <div class="form-group">
                            <label>Region</label>
                            <select class="form-control selectric" name="category">
                                <option value="Fashion">Fashion</option>
                                <option value="Electronics">Electronics</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Region</label>
                              <select class="form-control selectric" name="subcategory" id="subcategory">
                                <optgroup label="Fashion">
                                    <option value="Men's wear">Men's wear</option>
                                    <option value="Women's wear">Women's wear</option>
                                </optgroup>
                                <optgroup id="B" label="Electronics" disabled>
                                    <option value="Television">Television</option>
                                    <option value="Game Console">Game Console</option>
                                </optgroup>
                            </select>
                          </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Region</label>
                                    <select name="subcategory" id="subcategory">
                                      <optgroup label="Fashion">
                                          <option value="Men's wear">Men's wear</option>
                                          <option value="Women's wear">Women's wear</option>
                                      </optgroup>
                                      <optgroup id="B" label="Electronics" disabled>
                                          <option value="Television">Television</option>
                                          <option value="Game Console">Game Console</option>
                                      </optgroup>
                                  </select>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Last Name*</label>
                                    <input type="text" name="surname" class="form-control">
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Email*</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Address*</label>
                                    <textarea name="address" cols="30" rows="3" class="form-control no-resize" required></textarea>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Age*</label>
                                    <input min="18" type="number" name="age" class="form-control" required>
                                </div>
                                <div class="help-info">The warning step will show up if age is less than 18</div>
                            </div>
                        </fieldset>
                        <h3>Terms &amp; Conditions - Finish</h3>
                        <fieldset>
                            <input id="acceptTerms-2" name="acceptTerms" type="checkbox" required>
                            <label for="acceptTerms-2">I agree with the Terms and Conditions.</label>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#category").on("change", function() {
                var selectedVal = $("#category option:selected").val();
                $("#subcategory > optgroup").attr("disabled", "disabled");
                $('#subcategory > optgroup[label="' + selectedVal + '"]').removeAttr("disabled");
            });
        });
    </script>
@endsection --}}


@extends('student.layaut')

@section('title', 'APPLICATION')

@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="card-header">
                    <h4>Application</h4>
                </div>
                <div class="card-body">
                    <form id="wizard_with_validation" action="{{ route('storeApp') }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <h3>Personal Information</h3>
                        <fieldset>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Familiya*</label>
                                    <h1> </h1>
                                    <input type="text" class="form-control" name="lastname" wire:model.live = "lastname"
                                        required>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Ati*</label>
                                    <input type="text" class="form-control" name="firstname" required>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">JSHSHIR*</label>
                                    <input type="number" class="form-control" name="jshshir" id="password">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="d-block">Gender</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="male" id="exampleRadios1"
                                        checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Male
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="type" value="female" id="exampleRadios2"
                                        checked>
                                    <label class="form-check-label" for="exampleRadios2">
                                        Female
                                    </label>
                                </div>
                            </div>
                            <div class="form-group form-float">
                                <div class="form-line">
                                    <label class="form-label">Telefon*</label>
                                    <input type="number" class="form-control" name="phone">
                                </div>
                            </div>
                        </fieldset>
                        <h3>Live Information</h3>
                        <fieldset>
                            @livewire('app')
                        </fieldset>
                        <h3>Education</h3>
                        <fieldset>
                            @livewire('group')
                        </fieldset>
                        <h3>Privelegies</h3>
                        <fieldset>
                            <div class="form-group">
                                <label class="d-block">Jeńillik túrin saylań</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Jaslar dapteri" name="priveleges" id="exampleRadios1"
                                        checked>
                                    <label class="form-check-label" for="exampleRadios1">
                                        Jaslar dapteri
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Temir dapter" name="priveleges" id="exampleRadios2"
                                        checked>
                                    <label class="form-check-label" for="exampleRadios2">
                                        Temir dapter
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Hayal qızlar dapteri" name="priveleges" id="exampleRadios3"
                                        checked>
                                    <label class="form-check-label" for="exampleRadios3">
                                        Hayal qızlar dapteri
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Kem tamiynlengenler dizimi" name="priveleges" id="exampleRadios4"
                                        checked>
                                    <label class="form-check-label" for="exampleRadios4">
                                        Kem tamiynlengenler dizimi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Baǵıwshısınan ayrılǵanlar dizimi" name="priveleges" id="exampleRadios5"
                                        checked>
                                    <label class="form-check-label" for="exampleRadios5">
                                        Baǵıwshısınan ayrılǵanlar dizimi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" value="Nagiranligi barlar dizimi" name="priveleges" id="exampleRadios6"
                                        checked>
                                    <label class="form-check-label" for="exampleRadios6">
                                        Nagiranligi barlar dizimi
                                    </label>
                                </div>
                            </div>
                            <div class="section-title">Jeńillik beriwshi hujjet(pdf,zip,jpg)</div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="privelege_file" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                            <div class="card-footer text-right">
                                <button class="btn btn-primary mr-1" type="submit">Submit</button>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>


@endsection
