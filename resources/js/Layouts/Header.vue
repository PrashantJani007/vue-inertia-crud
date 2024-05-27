<template>
    <div class="header">
        <h1>Customer</h1>
        <button @click="goToCreate" class="btn btn-primary">Create</button>
    </div>
</template>

<script setup>
import { router } from "@inertiajs/vue3";

function goToCreate() {
    router.get('/customers/create');
}
</script>

<style>
.header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 1rem;
    background-color: #f8f9fa;
    border-bottom: 1px solid #e9ecef;
}
</style>
