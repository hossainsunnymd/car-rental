<script setup>
import { usePage ,router,Link } from '@inertiajs/vue3';
const page=usePage();

const filterCarbyType=(e)=>{
    const type=e.target.value;
    router.get(`/car-list-by-type/${type}`);
}

const filterCarbyBrand=(e)=>{
    const type=e.target.value;
    router.get(`/car-list-by-brand/${type}`);
}

const filterCarbyPrice=(e)=>{
    const type=e.target.value;
    router.get(`/car-list-by-price/${type}`);
}

</script>

<template>
    <main class="my-8">
        <div class="container mx-auto px-6">
            <div v-if="page.props.user.login==true" class="flex justify-between mt-8">
                <div>
                    <select @change="filterCarbyType"  class="border border-gray-500 rounded-md h-[35px] w-[350px] p-2 bg-white">
                        <option value="all" selected>All Car</option>
                        <option v-for="(car,i) in page.props.carList" :key="i" :value="car.car_type"> {{car.car_type}}</option>
                    </select>
                </div>
                <div>
                    <select @change="filterCarbyBrand" class="border border-gray-500 rounded-md h-[35px] w-[350px] p-2 bg-white">
                        <option value=""selected>All Brand</option>
                        <option v-for="(car,i) in page.props.carList" :key="i" :value="car.brand"> {{car.brand}}</option>
                    </select>
                </div>
                <div>
                   <input @change="filterCarbyPrice" type="text" class="border border-gray-500 rounded-md h-[35px] w-[350px] p-2 bg-white" placeholder="Search by rent price">
                </div>
            </div>
            <div class="mt-16">
                <h3 class="text-gray-600 text-3xl font-medium text-center">Available Cars for rent</h3>
                <div class="grid gap-6 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 mt-6">
                    <div v-for="(car,i) in page.props.carList" :key="i" class="w-full max-w-sm mx-auto rounded-md shadow-md overflow-hidden">
                        <div class="flex items-end justify-end h-56 w-full bg-cover" style="background-image: url('https://images.unsplash.com/photo-1518306727298-4c17e1bf6942?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MzB8fGNhcnxlbnwwfHwwfHx8MA%3D%3D')">
                            <Link :href="`/car-details/${car.id}`" class="p-2 rounded-full bg-blue-600 text-white mx-5 -mb-4 hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                                <svg class="h-5 w-5" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" viewBox="0 0 24 24" stroke="currentColor"><path d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                           </Link>
                        </div>
                        <div class="px-5 py-3">
                            <h3 class="text-gray-700 uppercase">{{car.name}}</h3>
                            <h4 class="mt-5">Brand: {{car.brand}} | Type: {{car.car_type}} | Year: {{car.year}}</h4>
                            <span class="text-gray-500 "> Daily Rent: $ {{car.daily_rent_price}}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

</template>

<style scoped>

</style>
