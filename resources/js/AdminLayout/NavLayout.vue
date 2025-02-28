<script setup>
import { Link } from '@inertiajs/vue3';
import { ref, computed } from 'vue';

const props = defineProps({
    show: Boolean,

});

const emit = defineEmits(["update:show"]);

function toggleShow() {
    emit("update:show", !props.show);
}
</script>

<template>
    <header class="flex w-full items-center justify-between border-b-2 fixed border-gray-200 bg-gray-900 p-2 h-14 z-10">
        <!-- logo -->
        <div class="flex items-center space-x-2">
            <button type="button" class="text-3xl">
                <i class="bx bx-menu"></i>
            </button>
            <img src="../Assets/vue.svg" alt="">
        </div>

        <!-- button profile -->

        <div>
            <button type="button" @click="toggleShow" class="h-9 w-9 overflow-hidden rounded-full ">
                <img src="https://plchldr.co/i/40x40?bg=111111" alt="plchldr.co" />
            </button>

            <!-- dropdown profile -->
            <div
                class="absolute right-2 mt-1 w-48 divide-y divide-gray-200 rounded-md border border-gray-200 bg-white shadow-md z-50"
                v-if="show"
                x-transition>
                <div class="flex items-center space-x-2 p-2">
                    <img src="https://plchldr.co/i/40x40?bg=111111" alt="plchldr.co" class="h-9 w-9 rounded-full" />
                </div>

                <div class="flex flex-col space-y-3 p-2">
                    <Link href="/admin/read-profile" class="transition hover:text-blue-600">My Profile</Link>
                </div>

                <div class="p-2">
                    <button class="flex items-center space-x-2 transition hover:text-blue-600">
                        <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1">
                            </path>
                        </svg>
                        <Link href="/logout">Log Out</Link>
                    </button>
                </div>
            </div>
        </div>
    </header>
</template>

<style scoped>
</style>

