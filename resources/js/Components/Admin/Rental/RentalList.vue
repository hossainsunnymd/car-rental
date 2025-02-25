<script setup>
import { Link, router, usePage } from "@inertiajs/vue3";
import { ref } from "vue";

const page = usePage();

const carsHeader = [
    { text: "ID", value: "id" },
    { text: "Customer Name", value: "user.name" },
    { text: "Car Name", value: "car.name" },
    { text: "Car Brand", value: "car.brand" },
    { text: "start Date", value: "start_date" },
    { text: "End Date", value: "end_date" },
    { text: "Total Cost", value: "total_cost" },
    { text: "Status", value: "status" },
    { text: "Action", value: "action" },
];

const item = ref(page.props.rentals);

function deleteRental(id) {
    if (confirm("Are you sure you want to delete this rental?")) {
        router.get(`/admin/rental-delete?id=${id}`);
    }
}
</script>

<template>
    <div class="p-4 mt-10 bg-[#f8f8f8]">
        <h1 class="text-2xl font-bold ">Rental List</h1>
        <div class="text-end mb-3">
            <Link
                :href="`/admin/rental-save-page?id=${0}`"
                class="bg-green-600 py-1 px-3 rounded-md text-white hover:bg-green-700"
                >Create</Link
            >
        </div>
        <EasyDataTable
            buttons-pagination
            alternating
            :headers="carsHeader"
            :items="item"
            :rows-per-page="5"
        >

            <template #item-action="{ id }">
                <Link
                    :href="`/admin/rental-save-page`"
                    :data="{ id }"
                    class="py-1 px-3 bg-green-600 rounded-md text-white hover:bg-green-700"
                >
                    Edit
                </Link>

                <Link :href="`/admin/rental-show-page?id=${id}`"
                    class="py-1 px-3 bg-green-600 rounded-md text-white hover:bg-green-700 m-1"
                    >Show</Link
                >

                <button
                    @click="deleteRental(id)"
                    class="py-1 px-3 bg-red-600 rounded-md text-white hover:bg-red-700"
                >
                    Delete
                </button>
            </template>
        </EasyDataTable>
    </div>
</template>

<style scoped></style>

