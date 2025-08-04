<x-modal-detail />

<div class="modal fade" id="modal" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
     aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content p-2">
            <form method="POST" id="article-form" action="" class="needs-validation" novalidate
                  enctype="multipart/form-data">
                @csrf
                <div class="modal-header d-flex align-items-center">
                    <h5 class="modal-title" id="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="add-detail-box">
                        <div class="add-detail-content">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="title" class="form-label">Title <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required autofocus>
                                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="image" class="form-label">Image <span class="text-danger">*</span></label>
                                    <input type="file" class="form-control" id="image" name="image" value="{{ old('image') }}" required autofocus>
                                    <x-input-error :messages="$errors->get('image')" class="mt-2" />
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <label for="summary" class="form-label">Summary <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="summary" name="summary" rows="5" required>{{ old('summary') }}</textarea>
                                    <x-input-error :messages="$errors->get('summary')" class="mt-2" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn bg-danger-subtle text-danger"
                            data-bs-dismiss="modal">Kembali</button>
                    <button type="submit" onclick="onSubmit(event)" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
