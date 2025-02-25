<script setup>
import { useForm,usePage } from '@inertiajs/vue3';
import { readonly, ref } from 'vue';

const page=usePage();

let buttonTitle = 'Create A Customer';
let title='Create';
let id=new URLSearchParams(window.location.search).get('id');

const form = useForm({
    name: '',
    email: '',
    password: '',
    id:id
});
 const ishow=ref(true);

let URL='/admin/customer-save';

if(id !==0 && page.props.customer !== null){

    buttonTitle='Update';
    title='Update a Customer';
    URL='/admin/customer-update';
    form.name=page.props.customer.name;
    form.email=page.props.customer.email;
    form.password=page.props.customer.password;
}
function customerSave(){
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
              <label class="leading-loose">Email</label>
              <input v-model="form.email" type="email" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" :readonly="page.props.customer" >
            </div>
            <div class="flex flex-col">
              <label class="leading-loose">Password</label>
              <input v-model="form.password" type="email" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-600" >
            </div>
          </div>
          <div class="pt-4 flex items-center space-x-4">
              <button @click="customerSave()" class="bg-blue-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none"> {{buttonTitle}} </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</template>

<style scoped>

</style>
