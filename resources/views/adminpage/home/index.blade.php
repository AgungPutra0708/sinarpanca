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
                                <label for="client">Happy Clients*</label>
                                <input type="text" name="client" id="client"
                                    class="form-control @error('client') is-invalid @enderror"
                                    placeholder="Insert Happy Clients" required
                                    value="{{ old('client', $dataHome->client) }}"
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
                                <label for="business">Year In Business*</label>
                                <input type="text" name="business" id="business"
                                    class="form-control @error('business') is-invalid @enderror"
                                    placeholder="Insert Year In Business" required
                                    value="{{ old('business', $dataHome->business) }}"
                                    onkeypress="return /[0-9]/.test(event.key)">
                                @error('business')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
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
@endsection
