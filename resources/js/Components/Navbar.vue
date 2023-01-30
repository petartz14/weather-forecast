<template>
    <Disclosure as="nav" class="bg-gray-100 border border-b" v-slot="{ open }">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div
                    v-if="user"
                    class="absolute inset-y-0 left-0 flex items-center sm:hidden"
                >
                    <!-- Mobile menu button-->
                    <DisclosureButton
                        class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                    >
                        <span class="sr-only">Open main menu</span>
                        <Bars3Icon
                            v-if="!open"
                            class="block h-6 w-6"
                            aria-hidden="true"
                        />
                        <XMarkIcon
                            v-else
                            class="block h-6 w-6"
                            aria-hidden="true"
                        />
                    </DisclosureButton>
                </div>
                <div
                    class="flex flex-1 sm:items-stretch justify-center sm:justify-start"
                >
                    <div class="flex flex-shrink-0 items-center">
                        <CloudIcon class="h-10 w-10 text-teal-800" />
                        <span
                            class="pl-2 font-bold uppercase tracking-widest"
                            :class="{ block: !user, 'hidden md:block': user }"
                        >
                            Weather Forecast
                        </span>
                    </div>
                    <div v-if="user" class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <a
                                v-for="item in navigation"
                                :key="item.name"
                                :href="item.href"
                                :class="[
                                    item.current
                                        ? 'text-teal-800'
                                        : 'text-gray-800 hover:text-teal-800 hover:scale-105',
                                    'px-3 py-2 rounded-md text-sm font-medium',
                                ]"
                                :aria-current="
                                    item.current ? 'page' : undefined
                                "
                                >{{ item.name }}</a
                            >
                        </div>
                    </div>
                </div>
                <div
                    v-if="user"
                    class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0"
                >
                    <!-- Profile dropdown -->
                    <Menu as="div" class="relative ml-3">
                        <a
                            href="#"
                            @click="logout"
                            :class="[
                                active ? 'bg-gray-100' : '',
                                'block px-4 py-2 text-sm text-gray-700 border border-gray-300 shadow bg-gray-200',
                            ]"
                        >
                            Logout
                        </a>
                    </Menu>
                </div>
            </div>
        </div>

        <DisclosurePanel class="sm:hidden">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <DisclosureButton
                    v-for="item in navigation"
                    :key="item.name"
                    as="a"
                    :href="item.href"
                    :class="[
                        item.current
                            ? 'text-teal-800'
                            : 'text-gray-800 hover:text-teal-800 hover:scale-105',
                        'block px-3 py-2 rounded-md text-base font-medium',
                    ]"
                    :aria-current="item.current ? 'page' : undefined"
                    >{{ item.name }}</DisclosureButton
                >
            </div>
        </DisclosurePanel>
    </Disclosure>
</template>

<script setup>
import {
    Disclosure,
    DisclosureButton,
    DisclosurePanel,
    Menu,
    MenuButton,
    MenuItem,
    MenuItems,
} from "@headlessui/vue";
import { Bars3Icon, XMarkIcon } from "@heroicons/vue/24/outline";
import { CloudIcon } from "@heroicons/vue/24/solid";
import { router, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();

const user = computed(() => page.props.user);

const navigation = [
    {
        name: "Search Weather",
        href: route("weathers.searchWeather"),
        current: page.url === "/weathers/search",
    },
    {
        name: "Weathers",
        href: route("weathers.index"),
        current: page.url === "/weathers",
    },
];

const logout = () => {
    router.post(route("logout"));
};
</script>
