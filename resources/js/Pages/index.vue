<script setup>
import { defineProps } from "vue";
import { router } from "@inertiajs/vue3";

const props = defineProps({
    customers: Object
});

function destroy(id) {
    if (confirm('Are you sure you want to delete this customer?')) {
        router.get(`/customers/${id}`);
    }
}   

function view(id){
    router.get(`/customers/view/${id}`)
}

function edit(id){
    router.get(`/customers/${id}/edit`);
}
</script>

<template>
    <div class="card col-8 offset-2">
        <table class="table table-bordered table-hover table-sm">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="customer in customers" :key="customer.id">
                    <td>{{ customer.name }}</td>
                    <td>{{ customer.email }}</td>
                    <td>{{ customer.phone }}</td>
                    <td>
                        <button @click.prevent="view(customer.id)" class="btn btn-primary">View</button>&nbsp;&nbsp;
                        <button @click.prevent="edit(customer.id)" class="btn btn-success">Edit</button>&nbsp;&nbsp;
                        <button @click.prevent="destroy(customer.id)" class="btn btn-danger">Delete</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
