@extends("layouts.doctor_dashboard_layout.master")

@section('title', 'dashobard')


@section('content')

    <div class="page-header">
        <div class="page-header-title d-flex justify-content-between align-items-center">
            <div class="d-inline">
                <h4 class="text-secondary">{{ __('main.Choose your available time for appointments') }} :</h4>
            </div>
            <span class="ml-auto">
                <input type="checkbox" onclick=" for(c in document.getElementsByName('time[]')) document.getElementsByName('time[]').item(c).checked=this.checked">
                {{ __('main.Check/Uncheck') }}
            </span>
        </div>
    </div>
    <form action="{{ route('doctor.update.times') }}" method="POST">
        @csrf
        <div class="card my-3 wow bounceInDown">
            <div class="card-header primary-bg text-white fw-bold">
                {{ __('main.Choose AM Time') }} :
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td><input type="checkbox" @if (in_array('8am', $times_arr)) checked @endif name="time[]" value="8am">8am</td>
                            <td><input type="checkbox" @if (in_array('8.20am', $times_arr)) checked @endif name="time[]" value="8.20am"> 8.20am</td>
                            <td><input type="checkbox" @if (in_array('8.40am', $times_arr)) checked @endif name="time[]" value="8.40am"> 8.40am</td>
                        </tr>

                        <tr>
                            <td><input type="checkbox" @if (in_array('9am', $times_arr)) checked @endif name="time[]" value="9am"> 9am</td>
                            <td><input type="checkbox" @if (in_array('9.20am', $times_arr)) checked @endif name="time[]" value="9.20am"> 9.20am</td>
                            <td><input type="checkbox" @if (in_array('9.40am', $times_arr)) checked @endif name="time[]" value="9.40am"> 9.40am</td>
                        </tr>

                        <tr>
                            <td><input type="checkbox" @if (in_array('10am', $times_arr)) checked @endif name="time[]" value="10am"> 10am</td>
                            <td><input type="checkbox" @if (in_array('10.20am', $times_arr)) checked @endif name="time[]" value="10.20am"> 10.20am</td>
                            <td><input type="checkbox" @if (in_array('10.40am', $times_arr)) checked @endif name="time[]" value="10.40am"> 10.40am</td>
                        </tr>

                        <tr>
                            <td><input type="checkbox" @if (in_array('11am', $times_arr)) checked @endif name="time[]" value="11am"> 11am</td>
                            <td><input type="checkbox" @if (in_array('11.20am', $times_arr)) checked @endif name="time[]" value="11.20am"> 11.20am</td>
                            <td><input type="checkbox" @if (in_array('11.40am', $times_arr)) checked @endif name="time[]" value="11.40am"> 11.40am</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card my-3 wow bounceInUp">
            <div class="card-header primary-bg text-white fw-bold">
                {{ __('main.Choose PM Time') }} :
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                            <td><input type="checkbox" @if (in_array('12pm', $times_arr)) checked @endif name="time[]" value="12pm"> 12pm</td>
                            <td><input type="checkbox" @if (in_array('12.20pm', $times_arr)) checked @endif name="time[]" value="12.20pm"> 12.20pm</td>
                            <td><input type="checkbox" @if (in_array('12.40pm', $times_arr)) checked @endif name="time[]" value="12.40pm"> 12.40pm</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" @if (in_array('1pm', $times_arr)) checked @endif name="time[]" value="1pm"> 1pm</td>
                            <td><input type="checkbox" @if (in_array('1.20pm', $times_arr)) checked @endif name="time[]" value="1.20pm"> 1.20pm</td>
                            <td><input type="checkbox" @if (in_array('1.40pm', $times_arr)) checked @endif name="time[]" value="1.40pm"> 1.40pm</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" @if (in_array('2pm', $times_arr)) checked @endif name="time[]" value="2pm"> 2pm</td>
                            <td><input type="checkbox" @if (in_array('2.20pm', $times_arr)) checked @endif name="time[]" value="2.20pm"> 2.20pm</td>
                            <td><input type="checkbox" @if (in_array('2.40pm', $times_arr)) checked @endif name="time[]" value="2.40pm"> 2.40pm</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" @if (in_array('3pm', $times_arr)) checked @endif name="time[]" value="3pm"> 3pm</td>
                            <td><input type="checkbox" @if (in_array('3.20pm', $times_arr)) checked @endif name="time[]" value="3.20pm"> 3.20pm</td>
                            <td><input type="checkbox" @if (in_array('3.40pm', $times_arr)) checked @endif name="time[]" value="3.40pm"> 3.40pm</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" @if (in_array('4pm', $times_arr)) checked @endif name="time[]" value="4pm"> 4pm</td>
                            <td><input type="checkbox" @if (in_array('4.20pm', $times_arr)) checked @endif name="time[]" value="4.20pm"> 4.20pm</td>
                            <td><input type="checkbox" @if (in_array('4.40pm', $times_arr)) checked @endif name="time[]" value="4.40pm"> 4.40pm</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" @if (in_array('5pm', $times_arr)) checked @endif name="time[]" value="5pm"> 5pm</td>
                            <td><input type="checkbox" @if (in_array('5.20pm', $times_arr)) checked @endif name="time[]" value="5.20pm"> 5.20pm</td>
                            <td><input type="checkbox" @if (in_array('5.40pm', $times_arr)) checked @endif name="time[]" value="5.40pm"> 5.40pm</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" @if (in_array('6pm', $times_arr)) checked @endif name="time[]" value="6pm"> 6pm</td>
                            <td><input type="checkbox" @if (in_array('6.20pm', $times_arr)) checked @endif name="time[]" value="6.20pm"> 6.20pm</td>
                            <td><input type="checkbox" @if (in_array('6.40pm', $times_arr)) checked @endif name="time[]" value="6.40pm"> 6.40pm</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" @if (in_array('7pm', $times_arr)) checked @endif name="time[]" value="7pm"> 7pm</td>
                            <td><input type="checkbox" @if (in_array('7.20pm', $times_arr)) checked @endif name="time[]" value="7.20pm"> 7.20pm</td>
                            <td><input type="checkbox" @if (in_array('7.40pm', $times_arr)) checked @endif name="time[]" value="7.40pm"> 7.40pm</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" @if (in_array('8pm', $times_arr)) checked @endif name="time[]" value="8pm"> 8pm</td>
                            <td><input type="checkbox" @if (in_array('8.20pm', $times_arr)) checked @endif name="time[]" value="8.20pm"> 8.20pm</td>
                            <td><input type="checkbox" @if (in_array('8.40pm', $times_arr)) checked @endif name="time[]" value="8.40pm"> 8.40pm</td>
                        </tr>
                        <tr>
                            <td><input type="checkbox" @if (in_array('9pm', $times_arr)) checked @endif name="time[]" value="9pm"> 9pm</td>
                            <td><input type="checkbox" @if (in_array('9.20pm', $times_arr)) checked @endif name="time[]" value="9.20pm"> 9.20pm</td>
                            <td><input type="checkbox" @if (in_array('9.40pm', $times_arr)) checked @endif name="time[]" value="9.40pm"> 9.40pm</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <button type="submit" class="btn primary-bg fw-bold text-white mb-5 w-100">{{ __('global.update') }}</button>
    </form>
@endsection
