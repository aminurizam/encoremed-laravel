<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AppointmentController extends Controller
{
    public function index()
    {
        $appointments = Appointment::with('patient')->orderByDesc('created_at')->get();
        return response()->json(
            $appointments,
            200
        );
    }

    public function create(Request $request)
    {
        $patient = Patient::firstOrCreate([
            'ic_number' => $request->patient_ic,
            'name' => $request->patient_name,
            'mrn' => $request->patient_mrn,
            'mobile_number' => $request->patient_mobile_no,
        ]);

        Appointment::create([
            'code' => (string) Str::uuid(),
            'appt_datetime' => Carbon::createFromFormat('Y-m-d H:i:s', $request->appt_datetime, 'Asia/Kuala_Lumpur')->setTimezone('UTC'),
            'status' => 'pending',
            'patient_id' => $patient->id,
            'arrived_at' => null,
        ]);

        return response()->json('Successfully created appointment', 200);
    }


    public function reschedule(Request $request)
    {
        $appointment = Appointment::find($request->id);
        $appointment->status = 'rescheduled';
        $appointment->save();
        return response()->json([
            'appointment' => $appointment,
            'message' => 'Appointment has been marked as rescheduled',
        ], 200);
    }

    public function arrive(Request $request)
    {
        $appointment = Appointment::find($request->id);
        $appointment->status = 'arrived';
        $appointment->arrived_at = Carbon::now()->toDateTimeString();
        $appointment->save();

        return response()->json([
            'appointment' => $appointment,
            'message' => 'Appointment has been marked as arrived',
        ], 200);
    }
}
