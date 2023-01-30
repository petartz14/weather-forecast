<script setup lang="ts">
import { onMounted, ref } from "vue";

withDefaults(
    defineProps<{
        type?: string;
        modelValue: string;
        error?: string;
    }>(),
    {
        type: "text",
    }
);

defineEmits(["update:modelValue"]);

const input = ref(null);

onMounted(() => {
    if (input.value.hasAttribute("autofocus")) {
        input.value.focus();
    }
});

defineExpose({ focus: () => input.value.focus() });
</script>

<template>
    <input
        ref="input"
        class="relative block w-full rounded text-sm"
        :class="{ 'border-red-600': error }"
        :type="type"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    />
    <span v-if="error" class="text-red-600 text-sm pt-1">{{ error }}</span>
</template>
