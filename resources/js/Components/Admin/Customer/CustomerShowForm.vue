<script setup>
import { usePage,Link,router } from '@inertiajs/vue3';
import { ref } from 'vue';
const page=usePage();


const detailsHeader=[
    {text:"ID",value:'id'},
    {text:"Car Name",value:'car.name'},
    {text:"Start Date",value:'start_date'},
    {text:"End Date",value:'end_date'},
    {text:"Total Cost",value:'total_cost'},
    {text:"Status",value:'status'},
    {text:"Action",value:'action'},

]
const item=ref(page.props.details.rentals);
function deleteRental(id) {
    if (confirm("Are you sure you want to delete this rental?")) {
        router.get(`/admin/rental-delete?id=${id}`);
    }
}

</script>

<template>


<div class=" p-5 lg:p-10 overflow-hidden relative">
<div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
    <div class="md:flex items-center -mx-10">
        <div class="w-full md:w-1/2 px-10">
            <h1 class="font-bold uppercase text-2xl mb-5"> Customer Details</h1>
            <div class="mb-10">
                <h1 class="  text-2xl mb-5"> Name: {{page.props.details.name}}</h1>
                <h4 class="mt-5 font-medium"> Email: {{ page.props.details.email }}</h4>
            </div>
        </div>
    </div>
</div>
</div>

<div class="p-6">
    <EasyDataTable  buttons-pagination alternating :items="item" :headers="detailsHeader" :rows-per-page="5">
        <template #item-action="{ id }">
            <Link
                    :href="`/admin/rental-save-page`"
                    :data="{ id }"
                    class="py-1 px-3 bg-green-600 rounded-md text-white hover:bg-green-700 mr-1"
                >
                    Edit
                </Link>

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

<style scoped>

</style>
