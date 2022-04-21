<!-- Modal Open when click btn-->
<div class="modal fade" id="editModal{{ $specialization->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('main.edit_specialization') }} :</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('admin.specialization.update', $specialization->id) }}" method="POST">
                @csrf
                @method("PUT")
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" name="name_en" class="form-control @error('name_en') is-invalid @enderror" id="name_en" value="{{ old('name_en', $specialization->getTranslation('name', 'en')) }}">
                        <label for="name_en">{{ __('main.name_en') }}</label>
                        @error('name_en')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" name="name_ar" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" value="{{ old('name_en', $specialization->getTranslation('name', 'ar')) }}">
                        <label for="name_ar">{{ __('main.name_ar') }}</label>
                        @error('name_ar')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">{{ __('global.close') }}</button>
                    <button type="submit" class="btn primary-bg fw-bold text-white">{{ __('global.update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
