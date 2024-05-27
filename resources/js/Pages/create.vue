<script setup>
import { useForm, router } from "@inertiajs/vue3";
import { defineProps } from 'vue';

const props = defineProps({
    errors: {
        type: Object,
        default: () => ({})
    },
    success: {
        type: String,
        default: ''
    }
});

const form = useForm({
    name: null,
    email: null,
    phone: null
});

function submit() {
    form.post('/customers');
}
</script>

<template>
    <div class="card col-6 offset-3">
        <div class="card-header">
            Featured
        </div>
        <div class="card-body">
            <form @submit.prevent="submit">
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" v-model="form.name" class="form-control" id="name" aria-describedby="name">
                    <div class="text-danger text-xs" v-if="props.errors.name">{{ props.errors.name[0] }}</div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" v-model="form.email" class="form-control" id="email">
                    <div class="text-danger text-xs" v-if="props.errors.email">{{ props.errors.email[0] }}</div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="number" v-model="form.phone" class="form-control" id="phone">
                    <div class="text-danger text-xs" v-if="props.errors.phone">{{ props.errors.phone[0] }}</div>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <div v-if="props.success" class="alert alert-success mt-3">
                {{ props.success }}
            </div>
        </div>
    </div>
</template>
