<div class="box-header">
    <h4 class="box-title text-info mb-0 mt-12"><i class="ti-agenda me-15"></i> Jours de disponibilité</h4>
</div>

<div class="box-body">
    @if ($status == 'update')
        <div class="row">

            @foreach (['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'] as $key => $day)
                @if (in_array($key, json_decode($planning->days)))
                    <div class="col-lg-4 d-flex justify-content-between p-2 border">
                        <div>
                            <input type="checkbox" id="day{{ $key + 1 }}" name="day[]" value="{{ $key }}"
                                class="chk-col-info" checked />
                            <label for="day{{ $key + 1 }}">{{ $day }}</label>
                        </div>
                        <div>
                            <input type="time" value="{{ json_decode($planning->hour_start)[$key] }}" class="input" name="time[]" id="time{{ $key + 1 }}">
                        </div>
                    </div>
                @else
                    <div class="col-lg-4 d-flex justify-content-between p-2 border">
                        <div>
                            <input type="checkbox" id="day{{ $key + 1 }}" name="day[]"
                                value="{{ $key }}" class="chk-col-info" />
                            <label for="day{{ $key + 1 }}">{{ $day }}</label>
                        </div>
                        <div>
                            <input type="time" class="input" name="time[]" id="time{{ $key + 1 }}">
                        </div>
                    </div>
                @endif
            @endforeach

        </div>
    @else
        <div class="row">
            <div class="col-lg-4 d-flex justify-content-between p-2 border">
                <div>
                    <input type="checkbox" id="day1" name="day[]" value="0" class="chk-col-info" />
                    <label for="day1">Lundi</label>
                </div>
                <div>
                    <input type="time" class="input" name="time[]" id="time1">
                </div>
            </div>

            <div class="col-lg-4 d-flex justify-content-between p-2 border">
                <div> <input type="checkbox" id="day2" name="day[]" value="1" class="chk-col-info" />
                    <label for="day2">Mardi</label>
                </div>
                <div>
                    <input type="time" class="input" name="time[]" id="time2">
                </div>
            </div>

            <div class="col-lg-4 d-flex justify-content-between p-2 border">
                <div> <input type="checkbox" id="day3" name="day[]" value="2" class="" />
                    <label for="day3">Mercredi</label>
                </div>
                <div>
                    <input type="time" class="input" name="time[]" id="time3">
                </div>
            </div>

            <div class="col-lg-4 d-flex justify-content-between p-2 border">
                <div> <input type="checkbox" id="day4" name="day[]" value="3" class="chk-col-info" />
                    <label for="day4">Jeudi</label>
                </div>
                <div>
                    <input type="time" class="input" name="time[]" id="time4">
                </div>
            </div>

            <div class="col-lg-4 d-flex justify-content-between p-2 border">
                <div> <input type="checkbox" id="day5" name="day[]" value="4" class="chk-col-info" />
                    <label for="day5">Vendredi</label>
                </div>
                <div>
                    <input type="time" class="input" name="time[]" id="time5">
                </div>
            </div>

            <div class="col-lg-4 d-flex justify-content-between p-2 border">
                <div> <input type="checkbox" id="day6" name="day[]" value="5" class="chk-col-info" />
                    <label for="day6">Samedi</label>
                </div>
                <div>
                    <input type="time" class="input" name="time[]" id="time6">
                </div>
            </div>

            <div class="col-lg-4 d-flex justify-content-between p-2 border">
                <div> <input type="checkbox" id="day7" name="day[]" value="6" class="chk-col-info" />
                    <label for="day7">Dimanche</label>
                </div>
                <div>
                    <input type="time" class="input" name="time[]" id="time7">
                </div>
            </div>

        </div>
        @error('day')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
        @error('time')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    @endif


</div>

<style>
    .input {
        outline: none;
        border: none;
    }

    .input:focus {
        outline: none;
    }
</style>

<script>
    $(document).ready(function() {
        $("[id^='day']").change(function() {
            var dayId = $(this).attr('id').replace('day', '');

            var timeInput = $("#time" + dayId);

            timeInput.prop('required', $(this).prop('checked'));
        });
    });
</script>
