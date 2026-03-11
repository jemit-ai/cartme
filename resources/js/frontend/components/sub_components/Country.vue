<template>
    <select v-model="country_id" @change="setCountry">
        <option value="60">IN</option>
        <option value="140">GB</option>
        <option value="141">US</option>
    </select>
</template>
<script setup>
import { ref } from 'vue';

const setCountry = () => {
    const country_id = document.querySelector('select').value;
    console.log(country_id);
    localStorage.setItem('country_id', country_id);
}

</script>