<script setup lang="ts">
import AppLayout from "@/Layouts/App.vue";
import TextInput from "@/Components/TextInput.vue";
import Button from "@/Components/Button.vue";
import { router, usePage } from "@inertiajs/vue3";
import { ref, computed } from "vue";

const page = usePage();

let user = computed(() => page.props.user);

let search = ref<string>("");

const login = () => {
    router.get(route("auth.github"));
};
</script>

<template>
    <AppLayout title="Welcome">
        <div class="m-auto pt-24">
            <div class="pb-5 text-center">
                {{ user.name }}
                <p class="py-1">{{ user.github_url }}</p>
            </div>
            <TextInput v-model="search" placeholder="Search" />
            <Button @click="login" class="mt-3" type="button">
                Display Weather
            </Button>
        </div>
    </AppLayout>
</template>
