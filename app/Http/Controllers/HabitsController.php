<?php

namespace App\Http\Controllers;

use App\Http\Requests\HabitsRequest;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\View\View;
use App\Models\Habits;

use App\Services\HabitsService;

class HabitsController extends Controller
{

    use AuthorizesRequests;

    public function index(): View
    {
        return HabitsService::index();
    }

    public function create()
    {
        return HabitsService::create();
    }

    public function store(HabitsRequest $request)
    {
        return HabitsService::store($request);
    }

    public function edit(Habits $habit)
    {
        $this->authorize('update', $habit);

        return HabitsService::edit($habit);
    }

    public function update(HabitsRequest $request, Habits $habit)
    {
        $this->authorize('update', $habit);

        return HabitsService::update($request, $habit);}

    public function destroy(Habits $habit)
    {
        $this->authorize('delete', $habit);

        return HabitsService::destroy($habit);
    }

    public function settings()
    {
        return HabitsService::settings();
    }

    public function toggle(Habits $habit)
    {
        $this->authorize('toggle', $habit);

        return HabitsService::toggle($habit);
    }

    public function history(?int $year = null): View
    {
        return HabitsService::history($year);
    }
}
