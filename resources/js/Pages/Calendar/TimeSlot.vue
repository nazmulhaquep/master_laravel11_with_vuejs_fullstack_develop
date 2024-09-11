<script setup>
import FullCalendar from "@fullcalendar/vue3";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import timeGridPlugin from "@fullcalendar/timegrid"; // Import the time grid plugin

// Define your calendar options
const calendarOptions = {
    plugins: [dayGridPlugin, interactionPlugin, timeGridPlugin], // Include the time grid plugin
    initialView: "timeGridWeek", // Set initial view to time grid week
    slotDuration: "00:30:00", // Set time slot duration to 30 minutes
    slotLabelInterval: "01:00", // Label every hour
    slotMinTime: "08:00:00", // Earliest time displayed on the calendar
    slotMaxTime: "18:00:00", // Latest time displayed on the calendar
    timeZone: "local", // Match browser's timezone
    dateClick(info) {
        console.log("Date clicked: ", info.dateStr);
    },
    events: [
        {
            title: "Meeting with John",
            start: "2023-09-10T09:30:00", // Start time in time slot
            end: "2023-09-10T10:30:00", // End time
        },
        {
            title: "Lunch Break",
            start: "2023-09-10T12:00:00",
            end: "2023-09-10T13:00:00",
        },
        {
            title: "Conference Call",
            start: "2023-09-11T14:00:00",
            end: "2023-09-11T15:00:00",
        },
        {
            title: "Project Review",
            start: "2023-09-11T16:00:00",
            end: "2023-09-11T17:00:00",
        },
    ],
    initialDate: "2023-09-10", // Ensure this matches the events' date range
};
</script>

<template>
    <FullCalendar :options="calendarOptions" />
</template>
