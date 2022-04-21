<div class="modal" tabindex="-1" id="deleteBookig{{ $appointment->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="{{ route('user.remove.appointment', $appointment->id) }}" method="POST">
                @csrf
                @method("DELETE")
                <div class="modal-header">
                    <h5 class="modal-title">{{ __('main.Delete Appoinment') }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>{{ __('global.Are you sure of the deletion process?') }}</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('global.close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ __('global.delete') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
