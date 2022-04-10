<!-- Modal -->
<div class="modal fade" id="hosp{{ $hospital->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('global.Are you sure of the deletion process?') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>{{ __('dashboard.All doctors and specialties related to this hospital will be deleted') }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('global.close') }}</button>
                <form action="{{ route('admin.hospitals.destroy', $hospital->id) }}" method="POST">
                    @csrf
                    @method("DELETE")
                    <button type="submit" class="btn btn-danger">{{ __('global.Save changes') }}</button>
                </form>
            </div>
        </div>
    </div>
</div>
