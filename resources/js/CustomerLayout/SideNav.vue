<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { ref } from "vue";
import NavLayout from "./NavLayout.vue";

const page = usePage();

const props = defineProps(["name"]);
const show = ref(false);
function toggleSidebar() {
    document.getElementById("sidebar").classList.toggle("-translate-x-full");
    document.getElementById("top-nav").classList.toggle("ml-0");
}
</script>

<template>
    <NavLayout v-model:show="show" />

    <!-- Top Header -->
    <div
        id="header"
        class="h-[60px] md:hidden fixed top-0 left-0 right-0 z-50 bg-gray-900 text-white"
    >
        <button
            @click="toggleSidebar"
            id="menu-toggle"
            class="p-2 ml-1 mt-1 bg-gray-700 rounded-md hover:bg-gray-600"
        >
            <span class="material-icons">menu</span>
        </button>
    </div>

    <!-- Sidebar -->
    <aside
        id="sidebar"
        class="w-64 bg-gray-900 text-gray-200 shadow-lg flex flex-col fixed inset-y-0 left-0 transform -translate-x-full transition-transform duration-300 md:translate-x-0 z-10 mt-14"
    >
        <div class="text-white p-4">
            <h1 class="text-lg font-bold text-gray-100">
              Hi, {{ page.props.flash.userName }}
            </h1>
        </div>
        <nav class="flex-1 p-4">
            <ul class="space-y-2">
                <li>
                    <Link
                        href="/customer/dashboard"
                        class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-200 hover:text-gray-900"
                    >
                        <span class="material-icons">dashboard</span>
                        <span class="ml-3">Dashboard</span>
                    </Link>
                </li>
                <li>
                    <Link
                        href="/customer/rentals"
                        class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-200 hover:text-gray-900"
                    >
                        <span class="material-icons">directions_car</span>
                        <span class="ml-3">Rentals</span>
                    </Link>
                </li>
                <li>
                    <Link
                        href="/customer/rental-history"
                        class="flex items-center px-4 py-2 rounded-lg hover:bg-gray-200 hover:text-gray-900"
                    >
                        <span class="material-icons">event</span>
                        <span class="ml-3">Rental History</span>
                    </Link>
                </li>
            </ul>
        </nav>
        <div class="p-4 border-t border-gray-700">
            <Link
                href="/logout"
                class="w-full px-4 py-2 text-white bg-red-500 rounded-lg hover:bg-red-600"
            >
                Logout
            </Link>
        </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-6 ml-0 md:ml-64 bg-gray-200 text-gray-900 h-screen">
        <slot></slot>
    </main>
</template>

<style scoped></style>
