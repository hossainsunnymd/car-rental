<script setup>
import { usePage } from '@inertiajs/vue3';
import SideNav from '../../../AdminLayout/SideNav.vue';

const page=usePage();
</script>

<template>
<div class="min-w-screen min-h-screen  p-5 lg:p-10 overflow-hidden relative">
<div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
    <div class="md:flex items-center -mx-10">
        <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
            <div class="relative">
                <img :src="`/images/${page.props.carDetails.image}`" class="w-full relative z-10" :alt="page.props.carDetails.name">
            </div>
        </div>
        <div class="w-full md:w-1/2 px-10">
            <h1 class="font-bold uppercase text-2xl mb-5">Car Details</h1>
            <div class="mb-10">
                <h1 class="mt-5"> {{page.props.carDetails.name}}</h1>
                <h4 class="mt-5">Brand: {{ page.props.carDetails.brand }}</h4>
                <h4 class="mt-5">Model: {{ page.props.carDetails.model }}</h4>
                <h4 class="mt-5">Year:  {{ page.props.carDetails.year }}</h4>
                <h4 class="mt-5">Type:  {{ page.props.carDetails.car_type }}</h4>
                <h1 class="mt-10 text-3xl font-bold">Daily Rent: $ {{ page.props.carDetails.daily_rent_price }}</h1>
            </div>
        </div>
    </div>
</div>
</div>

</template>

<style scoped>

</style>
