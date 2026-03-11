<template>
<div>

    <Header />

    <main class="container mx-auto mt-5">
        <router-view />
    </main>

    <Footer />

</div>
</template>

<script>
import Header from '../components/Header.vue'
import Footer from '../components/Footer.vue'

export default {
    components: {
        Header,
        Footer
    }
}
</script>