@extends('adminpage.template.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">Setting Home</div>
                    <div class="card-body">
                        <form action="{{ route('set-home.update', Crypt::encrypt($dataHome->id)) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="client">Clients*</label>
                                <input type="text" name="client" id="client"
                                    class="form-control @error('client') is-invalid @enderror" placeholder="Insert Clients"
                                    required value="{{ old('client', $dataHome->client) }}"
                                    onkeypress="return /[0-9]/.test(event.key)">
                                @error('client')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="project">Projects Completed*</label>
                                <input type="text" name="project" id="project"
                                    class="form-control @error('project') is-invalid @enderror"
                                    placeholder="Insert Projects Completed" required
                                    value="{{ old('project', $dataHome->project) }}"
                                    onkeypress="return /[0-9]/.test(event.key)">
                                @error('project')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="worker">Worker*</label>
                                <input type="text" name="worker" id="worker"
                                    class="form-control @error('worker') is-invalid @enderror" placeholder="Insert Worker"
                                    required value="{{ old('worker', $dataHome->worker) }}"
                                    onkeypress="return /[0-9]/.test(event.key)">
                                @error('worker')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" name="description" id="description"
                                    class="form-control @error('description') is-invalid @enderror"
                                    placeholder="Insert Description" required
                                    value="{{ old('description', $dataHome->description) }}">
                                @error('description')
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
                                        @if ($dataHome->picture)
                                            <img src="{{ asset('img/' . $dataHome->picture) }}" alt="Current Picture"
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

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
