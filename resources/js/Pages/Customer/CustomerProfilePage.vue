<script setup>
import { Link, router, useForm,usePage } from '@inertiajs/vue3';
import { createToaster } from "@meforma/vue-toaster";
import SideNav from '../../CustomerLayout/SideNav.vue';

const toaster = createToaster({ /* options */ });
const page=usePage();

const form = useForm({
    name: page.props.user.name,
    email: page.props.user.email,
    password: page.props.user.password
});

function submit(){
    form.post('/update-profile');
}

</script>

<template>
<!-- component -->
 <SideNav>
<div class=" h-screen  flex items-center">
        <div class="h-max mx-auto flex flex-col items-center">
            <h1 class="text-xl font-bold text-center pb-10">Your Profile</h1>
            <div class="bg-white shadow-xl p-10 flex flex-col gap-4 text-sm">
                <div>
                    <label class="text-gray-600 font-bold inline-block pb-2" for="name">name</label>
                    <input v-model="form.name" class="border border-gray-400 focus:outline-slate-400 rounded-md w-full shadow-sm px-5 py-2" type="text" name="text">
                </div>
                <div>
                    <label class="text-gray-600 font-bold inline-block pb-2" for="email">Email</label>
                    <input v-model="form.email" class="border border-gray-400 focus:outline-slate-400 rounded-md w-full shadow-sm px-5 py-2" type="email" name="email" readonly>
                </div>
                <div>
                    <label class="text-gray-600 font-bold inline-block pb-2" for="password">Password</label>
                    <input v-model="form.password" class="border border-gray-400 focus:outline-slate-400 rounded-md w-full shadow-sm px-5 py-2" type="password" name="password">
                </div>
                <div>
                    <button @click="submit()" class="bg-[#4F46E5] w-full py-2 rounded-md text-white font-bold cursor-pointer hover:bg-[#181196]" type="button">Update</button>
                </div>
            </div>
        </div>
    </div>
</SideNav>
</template>

<style scoped>

</style>
