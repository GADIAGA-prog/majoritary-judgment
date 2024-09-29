@extends('layouts.admin')
@section('content')
@can('astreinte_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.astreintes.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.astreinte.title_singular') }}
            </a>
            <button class="btn btn-warning" data-toggle="modal" data-target="#csvImportModal">
                {{ trans('global.app_csvImport') }}
            </button>
            @include('csvImport.modal', ['model' => 'Astreinte', 'route' => 'admin.astreintes.parseCsvImport'])
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.astreinte.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-Astreinte">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.astreinte.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.astreinte.fields.emploi') }}
                        </th>
                        <th>
                            {{ trans('cruds.astreinte.fields.montant') }}
                        </th>
                        <th>
                            {{ trans('cruds.astreinte.fields.zone') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($astreintes as $key => $astreinte)
                        <tr data-entry-id="{{ $astreinte->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $astreinte->id ?? '' }}
                            </td>
                            <td>
                                @foreach($astreinte->emplois as $key => $item)
                                    <span class="badge badge-info">{{ $item->intitule }}</span>
                                @endforeach
                            </td>
                            <td>
                                {{ $astreinte->montant ?? '' }}
                            </td>
                            <td>
                                @foreach($astreinte->zones as $key => $item)
                                    <span class="badge badge-info">{{ $item->intitule }}</span>
                                @endforeach
                            </td>
                            <td>
                                @can('astreinte_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.astreintes.show', $astreinte->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('astreinte_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.astreintes.edit', $astreinte->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('astreinte_delete')
                                    <form action="{{ route('admin.astreintes.destroy', $astreinte->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('astreinte_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.astreintes.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-Astreinte:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection