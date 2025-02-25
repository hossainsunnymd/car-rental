<script setup>
import FooterSection from '../../Components/FrontEnd/FooterSection.vue';
import HeaderSection from '../../Components/FrontEnd/HeaderSection.vue';
import { usePage,useForm } from '@inertiajs/vue3';

const page=usePage();
const form=useForm({
    end_date:'',
    start_date:'',
    car_id:page.props.carDetails.id
});


const rentCar=()=>{
    form.post('/car-rental');
}


</script>

<template>
    <HeaderSection/>
<!-- component -->
<div class="min-w-screen min-h-screen  flex items-center p-5 lg:p-10 overflow-hidden relative">
    <div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
        <div class="md:flex items-center -mx-10">
            <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
                <div class="relative">
                    <img :src="page.props.carDetails.image" class="w-full relative z-10" :alt="page.props.carDetails.name">

                </div>
            </div>
            <div class="w-full md:w-1/2 px-10">
                <div class="mb-10">
                    <h1 class="font-bold uppercase text-2xl mb-5"> {{page.props.carDetails.name}}</h1>
                    <h4 class="mt-5">Brand: {{ page.props.carDetails.brand }}</h4>
                    <h4 class="mt-5">Model: {{ page.props.carDetails.model }}</h4>
                    <h4 class="mt-5">Year:  {{ page.props.carDetails.year }}</h4>
                    <h4 class="mt-5">Type:  {{ page.props.carDetails.car_type }}</h4>
                    <h1 class="mt-10 text-3xl font-bold">Daily Rent: $ {{ page.props.carDetails.daily_rent_price }}</h1>
                </div>
                <div>
                    <div class="flex gap-10">
                        <p class="border rounded-md border-gray-400 p-1 w-full">
                            <input v-model="form.start_date" type="date">
                        </p>
                        <p class="border border-gray-400 p-1 w-full rounded-md">
                            <input v-model="form.end_date" type="date">
                        </p>
                    </div>
                    <div class="inline-block align-bottom mt-5">
                        <button @click="rentCar" class="bg-yellow-300 opacity-75 hover:opacity-100 text-yellow-900 hover:text-gray-900 rounded-full px-10 py-2 font-semibold"><i class="mdi mdi-cart -ml-2 mr-2"></i> RENT NOW</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<FooterSection/>
</template>

<style scoped>

</style>
