<x-app-layout>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Edit Newsletter</h4>
                    <a href="{{ route('blog.index') }}" class="btn btn-sm btn-primary">
                        <i class="fa fa-reply"></i> <span class="btn-icon-add"></span>Back
                    </a>
                </div>
                <div class="card-body">
                    <div class="form-validation">
                        @if (session()->has('success'))
                            <strong class="text-success">{{ session()->get('success') }}</strong>
                        @endif
                        <form action="{{ route('newsletters.update', $newsletter) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Title</label>
                                        <div class="col-lg-6">
                                            <input type="text" name="title" id="title" value="{{ old('title', $newsletter->title) }}" class="form-control @error('title') is-invalid @enderror" required>
                                            @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Publish Date</label>
                                        <div class="col-lg-6">
                                            <input type="date" name="publish_date" id="publish_date" class="form-control @error('publish_date') is-invalid @enderror" value="{{ old('publish_date', $newsletter->publish_date) }}">
                                            @error('publish_date')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Upload Newsletter</label>
                                        <div class="col-lg-6">
                                            <input type="file" name="file_path" id="file_path" class="form-control @error('file_path') is-invalid @enderror" value="{{ old('image_path', $newsletter->image_path) }}">
                                            @error('file_path')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <a href="{{ route('newsletter.download', $newsletter->id) }}" class="btn btn-info btn-sm shadow rounded-pill">
                                        <i class="fa fa-download"></i> Download
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">
                                        <label class="col-lg-6 col-form-label">Status</label>
                                        <div class="col-lg-6">
                                            <select name="status" id="status" class="form-control @error('status') is-invalid @enderror">
                                                <option value="1" {{ $newsletter->status == true ? 'selected' : '' }}>Active</option>
                                                <option value="0" {{ $newsletter->status == false ? 'selected' : '' }}>Inactive</option>
                                            </select>
                                            @error('status')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <button type="submit" class="btn btn-primary mt-4">Update Newsletter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>