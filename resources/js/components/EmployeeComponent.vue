<template>
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h2 class="d-inline-flex">Employees</h2>
                <form class="form-inline" @submit.prevent>
                    <a class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create New</a>
                </form>
            </div>
            <div class="card-body">
                <employee-list></employee-list>
            </div>
        </div>
    </div>
</template>

<script>
import EmployeeList from "./EmployeeList";
import {bus} from "../employees";

export default {
    name: "EmployeeComponent",
    components: {EmployeeList},
    data() {
        return {
            query:'',
        }
    },
    methods:{
    }
}
</script>

<style scoped>

</style>
