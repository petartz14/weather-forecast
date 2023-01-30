<script setup lang="ts">
import AppLayout from "@/Layouts/App.vue";
import TextInput from "@/Components/TextInput.vue";
import Button from "@/Components/Button.vue";
import { router, usePage } from "@inertiajs/vue3";
import { ref, computed } from "vue";

const page = usePage();

let user = computed(() => page.props.user);

let search = ref<string>("");

const searchWeather = () => {
    router.post(
        route("weathers.store", {
            city: search.value,
        })
    );
    search.value = "";
};
</script>

<template>
    <AppLayout title="Welcome">
        <div class="pt-24 md:flex justify-center">
            <div class="md:w-1/2 pt-10 bg-gray-50 p-6 shadow rounded">
                <div class="pb-5 text-center hidden md:block">
                    {{ user.name }}
                    <p class="py-1">{{ user.github_url }}</p>
                </div>
                <TextInput v-model="search" placeholder="Search city" />
                <div class="flex">
                    <Button
                        @click="searchWeather"
                        class="mt-3 mx-auto"
                        type="button"
                    >
                        Display Weather
                    </Button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
