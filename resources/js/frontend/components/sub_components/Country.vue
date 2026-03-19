<template>

    <select v-if="!userStore.user" v-model="country_id" @change="setCountry"
        class="bg-transparent border-none text-xs font-semibold text-gray-700 dark:text-gray-200 focus:ring-0 cursor-pointer p-0">

        <option value="60">IN</option>
        <option value="140">GB</option>
        <option value="141">US</option>

    </select>
    <p v-else
        class="bg-transparent border-none text-xs font-semibold text-gray-700 dark:text-gray-200 focus:ring-0 cursor-pointer p-0">
        {{ userStore.country_name }}
    </p>


</template>

<script setup>

import { ref, onMounted } from 'vue';
import { useUserStore } from '../../stores/user';
import api from '../../services/api';


const userStore = useUserStore()

const country_name = ref();
const country_id = ref();

const setCountry = () => {

    const select = document.querySelector('select');
    const country_number = select.value;
    const country_text = select.options[select.selectedIndex].text;

    //console.log(country_name + "----" + country_id);

    localStorage.setItem('country_id', country_number);
    localStorage.setItem('country_name', country_text);

    const storedName = localStorage.getItem('country_name')
    if (storedName) {
        country_name.value = storedName
    }

}

onMounted(() => {

    const storedId = localStorage.getItem('country_id')
    const storedName = localStorage.getItem('country_name')

    if (storedId) {
        country_id.value = storedId
    }

    if (storedName) {
        country_name.value = storedName
    }

})

</script>