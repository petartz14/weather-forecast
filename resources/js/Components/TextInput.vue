<script setup lang="ts">
import { onMounted, ref } from "vue";

withDefaults(
    defineProps<{
        type?: string;
        modelValue: string;
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
        :type="type"
        :value="modelValue"
        @input="$emit('update:modelValue', $event.target.value)"
    />
</template>
