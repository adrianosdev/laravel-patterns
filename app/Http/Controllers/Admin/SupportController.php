<?php

namespace App\Http\Controllers\Admin;

use App\DTO\CreateSupportDTO;
use App\DTO\UpdateSupportDTO;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateSupport;
use App\Models\Support;
use App\Services\SupportService;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function __construct(
        protected SupportService $service
    ){}
    public function index(Request $request){

        $supports = $this->service->getAll($request->filter);

        return view('admin.supports.index', compact('supports'));
    }

    public function show(string|int $id){

        if(!$support = $this->service->findOne($id)){
            return back();
        }

        return view('admin/supports/show', compact('support'));

    }

    public function create() {
        return view('admin/supports/create');
    }

    public function store(StoreUpdateSupport $request) {

        $this->service->store(
            CreateSupportDTO::makeFromRequest($request)
        );

        return redirect()->route('supports.index');

    }

    public function edit(string|int $id) {

        if(!$support = $this->service->findOne($id)){
            return back();
        }


        return view('admin/supports/edit', compact('support'));

    }

    public function update(UpdateSupportDTO $dto) {

        $this->service->update($dto);

        return redirect()->route('supports.index');

    }

    public function destroy(Support $support, Request $request, string|int $id) {

         $this->service->destroy($id);

         return redirect()->route('supports.index');

    }


}
