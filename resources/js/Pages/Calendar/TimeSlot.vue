<script setup>
import FullCalendar from "@fullcalendar/vue3";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";
import timeGridPlugin from "@fullcalendar/timegrid";
import { ref } from "vue";

const props = defineProps(["events"]);

// Define your calendar options
const calendarOptions = ref({
    plugins: [dayGridPlugin, interactionPlugin, timeGridPlugin], // Include necessary plugins
    initialView: "timeGridWeek", // Start with the week view
    // slotDuration: "00:30:00", // 30-minute slots
    slotDuration: "1:00:00", // 30-minute slots
    slotMinTime: "08:00:00", // Start of the calendar time
    slotMaxTime: "18:00:00", // End of the calendar time
    timeZone: "local", // Use local timezone
    events: [], // Initially empty events
    selectable: true, // Allow selecting time slots
    select: handleSelect, // Bind the select event handler
    events: props.events,
    // events: [
    //     {
    //         title: "Meeting with John",
    //         start: "2023-09-10T09:30:00", // Start time in time slot
    //         end: "2023-09-10T10:30:00", // End time
    //     },
    //     {
    //         title: "Lunch Break",
    //         start: "2023-09-10T12:00:00",
    //         end: "2023-09-10T13:00:00",
    //     },
    //     {
    //         title: "Conference Call",
    //         start: "2023-09-11T14:00:00",
    //         end: "2023-09-11T15:00:00",
    //     },
    //     {
    //         title: "Project Review",
    //         start: "2023-09-11T16:00:00",
    //         end: "2023-09-11T17:00:00",
    //     },
    // ],
    // initialDate: "2023-09-10", // Ensure this matches the events' date range
});

// Event handler for adding new events
function handleSelect(info) {
    console.log(info);
    const title = prompt("Enter Event Title");
    if (title) {
        calendarOptions.value.events.push({
            title,
            start: info.startStr,
            end: info.endStr,
            allDay: info.allDay,
        });

        //store data
        // Store the event in the database
        // router.post(route('events.store'), newEvent, {
        //     onSuccess: (response) => {
        //         // Add the event to the calendar
        //         calendarOptions.value.events.push({
        //             title: response.props.event.title,
        //             start: response.props.event.start,
        //             end: response.props.event.end,
        //         });
        //     },
        //     onError: (error) => {
        //         console.error("Error storing the event:", error);
        //     },
        // });
    }
    // Clear the selection
    info.view.calendar.unselect();
}
</script>

<template>
    <FullCalendar :options="calendarOptions" />
</template>
