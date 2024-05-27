<script setup>
import { useForm, router } from "@inertiajs/vue3";
import { defineProps } from 'vue';
import CustomerForm from './CustomForm.vue';
import Layout from '../Layouts/Layout.vue';

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

function submit(form) {
    form.post('/customers');
}
</script>

<template>
    <Layout>
        <div class="card col-6 offset-3">
            <div class="card-header">
                Create Customer
            </div>
            <div class="card-body">
                <CustomerForm
                    :errors="props.errors"
                    :success="props.success"
                    :customer="form"
                    submitButtonText="Create"
                    @submit="submit"
                />
            </div>
        </div>
    </Layout>
</template>
