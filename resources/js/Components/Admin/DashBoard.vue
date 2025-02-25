<script setup>
import { usePage } from "@inertiajs/vue3";
const page = usePage();
</script>

<template>
    <div
        class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mb-4 mt-[100px]"
    >

        <div
            class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md h-[200px]"
        >
            <div class="p-4 text-right">
                <p
                    class="block antialiased font-sans text-xl leading-normal font-normal text-blue-gray-600 "
                >
                    Total Cars

                </p>
                <h4
                    class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900"
                >
                {{ page.props.totalCar }}
                </h4>
            </div>
        </div>


        <div
            class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md h-[200px]"
        >
            <div class="p-4 text-right">
                <p
                    class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600"
                >
                   Available Cars
                </p>
                <h4
                    class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900"
                >
                    {{ page.props.availableCar }}
                </h4>
            </div>
        </div>


        <div
            class="flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md h-[200px]"
        >
            <div class="p-4 text-right">
                <p
                    class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600"
                >
                    Rentals
                </p>
                <h4
                    class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900"
                >
                    {{ page.props.rentals }}
                </h4>
            </div>
        </div>


        <div
            class="flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md h-[200px]"
        >
            <div class="p-4 text-right">
                <p
                    class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600"
                >
                    Total Earnings
                </p>
                <h4
                    class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900"
                >
                   $ {{ page.props.total }}
                </h4>
            </div>
        </div>

    </div>
</template>

<style scoped></style>
