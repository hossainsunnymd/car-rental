<script setup>
import { usePage,router } from '@inertiajs/vue3';
import { ref } from 'vue';
const page=usePage();

const rentalHeader=[
    {text:'Car Name',value:'car.name'},
    {text:'Car Brand',value:'car.brand'},
    {text:'Start Date',value:'start_date'},
    {text:'End Date',value:'end_date'},
    {text:'Total Cost',value:'total_cost'},
    {text:'Status',value:'status'},
    {text:'Action',value:'action'},
]
console.log(page.props.rentals);
function cancelRental(id){
  if(confirm('Are you sure to cancel this rental?')){
    router.get(`/customer/cancel-rental?id=${id}`);
  }
}
const rentalItem=ref(page.props.rentals);
</script>

<template>

    <div class="p-4 mt-10">
        <EasyDataTable buttons-pagination alternating :headers="rentalHeader" :items="rentalItem" :rows-per-page="5">
            <template #item-action="{ id }">
                <button class="bg-red-500 hover:bg-red-400 px-4 py-1 text-white font-bold" @click="cancelRental(id)">Cancel</button>
            </template>
        </EasyDataTable>
    </div>

</template>

<style scoped>

</style>
