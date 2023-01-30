<script setup lang="ts">
withDefaults(
    defineProps<{
        type: string;
    }>(),
    {
        type: "text",
    }
);
</script>

<template>
    <input class="relative block w-full rounded text-sm" :type="type" />
</template>
