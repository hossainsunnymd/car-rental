<script setup>
import { Link, router, usePage } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import { createToaster } from "@meforma/vue-toaster";

const toaster = createToaster({});

const page = usePage();

const customerHeader = [
    { text: "SL", value: "id" },
    { text: "Name", value: "name" },
    { text: "Email", value: "email" },
    { text: "Action", value: "action" },
];

const item = ref(page.props.customers);
function deleteCustomer(id) {
    if (confirm("Are you sure you want to delete this Customer?")) {
        router.get(`/admin/customer-delete?id=${id}`);
    }
}
const customerWithIndex = computed(() => {
    return item.value.map((customer, index) => ({
        ...customer,
        customId: index + 1,
    }));
});

if (page.props.flash.status == true) {
    toaster.success(page.props.flash.message);
} else if (page.props.flash.status == false) {
    toaster.error(page.props.flash.message);
}
</script>

<template>
    <div class="p-4 mt-10 bg-[#f8f8f8]">
        <h1 class="text-2xl font-bold">Customer List</h1>
        <div class="text-end mb-3">
            <Link
                :href="`/admin/customer-save-page?id=${0}`"
                class="bg-green-600 py-1 px-3 rounded-md text-white hover:bg-green-700"
                >Create</Link
            >
        </div>
        <EasyDataTable
            buttons-pagination
            alternating
            :headers="customerHeader"
            :items="customerWithIndex"
            :rows-per-page="5"
        >
            <template #item-id="{ customId }">
                {{ customId }}
            </template>

            <template #item-action="{ id }">
                <Link
                    :href="`/admin/customer-save-page`"
                    :data="{ id }"
                    class="py-1 px-3 bg-green-600 rounded-md text-white hover:bg-green-700"
                >
                    Edit
                </Link>

                <Link
                    href="/admin/customer-show-page"
                    :data="{ id }"
                    class="py-1 px-3 bg-green-600 rounded-md text-white hover:bg-green-700 m-1"
                    >Show</Link
                >

                <button
                    @click="deleteCustomer(id)"
                    class="py-1 px-3 bg-red-600 rounded-md text-white hover:bg-red-700"
                >
                    Delete
                </button>
            </template>
        </EasyDataTable>
    </div>
</template>

<style scoped></style>
