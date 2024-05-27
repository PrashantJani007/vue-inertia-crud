<script setup>
import { useForm, router } from "@inertiajs/vue3";
import { defineProps } from 'vue';
import CustomerForm from './CustomForm.vue';

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
        required: true
    }
});

const form = useForm({
    name: props.customer.name,
    email: props.customer.email,
    phone: props.customer.phone
});

function submit(form) {
    form.put(`/customers/${props.customer.id}`);
}
</script>

<template>
    <div class="card col-6 offset-3">
        <div class="card-header">
            Edit Customer
        </div>
        <div class="card-body">
            <CustomerForm
                :errors="props.errors"
                :success="props.success"
                :customer="form"
                submitButtonText="Update"
                @submit="submit"
            />
        </div>
    </div>
</template>
