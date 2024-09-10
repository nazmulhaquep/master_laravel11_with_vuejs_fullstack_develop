<script setup>
import FullCalendar from "@fullcalendar/vue3";
import dayGridPlugin from "@fullcalendar/daygrid";
import interactionPlugin from "@fullcalendar/interaction";

// Define your calendar options directly without using `export default`
const calendarOptions = {
    plugins: [dayGridPlugin, interactionPlugin],
    initialView: "dayGridMonth",
    dateClick(info) {
        console.log("Date clicked: ", info.dateStr);
    },
    events: [
        { title: "event 1", date: "2019-04-01" },
        { title: "event 2", date: "2019-04-02" },
    ],
};
</script>

<template>
    <FullCalendar :options="calendarOptions" />
</template>
