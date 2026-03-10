<template>
  <div class="min-h-screen bg-slate-950 flex flex-col items-center justify-center p-6 text-center text-white">
    <div class="max-w-md w-full p-8 bg-slate-900 border border-slate-800 rounded-2xl shadow-2xl backdrop-blur-xl">
      <div class="mb-6 inline-flex items-center justify-center w-20 h-20 rounded-2xl bg-gradient-to-tr from-emerald-500 to-blue-500 shadow-lg shadow-emerald-500/20">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-10 h-10 text-white" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
          <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5" />
        </svg>
      </div>
      
      <h1 class="text-4xl font-extrabold mb-4 tracking-tight">
        <span class="bg-clip-text text-transparent bg-gradient-to-r from-emerald-400 to-blue-400">
          Laravel + Vue.js
        </span>
      </h1>
      
      <div class="bg-slate-800/50 rounded-lg p-4 mb-8">
        <p class="text-slate-300 font-medium">
          {{ message }}
        </p>
      </div>

      <div class="flex items-center justify-center gap-2 text-sm text-emerald-400 font-semibold uppercase tracking-widest bg-emerald-400/10 py-2 px-4 rounded-full border border-emerald-400/20">
        <span class="relative flex h-2 w-2">
          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
          <span class="relative inline-flex rounded-full h-2 w-2 bg-emerald-500"></span>
        </span>
        Integration Status: Active
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const message = ref("Your Vue.js and Laravel integration is perfectly configured! 🚀");
</script>

<style>
@import 'tailwindcss';
</style>
