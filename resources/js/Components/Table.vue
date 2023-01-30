<script setup lang="ts">
// import Pagination from '@/Components/Pagination.vue';
import split from "lodash/split";

defineProps<{
    items: object[];
    properties: object[];
    hasAction?: boolean;
    pagination?: object;
}>();

const getItem = (value, key) => {
    let keys = split(key, ".");
    let item = value[keys[0]];
    for (let i = 1; i < keys.length; i++) {
        item = item ? item[keys[i]] : null;
    }
    return item === "" || item === null ? "-" : item;
};
</script>

<template>
    <div class="flex flex-col">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div
                class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8"
            >
                <div class="overflow-hidden border-b border-gray-300 shadow">
                    <table class="min-w-full divide-y divide-gray-300">
                        <thead class="bg-gray-600">
                            <tr>
                                <th
                                    v-for="property in properties"
                                    scope="col"
                                    class="px-6 py-3 text-xs font-medium tracking-wider text-left text-gray-100 uppercase"
                                    :class="[property.class]"
                                >
                                    {{ property.label }}
                                </th>
                                <th v-if="hasAction" class="sr-only"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr
                                v-for="(item, index) in items"
                                :key="index"
                                :class="
                                    index % 2 === 0 ? 'bg-white' : 'bg-gray-50'
                                "
                            >
                                <td
                                    v-for="property in properties"
                                    class="max-w-xs px-6 py-4 text-sm font-medium text-gray-700 truncate whitespace-nowrap"
                                    :class="[property.class]"
                                >
                                    <span
                                        v-if="
                                            (typeof getItem(
                                                item,
                                                property.key
                                            ) === 'string' &&
                                                typeof getItem(
                                                    item,
                                                    property.key
                                                ) === 'number') ||
                                            (!property.hasOwnProperty(
                                                'isLink'
                                            ) &&
                                                !property.hasOwnProperty(
                                                    'isDate'
                                                ))
                                        "
                                    >
                                        {{ getItem(item, property.key) }}
                                    </span>
                                    <span v-else>
                                        <slot
                                            :name="property.key"
                                            :item="getItem(item, property.key)"
                                        />
                                    </span>
                                </td>
                                <td v-if="hasAction" class="space-x-2">
                                    <slot name="action" :item="item" />
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <div
                        v-if="!items.length"
                        class="text-center w-full text-gray-400 text-sm py-4"
                    >
                        - No record found -
                    </div>
                    <!-- <Pagination v-if="pagination" :pagination="pagination"/> -->
                </div>
            </div>
        </div>
    </div>
</template>
