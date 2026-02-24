<?php

namespace App\Services;

use App\Http\Requests\HabitsRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\View\View;
use App\Models\Habits;


class HabitsService {

    public static function index(): View
    {
        $habits = Auth::user()->habits;

        return view('dashboard', compact('habits'));
    }

    public static function create()
    {
        return view('habits.create');
    }

    public static function store(HabitsRequest $request)
    {
        DB::transaction(function () use ($request) {
            Habits::create([
                'name' => $request->validated()['name'],
                'user_id' => Auth::id(),
            ]);

            return redirect()
              ->route('habits.index')
              ->with('success', 'Hábito criado com sucesso!');
        });

        return redirect()
            ->route('habits.index')
            ->with('error', 'Ocorreu um erro ao criar o hábito. Por favor, tente novamente.');
    }

    public static function edit(Habits $habit)
    {
        return view('habits.edit', compact('habit'));
    }

    public static function update(HabitsRequest $request, Habits $habit)
    {

        DB::transaction(function () use ($request, $habit) {
            $habit->update([
                'name' => $request->validated()['name'],
            ]);

            return redirect()
              ->route('habits.index')
              ->with('success', 'Hábito atualizado com sucesso!');
        });

        return redirect()
            ->route('habits.index')
            ->with('error', 'Ocorreu um erro ao atualizar o hábito. Por favor, tente novamente.');
    }

    public static function destroy(Habits $habit)
    {

        DB::transaction(function () use ($habit) {
             $habit->delete();

            return redirect()
              ->route('habits.index')
              ->with('success', 'Hábito deletado com sucesso!');
      });

        return redirect()
            ->route('habits.index')
            ->with('error', 'Ocorreu um erro ao deletar o hábito. Por favor, tente novamente.');
    }

    public static function settings()
    {
        return view('habits.settings', compact('habits'));
    }

    public static function toggle(Habits $habit)
    {
        $data = Carbon::now()->toDateString();

        $habitsLog = $habit->habitsLogs()->whereDate('completed_at', $data)->first();

        if ($habitsLog) {
            $habitsLog->delete();

            return redirect()
                ->route('habits.index')
                ->with('success', 'Hábito desmarcado como concluído para hoje!');
        }

        $habit->habitsLogs()->create([
            'user_id' => Auth::id(),
            'habit_id' => $habit->id,
            'completed_at' => Carbon::now(),
        ]);

        return redirect()
            ->route('habits.index')
            ->with('success', 'Hábito marcado como concluído para hoje!');
    }

    public static function history(?int $year = null): View
    {
        $selectedYear = $year ?? Carbon::now()->year;
        $avaliableYears = range(2024, Carbon::now()->year);

        if(!in_array($selectedYear, $avaliableYears)) {
            abort(404, 'Ano inválido.');
        }

        $startDate = Carbon::create($selectedYear, 1, 1);
        $endDate = Carbon::create($selectedYear, 12, 31, 23, 59, 59);

        $habits = Auth::user()->habits()
            ->with(['habitsLogs' => function($query) use ($startDate, $endDate){
                $query->whereBetween('completed_at', [$startDate, $endDate]);
            }])
            ->get();

        return view('habits.history', compact('habits', 'selectedYear', 'avaliableYears'));
    }
}
