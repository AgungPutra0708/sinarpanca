@extends('adminpage.template.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">Setting Company</div>
                    <div class="card-body">
                        <form action="{{ route('set-company.update', Crypt::encrypt($companyData->id)) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <!-- Name Field -->
                            <div class="form-group">
                                <label for="name">Company Name*</label>
                                <input type="text" name="name" id="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    placeholder="Insert Company Name" required
                                    value="{{ old('name', $companyData->name) }}">
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Motto Field -->
                            <div class="form-group">
                                <label for="motto">Company Motto*</label>
                                <input type="text" name="motto" id="motto"
                                    class="form-control @error('motto') is-invalid @enderror"
                                    placeholder="Insert Company Motto" required
                                    value="{{ old('motto', $companyData->motto) }}">
                                @error('motto')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- No Telp Field -->
                            <div class="form-group">
                                <label for="notelp">Phone Number*</label>
                                <input type="text" name="notelp" id="notelp"
                                    class="form-control @error('notelp') is-invalid @enderror"
                                    placeholder="Insert Phone Number" required
                                    value="{{ old('notelp', $companyData->notelp) }}">
                                @error('notelp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Email Field -->
                            <div class="form-group">
                                <label for="email">Email Address*</label>
                                <input type="email" name="email" id="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Insert Email Address" required
                                    value="{{ old('email', $companyData->email) }}">
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Logo Field with Image Preview -->
                            <div class="form-group">
                                <label for="logo">Company Logo*</label>
                                <input type="file" name="logo" id="logo"
                                    class="form-control-file @error('logo') is-invalid @enderror" accept="image/*">
                                @error('logo')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <!-- Display current logo if available -->
                                <div class="mt-3">
                                    <label>Current Logo:</label>
                                    <div>
                                        @if ($companyData->logo)
                                            <img src="{{ asset('img/' . $companyData->logo) }}" alt="Current Logo"
                                                style="max-height: 150px; display: block;">
                                        @else
                                            <p>No logo available.</p>
                                        @endif
                                    </div>
                                </div>

                                <!-- Preview for new logo upload -->
                                <div class="mt-3">
                                    <label>New Logo Preview:</label>
                                    <img id="new-logo-preview" style="max-height: 150px; display: none;">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- JavaScript to preview the new logo before uploading -->
    <script>
        document.getElementById('logo').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                const preview = document.getElementById('new-logo-preview');
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            }
        });
    </script>
@endsection
