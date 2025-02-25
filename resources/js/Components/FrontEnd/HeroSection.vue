<script setup>
import { usePage } from "@inertiajs/vue3";

const page = usePage();

</script>

<template>
<div class="container mx-auto px-6">
    <div
        class="h-64 rounded-md overflow-hidden bg-cover bg-center"
        style="
            background-image: url('https://images.unsplash.com/photo-1568605117036-5fe5e7bab0b7?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8M3x8Y2FyfGVufDB8fDB8fHww');
        "
    >
        <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
            <div class="px-10 max-w-xl">
                <h2 class="text-2xl text-white font-semibold">Rent a Car</h2>
                <p class="mt-2 text-gray-400">
                    Looking for a comfortable and affordable ride? Our car
                    rental service offers a wide range of vehicles to suit your
                    travel needs. Whether you need a car for a business trip,
                    vacation, or daily commute, we've got you covered. Book now
                    and enjoy a smooth journey!
                </p>

                <button
                    class="flex items-center mt-4 px-3 py-2 bg-blue-600 text-white text-sm uppercase font-medium rounded hover:bg-blue-500 focus:outline-none focus:bg-blue-500"
                >
                    <span>Shop Now</span>
                    <svg
                        class="h-5 w-5 mx-2"
                        fill="none"
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                    >
                        <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <div class="md:flex mt-8 md:-mx-4">
        <div
            class="w-full h-64 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:w-1/2"
            style="
                background-image: url('https://plus.unsplash.com/premium_photo-1686730540270-93f2c33351b6?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8NXx8Y2FyfGVufDB8fDB8fHww');
            "
        >
            <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                <div class="px-10 max-w-xl">
                    <h2 class="text-2xl text-white font-semibold">
                        Car Rental Service
                    </h2>
                    <p class="mt-2 text-gray-400">
                        Looking for a reliable and affordable car rental
                        service? We offer a hassle-free booking process and a
                        variety of vehicles to match your travel needs. Enjoy a
                        smooth ride with our well-maintained cars at unbeatable
                        prices. Rent today!
                    </p>

                    <button
                        class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none"
                    >
                        <span>Shop Now</span>
                        <svg
                            class="h-5 w-5 mx-2"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div
            class="w-full h-64 mt-8 md:mx-4 rounded-md overflow-hidden bg-cover bg-center md:mt-0 md:w-1/2"
            style="
                background-image: url('https://images.unsplash.com/photo-1503376780353-7e6692767b70?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8Y2FyfGVufDB8fDB8fHww');
            "
        >
            <div class="bg-gray-900 bg-opacity-50 flex items-center h-full">
                <div class="px-10 max-w-xl">
                    <h2 class="text-2xl text-white font-semibold">
                        Drive Your Way
                    </h2>
                    <p class="mt-2 text-gray-400">
                        Get the best car rental deals for your next trip!
                        Whether you need a car for business, travel, or daily
                        commute, we have the perfect vehicle for you. Affordable
                        prices, flexible rental periods, and seamless
                        booking—start your journey today!
                    </p>

                    <button
                        class="flex items-center mt-4 text-white text-sm uppercase font-medium rounded hover:underline focus:outline-none"
                    >
                        <span>Shop Now</span>
                        <svg
                            class="h-5 w-5 mx-2"
                            fill="none"
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >
                            <path d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

</template>

<style scoped></style>
