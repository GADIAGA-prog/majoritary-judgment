@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.emploi.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.emplois.update", [$emploi->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="intitule">{{ trans('cruds.emploi.fields.intitule') }}</label>
                <input class="form-control {{ $errors->has('intitule') ? 'is-invalid' : '' }}" type="text" name="intitule" id="intitule" value="{{ old('intitule', $emploi->intitule) }}" required>
                @if($errors->has('intitule'))
                    <span class="text-danger">{{ $errors->first('intitule') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emploi.fields.intitule_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="abrev">{{ trans('cruds.emploi.fields.abrev') }}</label>
                <input class="form-control {{ $errors->has('abrev') ? 'is-invalid' : '' }}" type="text" name="abrev" id="abrev" value="{{ old('abrev', $emploi->abrev) }}" required>
                @if($errors->has('abrev'))
                    <span class="text-danger">{{ $errors->first('abrev') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.emploi.fields.abrev_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection