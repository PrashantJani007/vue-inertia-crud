<template>
    <div class="text-danger text-xs" v-if="error">
        {{ error }}
    </div>
</template>

<script setup>
import { defineProps } from 'vue';

const props = defineProps({
    error: {
        type: String,
        default: ''
    }
});
</script>
