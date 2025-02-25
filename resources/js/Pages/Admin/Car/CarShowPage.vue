<script setup>
import { usePage } from '@inertiajs/vue3';
import SideNav from '../../../AdminLayout/SideNav.vue';
import CarShowForm from '../../../Components/Admin/Car/CarShowForm.vue';

const page=usePage();
</script>

<template>

<SideNav>
  <CarShowForm/>
</SideNav>

</template>

<style scoped>

</style>
