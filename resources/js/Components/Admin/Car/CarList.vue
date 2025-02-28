<script setup>
import { Link, router, usePage } from "@inertiajs/vue3";
import { ref } from "vue";

import { createToaster } from "@meforma/vue-toaster";

const toaster = createToaster({ /* options */ });

const page = usePage();

const carsHeader = [
    { text: "ID", value: "id" },
    { text: "Name", value: "name" },
    { text: "Brand", value: "brand" },
    { text: "Model", value: "model" },
    { text: "Year", value: "year" },
    { text: "Car Type", value: "car_type" },
    { text: "Daily Rent Price", value: "daily_rent_price" },
    { text: "Availability", value: "availability" },
    { text: "Image", value: "image" },
    { text: "Action", value: "action" },
];

const item = ref(page.props.carList);
function deleteCar(id) {
    if (confirm("Are you sure you want to delete this car?")) {
        router.get(`/admin/car-delete?id=${id}`);
    }
}

if(page.props.flash.status==true){
    toaster.success(page.props.flash.message);
}else if(page.props.flash.status==false){
    toaster.error(page.props.flash.message);
}
</script>

<template>
    <div class="p-4 mt-10 bg-[#f8f8f8]">
        <h1 class="text-2xl font-bold ">Car List</h1>
        <div class="text-end mb-3">
            <Link
                :href="`/admin/car-save-page?id=${0}`"
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
            <template #item-image="{ image }">
                <img  :src="`/images/${image}`" class="h-[50px]" :alt="image" />
            </template>
            <template #item-action="{ id }">
                <Link
                    :href="`/admin/car-save-page`"
                    :data="{ id }"
                    class="py-1 px-3 bg-green-600 rounded-md text-white hover:bg-green-700"
                >
                    Edit
                </Link>

                <Link :href="`/admin/car-show-page?id=${id}`"
                    class="py-1 px-3 bg-green-600 rounded-md text-white hover:bg-green-700 m-1"
                    >Show</Link
                >

                <button
                    @click="deleteCar(id)"
                    class="py-1 px-3 bg-red-600 rounded-md text-white hover:bg-red-700"
                >
                    Delete
                </button>
            </template>
        </EasyDataTable>
    </div>
</template>

<style scoped></style>
