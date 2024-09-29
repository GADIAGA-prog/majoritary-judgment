@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.astreinte.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.astreintes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.astreinte.fields.id') }}
                        </th>
                        <td>
                            {{ $astreinte->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.astreinte.fields.emploi') }}
                        </th>
                        <td>
                            @foreach($astreinte->emplois as $key => $emploi)
                                <span class="label label-info">{{ $emploi->intitule }}</span>
                            @endforeach
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.astreinte.fields.montant') }}
                        </th>
                        <td>
                            {{ $astreinte->montant }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.astreinte.fields.zone') }}
                        </th>
                        <td>
                            @foreach($astreinte->zones as $key => $zone)
                                <span class="label label-info">{{ $zone->intitule }}</span>
                            @endforeach
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.astreintes.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection