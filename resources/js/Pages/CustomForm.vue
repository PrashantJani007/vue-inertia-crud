<template>
    <form @submit.prevent="handleSubmit">
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" v-model="form.name" class="form-control" id="name" aria-describedby="name">
            <div class="text-danger text-xs" v-if="errors.name">{{ errors.name[0] }}</div>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" v-model="form.email" class="form-control" id="email">
            <div class="text-danger text-xs" v-if="errors.email">{{ errors.email[0] }}</div>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Phone</label>
            <input type="number" v-model="form.phone" class="form-control" id="phone">
            <div class="text-danger text-xs" v-if="errors.phone">{{ errors.phone[0] }}</div>
        </div>
        <button type="submit" class="btn btn-primary">{{ submitButtonText }}</button>
        <div v-if="success" class="alert alert-success mt-3">
            {{ success }}
        </div>
    </form>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import { defineProps, defineEmits, toRefs, watch } from 'vue';

const props = defineProps({
    errors: {
        type: Object,
        default: () => ({})
    },
    success: {
        type: String,
        default: ''
    },
    customer: {
        type: Object,
        default: () => ({
            name: null,
            email: null,
            phone: null
        })
    },
    submitButtonText: {
        type: String,
        default: 'Submit'
    }
});

const emits = defineEmits(['submit']);
const { name, email, phone } = toRefs(props.customer);
const form = useForm({
    name: name.value,
    email: email.value,
    phone: phone.value
});

watch(props.customer, (newCustomer) => {
    form.name = newCustomer.name;
    form.email = newCustomer.email;
    form.phone = newCustomer.phone;
});

function handleSubmit() {
    emits('submit', form);
}
</script>
