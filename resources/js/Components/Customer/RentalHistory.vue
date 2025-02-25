<script setup>
import { usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
const page=usePage();

const rentalHeader=[
    {text:'Car Name',value:'car.name'},
    {text:'Car Brand',value:'car.brand'},
    {text:'Start Date',value:'start_date'},
    {text:'End Date',value:'end_date'},
    {text:'Total Cost',value:'total_cost'},
    {text:'Status',value:'status'},
]

const rentalItem=ref(page.props.rentals);

</script>

<template>

    <div class="p-4 mt-10">
        <EasyDataTable buttons-pagination alternating :headers="rentalHeader" :items="rentalItem">
            <template #item-status="{status}">
                <button :class="status=='Cancelled'?'bg-red-500 font-semibold text-white px-2':'bg-green-500 font-semibold text-white px-2'" type="button">{{ status }}</button>
            </template>
        </EasyDataTable>
    </div>

</template>

<style scoped>

</style>

