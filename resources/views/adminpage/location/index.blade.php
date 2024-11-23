@extends('adminpage.template.main')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card mb-4">
                    <div class="card-header">Setting Location</div>
                    <div class="card-body">
                        <form action="{{ route('set-location.update', Crypt::encrypt($dataLocation->id)) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="form-group">
                                <label for="head_office">Head Office*</label>
                                <input type="text" name="head_office" id="head_office"
                                    class="form-control @error('head_office') is-invalid @enderror"
                                    placeholder="Insert Head Office" required
                                    value="{{ old('head_office', $dataLocation->head_office) }}"
                                    onkeypress="return /[0-9]/.test(event.key)">
                                @error('head_office')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="branch_office">Workshop*</label>
                                <input type="text" name="branch_office" id="branch_office"
                                    class="form-control @error('branch_office') is-invalid @enderror"
                                    placeholder="Insert Workshop" required
                                    value="{{ old('branch_office', $dataLocation->branch_office) }}"
                                    onkeypress="return /[0-9]/.test(event.key)">
                                @error('branch_office')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="maps">Link Maps*</label>
                                <input type="text" name="maps" id="maps"
                                    class="form-control @error('maps') is-invalid @enderror" placeholder="Insert Link Maps"
                                    required value="{{ old('maps', $dataLocation->maps) }}"
                                    onkeypress="return /[0-9]/.test(event.key)">
                                @error('maps')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
