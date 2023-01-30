<script setup lang="ts">
import { Head } from "@inertiajs/vue3";
import Navbar from "@/Components/Navbar.vue";

defineProps<{
    title: string;
}>();
</script>

<template>
    <Head :title="title" />
    <div class="relatve overflow-hidden bg-gray-200 h-screen">
        <Navbar />
        <main class="overflow-auto container h-full flex justify-center">
            <div class="max-w-none mx-auto p-6 lg:p-8">
                <slot></slot>
            </div>
        </main>
    </div>
</template>
