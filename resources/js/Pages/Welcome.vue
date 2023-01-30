<script setup>
import AppLayout from "@/Layouts/App.vue";
</script>

<template>
    <AppLayout title="Welcome">
        <div class="pt-24 md:flex justify-center">
            <div class="md:w-1/2 bg-gray-50 p-6 shadow-md rounded">
                <div class="pb-5">
                    Welcome to the weather forecast web application. Please
                    login with your Github user to use the application and view
                    weather in your city.
                </div>
                <a
                    :href="route('auth.github')"
                    class="bg-teal-800 text-white px-3 py-1.5 rounded"
                    >Login</a
                >
            </div>
        </div>
    </AppLayout>
</template>
