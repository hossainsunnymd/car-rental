<script setup>
import { useForm,usePage } from '@inertiajs/vue3';
import { ref } from 'vue';
import ImageUpload from './ImageUpload.vue';

const page=usePage();

let buttonTitle = 'Create A Car';
let title='Create';
let id=new URLSearchParams(window.location.search).get('id');

const form = useForm({
    name: '',
    brand: '',
    model: '',
    year: '',
    car_type: '',
    daily_rent_price: '',
    availability: '',
    image: '',
    id: id,
});

let URL='/admin/car-save';

if(id !==0 && page.props.car !== null){
    buttonTitle='Update';
    title='Update a Car';
    URL='/admin/car-update';
    form.name=page.props.car.name;
    form.brand=page.props.car.brand;
    form.model=page.props.car.model;
    form.year=page.props.car.year;
    form.car_type=page.props.car.car_type;
    form.daily_rent_price=page.props.car.daily_rent_price;
    form.availability=page.props.car.availability;
    form.image=page.props.car.image;
}
function carSave(){
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
            <h2 class="leading-relaxed"> {{title}}  </h2>
            <p class="text-sm text-gray-500 font-normal leading-relaxed">Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
          </div>
        </div>
        <div class="divide-y divide-gray-200">
          <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
            <div class="flex flex-col">
              <label class="leading-loose">Name</label>
              <input v-model="form.name" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
            </div>
            <div class="flex flex-col">
              <label class="leading-loose">Brand</label>
              <input v-model="form.brand" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" >
            </div>
            <div class="flex items-center space-x-4">
              <div class="flex flex-col">
                <label class="leading-loose">Model</label>
                <div class="relative focus-within:text-gray-600 text-gray-400">
                  <input v-model="form.model" type="text" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                </div>
              </div>
              <div class="flex flex-col">
                <label class="leading-loose">Year</label>
                <div class="relative focus-within:text-gray-600 text-gray-400">
                  <input v-model="form.year" type="text" class="pr-4 pl-10 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
                </div>
              </div>
            </div>
            <div class="flex flex-col">
              <label class="leading-loose">Car Type</label>
              <input v-model="form.car_type" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
            </div>
            <div class="flex flex-col">
              <label class="leading-loose">Availability</label>
              <select v-model="form.availability" name="availability" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600 bg-white">
                <option value="Available">Abailable</option>
                <option value="Not Available">Not Available</option>
              </select>
            </div>
            <div class="flex flex-col">
              <label class="leading-loose">Daily Rent Price</label>
              <input v-model="form.daily_rent_price" type="text" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600">
            </div>
            <div class="flex flex-col">
              <label class="leading-loose">Daily Rent Price</label>
              <ImageUpload :carImage="form.image"
              @image="(e)=>{form.image=e}"/>
            </div>
          </div>
          <div class="pt-4 flex items-center space-x-4">
              <button @click="carSave()" class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none"> {{buttonTitle}} </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</template>

<style scoped>

</style>
