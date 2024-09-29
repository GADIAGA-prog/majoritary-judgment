@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.astreinte.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.astreintes.update", [$astreinte->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="emplois">{{ trans('cruds.astreinte.fields.emploi') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('emplois') ? 'is-invalid' : '' }}" name="emplois[]" id="emplois" multiple required>
                    @foreach($emplois as $id => $emploi)
                        <option value="{{ $id }}" {{ (in_array($id, old('emplois', [])) || $astreinte->emplois->contains($id)) ? 'selected' : '' }}>{{ $emploi }}</option>
                    @endforeach
                </select>
                @if($errors->has('emplois'))
                    <span class="text-danger">{{ $errors->first('emplois') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.astreinte.fields.emploi_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="montant">{{ trans('cruds.astreinte.fields.montant') }}</label>
                <input class="form-control {{ $errors->has('montant') ? 'is-invalid' : '' }}" type="number" name="montant" id="montant" value="{{ old('montant', $astreinte->montant) }}" step="1" required>
                @if($errors->has('montant'))
                    <span class="text-danger">{{ $errors->first('montant') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.astreinte.fields.montant_helper') }}</span>
            </div>
            <div class="form-group">
                <label class="required" for="zones">{{ trans('cruds.astreinte.fields.zone') }}</label>
                <div style="padding-bottom: 4px">
                    <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                    <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                </div>
                <select class="form-control select2 {{ $errors->has('zones') ? 'is-invalid' : '' }}" name="zones[]" id="zones" multiple required>
                    @foreach($zones as $id => $zone)
                        <option value="{{ $id }}" {{ (in_array($id, old('zones', [])) || $astreinte->zones->contains($id)) ? 'selected' : '' }}>{{ $zone }}</option>
                    @endforeach
                </select>
                @if($errors->has('zones'))
                    <span class="text-danger">{{ $errors->first('zones') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.astreinte.fields.zone_helper') }}</span>
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