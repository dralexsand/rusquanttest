<template>
    <div class="container">
        <MainForm/>
    </div>
</template>

<script>

import MainForm from "../components/MainForm";

export default {
    components: {
        MainForm
    },
    mounted() {
        console.log('App mounted')
    }
}
</script>
