@extends('adminpage.template.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">Setting Home</div>
                    <div class="card-body">
                        <form action="{{ route('set-about.update', Crypt::encrypt($dataAbout->id)) }}" method="post">
                            @csrf
                            @method('PUT')

                            <!-- Vision Field with Error Message -->
                            <div class="form-group">
                                <label for="vision">Vision*</label>
                                <div id="vision-editor" class="form-control @error('vision') is-invalid @enderror"
                                    style="height: 150px;">
                                    {!! old('vision', $dataAbout->vision) !!}
                                </div>
                                @error('vision')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Mission Field with Error Message -->
                            <div class="form-group">
                                <label for="mission">Mission*</label>
                                <div id="mission-editor" class="form-control @error('mission') is-invalid @enderror"
                                    style="height: 150px;">
                                    {!! old('mission', $dataAbout->mission) !!}
                                </div>
                                @error('mission')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <!-- Description Field with Error Message -->
                            <div class="form-group">
                                <label for="description">Description*</label>
                                <div id="description-editor" class="form-control @error('description') is-invalid @enderror"
                                    style="height: 150px;">
                                    {!! old('description', $dataAbout->description) !!}
                                </div>
                                @error('description')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="hidden" name="vision" id="vision-input">
                            <input type="hidden" name="mission" id="mission-input">
                            <input type="hidden" name="description" id="description-input">

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Initialize Quill editor -->
    <script>
        $(document).ready(function() {
            var visionEditor = new Quill('#vision-editor', {
                theme: 'snow',
                placeholder: 'Insert Vision here...',
                modules: {
                    toolbar: [
                        [{
                            'header': '1'
                        }, {
                            'header': '2'
                        }, {
                            'font': []
                        }],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        ['bold', 'italic', 'underline'],
                        ['link'],
                        ['image'],
                    ]
                }
            });

            var missionEditor = new Quill('#mission-editor', {
                theme: 'snow',
                placeholder: 'Insert Mission here...',
                modules: {
                    toolbar: [
                        [{
                            'header': '1'
                        }, {
                            'header': '2'
                        }, {
                            'font': []
                        }],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        ['bold', 'italic', 'underline'],
                        ['link'],
                        ['image'],
                    ]
                }
            });

            var descriptionEditor = new Quill('#description-editor', {
                theme: 'snow',
                placeholder: 'Insert Description here...',
                modules: {
                    toolbar: [
                        [{
                            'header': '1'
                        }, {
                            'header': '2'
                        }, {
                            'font': []
                        }],
                        [{
                            'list': 'ordered'
                        }, {
                            'list': 'bullet'
                        }],
                        ['bold', 'italic', 'underline'],
                        ['link'],
                        ['image'],
                    ]
                }
            });

            // Function to clean up empty content
            function cleanContent(content) {
                var cleanedContent = content.replace(/<p><br><\/p>/g, ''); // Remove <p><br></p>
                cleanedContent = cleanedContent.trim(); // Trim extra spaces
                return cleanedContent;
            }

            // On form submission, we copy the content from Quill to hidden inputs
            $('form').submit(function(e) {
                // Get the content from Quill editors
                var visionContent = cleanContent(visionEditor.root.innerHTML);
                var missionContent = cleanContent(missionEditor.root.innerHTML);
                var descriptionContent = cleanContent(descriptionEditor.root.innerHTML);

                // Set the cleaned content to the hidden inputs
                $('#vision-input').val(visionContent);
                $('#mission-input').val(missionContent);
                $('#description-input').val(descriptionContent);
            });
        });
    </script>
@endsection
