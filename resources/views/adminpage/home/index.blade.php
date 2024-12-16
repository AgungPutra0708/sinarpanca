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
                                <label for="worker">Expertise*</label>
                                <input type="text" name="worker" id="worker"
                                    class="form-control @error('worker') is-invalid @enderror"
                                    placeholder="Insert Expertise" required
                                    value="{{ old('worker', $dataHome->worker) }}"
                                    onkeypress="return /[0-9]/.test(event.key)">
                                @error('worker')
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
