<template>
    <div>
        <Header />
        <div class="container mt-4">
            <slot></slot>
        </div>
    </div>
</template>

<script setup>
import Header from './Header.vue';
</script>

<style>
.container {
    max-width: 1200px;
    margin: 0 auto;
}
</style>
