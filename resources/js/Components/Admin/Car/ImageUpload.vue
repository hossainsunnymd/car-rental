<script setup>
import { ref } from "vue";

const props = defineProps({
    carImage: String,
});
const preview = ref('');
const emit = defineEmits(["image"]);

const imageSelected = (e) => {
    preview.value = URL.createObjectURL(e.target.files[0]);

    emit("image", e.target.files[0]);
};
</script>
<template>
    <div>
        <label
            for="image"
            class="block relative mt-1  overflow-hidden cursor-pointer"
        >
            <img
                :src="preview ? preview :`/images/${carImage}`"
                class="object-cover object-center w-[100px] h-[100px]"
                alt=""
            />
        </label>
        <input
            @input="imageSelected($event)"
            type="file"
            name="image"
            id="image"
            hidden
        />
    </div>
</template>
