<script setup>
import { ref } from "vue";
import Calendar from "@/Components/Calendar.vue";

const counter = ref(0);
setInterval(() => counter.value++, 1000);
</script>

<template>
    Hello {{ counter }}
    <Calendar />
</template>
