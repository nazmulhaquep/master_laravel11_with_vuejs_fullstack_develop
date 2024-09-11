<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index()
    {
        // Fetch appointments with client and employee data
        $appointments = Appointment::get();

        // Transform appointments into events format for FullCalendar
        $events = $appointments->map(function ($appointment) {
            return [
                'title' => $appointment->client->name . ' (' . $appointment->employee->name . ')',
                'start' => $appointment->start_time,
                'end' => $appointment->finish_time,
            ];
        });

        return inertia('Calendar/Index', ['events' => $events]);
    }

    public function timeSlot()
    {
        // Fetch appointments with client and employee data
        $appointments = Appointment::get();

        // Transform appointments into events format for FullCalendar
        $events = $appointments->map(function ($appointment) {
            return [
                'title' => $appointment->client->name . ' (' . $appointment->employee->name . ')',
                'start' => $appointment->start_time,
                'end' => $appointment->finish_time,
            ];
        });

        return inertia('Calendar/TimeSlot', ['events' => $events]);
    }
}
