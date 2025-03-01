<script setup>
import { usePage } from '@inertiajs/vue3';
const page = usePage();

</script>

<template>
    <div
        class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mb-4 mt-[100px]"
    >
        <!-- Total Collection -->
        <div
            class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md h-[200px]"
        >
            <div class="p-4 text-right">
                <p
                    class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600"
                >
                    Total Rentals
                </p>
                <h4
                    class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900"
                >
                    {{ page.props.totalRental }}
                </h4>
            </div>
        </div>

        <!-- Total Customer -->
        <div
            class="relative flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md h-[200px]"
        >
            <div class="p-4 text-right">
                <p
                    class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600"
                >
                    Total Ongoing Rental
                </p>
                <h4
                    class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900"
                >
                {{ page.props.totalOngoingRental }}
                </h4>
            </div>
        </div>

        <!-- Total Category -->
        <div
            class="flex flex-col bg-clip-border rounded-xl bg-white text-gray-700 shadow-md h-[200px]"
        >
            <div class="p-4 text-right">
                <p
                    class="block antialiased font-sans text-sm leading-normal font-normal text-blue-gray-600"
                >
                    Total Completed Rental
                </p>
                <h4
                    class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900"
                >
                {{ page.props.totalCompleteRental }}
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
                   Total Cancelled Rental
                </p>
                <h4
                    class="block antialiased tracking-normal font-sans text-2xl font-semibold leading-snug text-blue-gray-900"
                >
                {{ page.props.totalCancelledRental }}
                </h4>
            </div>
        </div>

    </div>
</template>
