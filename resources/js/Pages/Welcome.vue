<script setup>
import AppLayout from "@/Layouts/App.vue";
import Button from "@/Components/Button.vue";
import { router } from "@inertiajs/vue3";

const login = () => {
    router.get(route("auth.github"));
};
</script>

<template>
    <AppLayout title="Welcome">
        <div class="w-1/2 m-auto pt-24">
            <div class="pb-5">
                Welcome to the weather forecast web application. Please login
                with your Github user to use the application and view weather in
                your city.
            </div>
            <Button @click="login" type="button">Login</Button>
        </div>
    </AppLayout>
</template>
