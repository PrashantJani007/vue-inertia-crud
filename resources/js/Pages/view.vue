<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    customer: Object
});
</script>

<template>
    <div class="card col-6 offset-3">
        <div class="card-header">
            Customer Details
        </div>
        <div class="card-body">
            <p><strong>Name:</strong> {{ customer.name }}</p>
            <p><strong>Email:</strong> {{ customer.email }}</p>
            <p><strong>Phone:</strong> {{ customer.phone }}</p>
        </div>
    </div>
</template>
