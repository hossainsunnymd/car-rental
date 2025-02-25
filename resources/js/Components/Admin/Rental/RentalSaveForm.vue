<script setup>
import { useForm,usePage } from '@inertiajs/vue3';
import { ref } from 'vue';

const page=usePage();

let buttonTitle = 'Create A Rent';
let title='Create A Rent';
const id=new URLSearchParams(window.location.search).get('id');

const form = useForm({
    customer_id: '',
    car_id: '',
    start_date: '',
    end_date: '',
    status: '',
    id: id

});

let URL='/admin/rental-save';

if(id !== 0 && page.props.rental !== null){
    buttonTitle='Update a Rent';
    title='Update a Rent';
    URL='/admin/rental-update';
    form.customer_id=page.props.rental.user.id;
    form.car_id=page.props.rental.car.id;
    form.start_date=page.props.rental.start_date;
    form.end_date=page.props.rental.end_date;
    form.status=page.props.rental.status;
}

function saveRental(){
    form.post(URL);
}

</script>

<template>

<div class="py-6 flex flex-col justify-center sm:py-12">
  <div class="relative py-3 sm:max-w-xl sm:mx-auto">
    <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
      <div class="max-w-md mx-auto">
        <div class="flex items-center space-x-5">
          <div class="h-14 w-14 bg-yellow-200 rounded-full flex flex-shrink-0 justify-center items-center text-yellow-500 text-2xl font-mono">i</div>
          <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
            <h2 class="leading-relaxed"> {{title}} </h2>
            <p class="text-sm text-gray-500 font-normal leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
          </div>
        </div>
        <div class="divide-y divide-gray-200">
          <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
            <div class="flex flex-col">
              <label class="leading-loose">Customer</label>
              <select v-model="form.customer_id" class="bg-white px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                <option selected>Customer</option>
                <option v-for="(user,i) in page.props.users" :key="i" :value="user.id">{{ user.name }}</option>
              </select>
            </div>
            <div class="flex flex-col">
              <label class="leading-loose">Car</label>
              <select v-model="form.car_id" class="bg-white px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                <option selected>Car</option>
                <option v-for="(car,i) in page.props.cars" :key="i" :value="car.id">{{ car.name }}</option>
              </select>
            </div>
            <div class="flex items-center space-x-4">
              <div class="flex flex-col">
                <label class="leading-loose">Start Date</label>
                <div class="relative focus-within:text-gray-600 text-gray-400">
                  <input v-model="form.start_date" type="date" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                </div>
              </div>
              <div class="flex flex-col">
                <label class="leading-loose">End Date</label>
                <div class="relative focus-within:text-gray-600 text-gray-400">
                  <input v-model="form.end_date" type="date" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                </div>
              </div>
            </div>
            <div class="flex flex-col">
              <label class="leading-loose">Status</label>
              <select v-model="form.status" class="bg-white px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                <option value="Cancelled">Cancelled</option>
                <option value="Ongoing">Ongoing</option>
                <option value="Completed">Completed</option>
              </select>
            </div>
          </div>
          <div class="pt-4 flex items-center space-x-4">
              <button @click="saveRental()" class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none"> {{buttonTitle}} </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<style scoped>

</style>

