<script setup lang="ts">
import AppLayout from "@/Layouts/App.vue";
import Table from "@/Components/Table.vue";
import { usePage } from "@inertiajs/vue3";

const page = usePage();
const properties = [
    {
        key: "date",
        label: "Date",
    },
    {
        key: "temperature",
        label: "Temp (F)",
    },
    {
        key: "description",
        label: "Description",
        class: "hidden md:table-cell",
    },
    {
        key: "main",
        label: "Main",
        class: "hidden md:table-cell",
    },
    {
        key: "pressure",
        label: "Pressure",
        class: "hidden md:table-cell",
    },
    {
        key: "humidity",
        label: "Humidity",
        class: "hidden md:table-cell",
    },
];
</script>

<template>
    <AppLayout title="Weathers">
        <div>
            <Table :properties="properties" :items="page.props.weathers">
            </Table>
        </div>
    </AppLayout>
</template>
