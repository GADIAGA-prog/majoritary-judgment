<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyTableauDebordRequest;
use App\Http\Requests\StoreTableauDebordRequest;
use App\Http\Requests\UpdateTableauDebordRequest;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TableauDebordController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('tableau_debord_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tableauDebords.index');
    }

    public function create()
    {
        abort_if(Gate::denies('tableau_debord_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tableauDebords.create');
    }

    public function store(StoreTableauDebordRequest $request)
    {
        $tableauDebord = TableauDebord::create($request->all());

        return redirect()->route('admin.tableau-debords.index');
    }

    public function edit(TableauDebord $tableauDebord)
    {
        abort_if(Gate::denies('tableau_debord_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tableauDebords.edit', compact('tableauDebord'));
    }

    public function update(UpdateTableauDebordRequest $request, TableauDebord $tableauDebord)
    {
        $tableauDebord->update($request->all());

        return redirect()->route('admin.tableau-debords.index');
    }

    public function show(TableauDebord $tableauDebord)
    {
        abort_if(Gate::denies('tableau_debord_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.tableauDebords.show', compact('tableauDebord'));
    }

    public function destroy(TableauDebord $tableauDebord)
    {
        abort_if(Gate::denies('tableau_debord_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tableauDebord->delete();

        return back();
    }

    public function massDestroy(MassDestroyTableauDebordRequest $request)
    {
        $tableauDebords = TableauDebord::find(request('ids'));

        foreach ($tableauDebords as $tableauDebord) {
            $tableauDebord->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
