<script setup lang="ts">
import AppLayout from "@/Layouts/App.vue";
import TextInput from "@/Components/TextInput.vue";
import Button from "@/Components/Button.vue";
import { useForm, usePage } from "@inertiajs/vue3";
import { computed, useAttrs } from "vue";

const page = usePage();
const attrs = useAttrs();

let user = computed(() => page.props.user);

let form = useForm({
    search: "",
});

const searchWeather = () => {
    form.post(route("weathers.store"));
    form.search = "";
};
</script>

<template>
    <AppLayout title="Welcome">
        <div v-if="attrs.errors.message" class="bg-red-200 text-red-600 p-4">
            {{ attrs.errors.message }}
        </div>
        <div class="pt-24 md:flex justify-center">
            <div class="md:w-1/2 pt-10 bg-gray-50 p-6 shadow rounded">
                <div class="pb-5 text-center hidden md:block">
                    {{ user.name }}
                    <p class="py-1">{{ user.github_url }}</p>
                </div>
                <TextInput
                    v-model="form.search"
                    placeholder="Search city"
                    :error="form.errors.search"
                />
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
