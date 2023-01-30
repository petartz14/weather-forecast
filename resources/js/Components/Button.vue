<script setup lang="ts">
withDefaults(
    defineProps<{
        color?: string;
        variant?: string;
        size?: string;
        rounded?: boolean;
        type?: any;
    }>(),
    {
        color: "gray",
        variant: "solid",
        size: "regular",
        rounded: false,
        type: "submit",
    }
);
</script>

<template>
    <button
        :type="type"
        class="relative px-3 py-1.5 rounded"
        :class="{
            'text-sm': size === 'small',
            'text-normal': size === 'small',
            'bg-gray-800 text-white': variant === 'solid' && color === 'gray',
            'rounded-full': rounded,
        }"
    >
        <slot></slot>
    </button>
</template>
