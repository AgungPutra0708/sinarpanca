@extends('adminpage.template.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="m-0 font-weight-bold text-primary">
                            {{ isset($dataProject) ? 'Edit Project' : 'Create Project' }}
                        </h6>
                    </div>
                    <div class="card-body">
                        <form
                            action="{{ isset($dataProject) ? route('set-project.update', Crypt::encrypt($dataProject->id)) : route('set-project.store') }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @if (isset($dataProject))
                                @method('PUT')
                            @endif

                            <!-- Project Name Field -->
                            <div class="form-group">
                                <label for="name_project">Project Name*</label>
                                <input type="text" name="name_project" id="name_project"
                                    class="form-control @error('name_project') is-invalid @enderror"
                                    value="{{ old('name_project', $dataProject->name_project ?? '') }}" required>
                                @error('name_project')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!--service project-->
                            <div class="form-group">
                                <label for="service">Service Project*</label>
                                <select id="service" name="service" class="form-control @error('service') is-invalid @enderror" required>
                                    <option value="" disabled selected>-- Pilih Kategori --</option>
                                    <option value="Project Management"
                                        {{ old('service', $dataProject->service ?? '') == 'Project Management' ? 'selected' : '' }}>
                                        Project Management</option>
                                    <option value="Construction Management"
                                        {{ old('service', $dataProject->service ?? '') == 'Construction Management' ? 'selected' : '' }}>
                                        Construction Management</option>    
                                    <option value="Contructor MEP, Structure and Architect"
                                        {{ old('service', $dataProject->service ?? '') == 'Contructor MEP, Structure and Architect' ? 'selected' : '' }}>
                                        Contructor MEP, Structure and Architect</option>
                                </select>
                            </div>

                            <!-- Picture Upload with Preview -->
                            <div class="form-group">
                                <label for="picture_project">Project Picture*</label>
                                <input type="file" name="picture_project" id="picture_project"
                                    class="form-control-file @error('picture_project') is-invalid @enderror"
                                    accept="image/*">
                                @error('picture_project')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror

                                <!-- Current Picture Preview (for editing) -->
                                @if (isset($dataProject) && $dataProject->picture_project)
                                    <div class="mt-3">
                                        <label>Current Picture:</label>
                                        <img src="{{ asset('img/' . $dataProject->picture_project) }}"
                                            alt="Current Project Picture" style="max-height: 150px;">
                                    </div>
                                @endif

                                <!-- New Picture Preview -->
                                <div class="mt-3">
                                    <label>New Picture Preview:</label>
                                    <img id="new-picture-preview" style="max-height: 150px; display: none;">
                                </div>
                            </div>

                            <!-- Location Field -->
                            <div class="form-group">
                                <label for="location_project" >Project Location*</label>
                                <input type="text" name="location_project" id="location_project"
                                    class="form-control @error('location_project') is-invalid @enderror"
                                    value="{{ old('location_project', $dataProject->location_project ?? '') }}" required>
                                @error('location_project')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Year Field -->
                            <div class="form-group">
                                <label for="year_project">Project Year*</label>
                                <input type="number" name="year_project" id="year_project"
                                    class="form-control @error('year_project') is-invalid @enderror"
                                    value="{{ old('year_project', $dataProject->year_project ?? '') }}" required>
                                @error('year_project')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Status Field -->
                            <div class="form-group">
                                <label for="status_project">Project Status*</label>
                                <select name="status_project" id="status_project"
                                    class="form-control @error('status_project') is-invalid @enderror" required>
                                    <option value="on going"
                                        {{ old('status_project', $dataProject->status_project ?? '') == 'on going' ? 'selected' : '' }}>
                                        On Going</option>
                                    <option value="completed"
                                        {{ old('status_project', $dataProject->status_project ?? '') == 'completed' ? 'selected' : '' }}>
                                        Completed</option>
                                </select>
                                @error('status_project')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Submit and Cancel Buttons -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">
                                    {{ isset($dataProject) ? 'Update Project' : 'Create Project' }}
                                </button>
                                <a href="{{ route('set-project.index') }}" class="btn btn-secondary">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript to preview the new image before uploading -->
    <script>
        document.getElementById('picture_project').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                const preview = document.getElementById('new-picture-preview');
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
            }
        });
    </script>
@endsection
