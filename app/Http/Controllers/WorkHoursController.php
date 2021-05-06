<?php

namespace App\Http\Controllers;

use App\Models\Hour;
use Barryvdh\DomPDF\Facade as PDF;

class WorkHoursController extends Controller
{
    public function index()
    {
        $hours = Hour::all();

        return view('employees.index', [
            'hours' => $hours,
        ]);
    }

    public function create()
    {
        return view('employees.create');
    }

    public function store()
    {
        $newEmployeeHours = new Hour();

        $newEmployeeHours->name = request('name');
        $newEmployeeHours->email = request('email');
        $newEmployeeHours->hours = request('hours');
        $newEmployeeHours->start = request('start');

        $newEmployeeHours->save();
        return redirect('/')->with('mssg', 'Horas lançadas com sucesso');
    }

    public function show($id)
    {
        // $employee = Hour::where('email', $email)->get();

        // return view('employees.show', ['employee' => $employee]);

        $employee = Hour::findOrFail($id);

        return view('employees.show', ['employee' => $employee]);
    }

    public function showAllFromEmployee($email)
    {
        $employee = Hour::all()->where('email', $email);
        $count = 0;

        foreach ($employee  as $value) {
            if (isset($value->hours))
                $count += $value->hours;
        }

        return view('employees.showAllOfEmployee', ['employee' => $employee, 'count' => $count]);
    }

    public function createPDF($email)
    {
        $employee = Hour::all()->where('email', $email);
        $count = 0;
        $name = $employee->first()->name;
        foreach ($employee  as $value) {
            if (isset($value->hours))
                $count += $value->hours;
        }
        $pdf = PDF::loadview('employees.showAllOfEmployee', ['employee' => $employee, 'count' => $count]);
        return $pdf->download("$name.pdf");
    }

    public function indexAllHours()
    {
        $hours = Hour::all();

        $periods = [];

        foreach ($hours as $value) {
            if (!in_array($value->start, $periods)) {
                array_push($periods, $value->start);
            }
        }

        $count = 0;
        foreach ($hours  as $value) {
            if (isset($value->hours))
                $count += $value->hours;
        }

        return view('employees.indexTotalHours', ['hours' => $hours, 'count' => $count, 'periods' => $periods]);
    }

    public function showPeriodHours($period)
    {
        $allPeriods = Hour::all()->where('start', $period);

        $count = 0;

        foreach ($allPeriods as $value) {
            if (isset($value->hours)) {
                $count += $value->hours;
            }
        }

        return view('employees.showHoursPerPeriod', ['allPeriods' => $allPeriods, 'count' => $count,]);
    }

    public function destroy($id)
    {
        $hour = Hour::findOrFail($id);
        $hour->delete();

        return redirect('/employees');
    }
}


        // $count = 0;
        // foreach ($allPeriods as $period {
        //     if(isset());
        // }
        // foreach ($allPeriods as $value) {
        //     if (!in_array($value, $final)) {
        //         $final[] = $value;
        //     }
        // }
        // $periods = array_unique($allPeriods);
