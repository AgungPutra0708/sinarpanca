@extends('adminpage.template.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <form action="{{ route('set-service.update', Crypt::encrypt($dataService->id)) }}" method="post"
                    enctype="multipart/form-data">
                    <div class="card mb-4">
                        <div class="card-header">Update Service</div>
                        <div class="card-body">
                            @csrf
                            @method('PUT')

                            <!-- Name Service Field with Error Message -->
                            <div class="form-group">
                                <label for="name_service">Service Name*</label>
                                <input type="text" name="name_service"
                                    class="form-control @error('name_service') is-invalid @enderror"
                                    value="{{ old('name_service', $dataService->name_service) }}">
                                @error('name_service')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Picture Field with Preview of Current and New Image -->
                            <div class="form-group">
                                <label for="picture">Picture*</label>
                                <input type="file" name="picture" id="picture"
                                    class="form-control-file @error('picture') is-invalid @enderror" accept="image/*">
                                @error('picture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <!-- Display current image if available -->
                                <div class="mt-3">
                                    <label>Current Picture:</label>
                                    <div>
                                        @if ($dataService->picture)
                                            <img src="{{ asset('img/' . $dataService->picture) }}" alt="Current Picture"
                                                style="max-height: 150px; display: block;">
                                        @else
                                            <p>No picture available.</p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Preview for new image upload -->
                                <div class="mt-3">
                                    <label>New Picture Preview:</label>
                                    <img id="new-picture-preview" style="max-height: 150px; display: none;">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('set-service.index') }}" class="btn btn-secondary">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript to preview the new image before uploading -->
    <script>
        document.getElementById('picture').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                const preview = document.getElementById('new-picture-preview');
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            }
        });
    </script>
@endsection
