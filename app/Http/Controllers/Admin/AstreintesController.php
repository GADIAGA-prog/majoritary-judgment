<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyAstreinteRequest;
use App\Http\Requests\StoreAstreinteRequest;
use App\Http\Requests\UpdateAstreinteRequest;
use App\Models\Astreinte;
use App\Models\Emploi;
use App\Models\Zone;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AstreintesController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('astreinte_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $astreintes = Astreinte::with(['emplois', 'zones'])->get();

        return view('admin.astreintes.index', compact('astreintes'));
    }

    public function create()
    {
        abort_if(Gate::denies('astreinte_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emplois = Emploi::pluck('intitule', 'id');

        $zones = Zone::pluck('intitule', 'id');

        return view('admin.astreintes.create', compact('emplois', 'zones'));
    }

    public function store(StoreAstreinteRequest $request)
    {
        $astreinte = Astreinte::create($request->all());
        $astreinte->emplois()->sync($request->input('emplois', []));
        $astreinte->zones()->sync($request->input('zones', []));

        return redirect()->route('admin.astreintes.index');
    }

    public function edit(Astreinte $astreinte)
    {
        abort_if(Gate::denies('astreinte_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $emplois = Emploi::pluck('intitule', 'id');

        $zones = Zone::pluck('intitule', 'id');

        $astreinte->load('emplois', 'zones');

        return view('admin.astreintes.edit', compact('astreinte', 'emplois', 'zones'));
    }

    public function update(UpdateAstreinteRequest $request, Astreinte $astreinte)
    {
        $astreinte->update($request->all());
        $astreinte->emplois()->sync($request->input('emplois', []));
        $astreinte->zones()->sync($request->input('zones', []));

        return redirect()->route('admin.astreintes.index');
    }

    public function show(Astreinte $astreinte)
    {
        abort_if(Gate::denies('astreinte_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $astreinte->load('emplois', 'zones');

        return view('admin.astreintes.show', compact('astreinte'));
    }

    public function destroy(Astreinte $astreinte)
    {
        abort_if(Gate::denies('astreinte_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $astreinte->delete();

        return back();
    }

    public function massDestroy(MassDestroyAstreinteRequest $request)
    {
        $astreintes = Astreinte::find(request('ids'));

        foreach ($astreintes as $astreinte) {
            $astreinte->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
