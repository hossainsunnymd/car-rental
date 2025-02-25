<script setup>
import { usePage } from '@inertiajs/vue3';
const page=usePage();

</script>

<template>


<div class="min-w-screen min-h-screen   p-5 lg:p-10 overflow-hidden relative">
<div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
    <div class="md:flex items-center -mx-10">
        <div class="w-full md:w-1/2 px-10">
            <h1 class="font-bold uppercase text-2xl mb-5"> Rental Details</h1>
            <div class="mb-10">
                <h1 class=" mt-5 font-medium"> Name: {{page.props.rental.user.name}}</h1>
                <h4 class="mt-5 font-medium">Car Name: {{ page.props.rental.car.name }}</h4>
                <h4 class="mt-5 font-medium">Start Date: {{ page.props.rental.start_date }}</h4>
                <h4 class="mt-5 font-medium">End Date:  {{ page.props.rental.end_date }}</h4>
                <h4 class="mt-5 font-medium">Status:  {{ page.props.rental.status }}</h4>
                <h4 class="mt-5 font-medium">Total Cost: $ {{ page.props.rental.total_cost }}</h4>
            </div>
        </div>
    </div>
</div>
</div>


</template>

<style scoped>

</style>
