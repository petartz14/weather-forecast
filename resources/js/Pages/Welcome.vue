<script setup>
import AppLayout from "@/Layouts/App.vue";
import Button from "@/Components/Button.vue";
</script>

<template>
    <AppLayout title="Welcome">
        <div class="w-1/2 m-auto pt-24">
            <div class="pb-5">
                Welcome to the weather forecast web application. Please login
                with your Github user to use the application and view weather in
                your city.
            </div>
            <Button type="button">Login</Button>
        </div>
    </AppLayout>
</template>
