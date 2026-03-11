<template>

    <p
        class="bg-transparent border-none text-xs font-semibold text-gray-700 dark:text-gray-200 focus:ring-0 cursor-pointer p-0">
        IN
    </p>

    <select v-model="country_id" @change="setCountry"
        class="bg-transparent border-none text-xs font-semibold text-gray-700 dark:text-gray-200 focus:ring-0 cursor-pointer p-0">

        <option value="60" selected>IN</option>
        <option value="140">GB</option>
        <option value="141">US</option>

    </select>

</template>

<script setup>

import { ref } from 'vue';

const country_name = ref();

const setCountry = () => {

    const country_id = document.querySelector('select').value;

    const select = document.querySelector('select');
    const country_name = select.options[select.selectedIndex].text;
    console.log(country_name);

    localStorage.setItem('country_id', country_id);

}

</script>