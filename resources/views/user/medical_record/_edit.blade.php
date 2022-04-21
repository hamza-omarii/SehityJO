    <div class="modal fade" id="editBookig{{ $appointment->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <form action="{{ route('user.update.appointment', $appointment->id) }}" method="POST">
                @csrf
                @method("PUT")
                <input type="hidden" name="doctor_id" value="{{ $appointment->doctor->id }}">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center fw-bold primary-text fs-3" id="exampleModalLabel">{{ __('main.Edit Appoinment') }}</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row g-0">
                            <div class="col-12">
                                @if ($errors->any())
                                    <div class="alert text-danger">
                                        @foreach ($errors->all() as $error)
                                            <span class="fw-bold fs-5">{{ $error }}</span>
                                        @endforeach
                                    </div>
                                @endif
                                <div class="booking rounded">
                                    <div class="date-box d-flex justify-content-center align-items-center rounded-top">
                                        <input type="date" name="booking_date" class="rounded" value="{{ $appointment->booking_date }}">
                                    </div>
                                    <div class="times-box">
                                        <div class="customRadionBtns d-flex justify-content-center align-items-center flex-wrap">
                                            @foreach ($appointment->doctor->times_avilable as $hour)
                                                <div class="m-3">
                                                    <input style="width: 110px" name="booking_time" @if ($appointment->booking_time == $hour) checked @endif label="{{ $hour }}" type="radio" value="{{ $hour }}" class="p-2 text-center rounded">
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('global.close') }}</button>
                        <button type="submit" class="btn bg-primary text-white">{{ __('global.update') }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
