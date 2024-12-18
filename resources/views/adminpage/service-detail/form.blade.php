@extends('adminpage.template.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($dataServiceDetail) ? 'Edit Service Detail' : 'Create Service Detail' }}
                        </h6>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ isset($dataServiceDetail) ? route('set-service-detail.update', Crypt::encrypt($dataServiceDetail->id)) : route('set-service-detail.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($dataServiceDetail))
                                @method('PUT')
                            @endif

                            <!-- Service Detail Name Field -->
                            <div class="form-group">
                                <label for="name_service">Service Detail Name*</label>
                                <input type="text" name="name_service" id="name_service"
                                    class="form-control @error('name_service') is-invalid @enderror"
                                    value="{{ old('name_service', $dataServiceDetail->name_service ?? '') }}" required>
                                @error('name_service')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!--service service-detail-->
                            <div class="form-group">
                                <label for="service">Service Name*</label>
                                <select id="id_service" name="id_service"
                                    class="form-control @error('id_service') is-invalid @enderror" required>
                                    <option value="" disabled selected>-- Pilih Service --</option>
                                    @foreach ($serviceData as $item)
                                        <option value="{{ Crypt::encrypt($item->id) }}"
                                            {{ old('id_service', $dataServiceDetail->id_service ?? '') == $item->id ? 'selected' : '' }}>
                                            {{ $item->name_service }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <!-- Picture Upload with Preview -->
                            <div class="form-group">
                                <label for="picture">Service Detail Picture*</label>
                                <input type="file" name="picture" id="picture"
                                    class="form-control-file @error('picture') is-invalid @enderror" accept="image/*">
                                @error('picture')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <!-- Current Picture Preview (for editing) -->
                                @if (isset($dataServiceDetail) && $dataServiceDetail->picture)
                                    <div class="mt-3">
                                        <label>Current Picture:</label>
                                        <img src="{{ asset('img/' . $dataServiceDetail->picture) }}"
                                            alt="Current Service Detail Picture" style="max-height: 150px;">
                                    </div>
                                @endif

                                <!-- New Picture Preview -->
                                <div class="mt-3">
                                    <label>New Picture Preview:</label>
                                    <img id="new-picture-preview" style="max-height: 150px; display: none;">
                                </div>
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ isset($dataServiceDetail) ? 'Update Service Detail' : 'Create Service Detail' }}
                                </button>
                                <a href="{{ route('set-service-detail.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
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
