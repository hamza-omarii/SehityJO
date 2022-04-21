<div class="modal" tabindex="-1" id="changeState{{ $appointment->id }}">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <form action="{{ route('doctor.changeState.appointment', $appointment->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('main.Change State') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="times-box">
                        <div class="customRadionBtns d-flex flex-wrap">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <input name="state" @if ($appointment->status == 'done') checked @endif label="{{ __('main.done') }}" type="radio" value="done" class="p-2 text-center rounded-pill w-100">
                                </div>
                                <div class="col-12 mb-2">
                                    <input name="state" @if ($appointment->status == 'pending') checked @endif label="{{ __('main.pending') }}" type="radio" value="pending" class="p-2 text-center rounded-pill w-100">
                                </div>
                                <div class="col-12">
                                    <input name="state" @if ($appointment->status == 'failed') checked @endif label="{{ __('main.failed') }}" type="radio" value="failed" class="p-2 text-center rounded-pill w-100">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('global.close') }}</button>
                    <button type="submit" class="btn primary-bg text-white fw-bold">{{ __('global.Save changes') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
