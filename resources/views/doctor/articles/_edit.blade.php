<!-- Modal Open when click btn-->
<div class="modal fade" id="editModal{{ $article->id }}" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">{{ __('main.create new article') }} :</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('doctor.articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="modal-body">
                    <div class="form-floating mb-3">
                        <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" value="{{ old('title', $article->title) }}">
                        <label for="title">{{ __('main.title') }}</label>
                        @error('title')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-floating mb-3">
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" style="height: 120px">{{ old('title', $article->title) }}</textarea>
                        <label for="description">{{ __('main.description') }}</label>
                        @error('description')
                            <div class="alert text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <div>
                            <label for="formFile" class="label col-form-label text-secondary">{{ __('main.old Image') }} :</label>
                            <img src="{{ $article->image_url }}" class="img-fluid" alt="edit-pic">
                        </div>
                        <hr>
                        <div>
                            <label for="formFile" class="label col-form-label text-secondary">{{ __('main.Replace image') }} :</label>
                            <input type="file" name="image" class="form-control form-control-lg" accept="image/png, image/gif, image/jpeg" style="height: auto" id="formFileLg">
                            @error('image')
                                <div class="alert text-danger">{{ $message }}</div>
                            @enderror
                        </div>
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
