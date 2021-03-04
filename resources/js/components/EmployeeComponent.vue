<template>
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h2 class="d-inline-flex">Employees</h2>
                <form class="form-inline" @submit.prevent>
<!--                    <a class="btn btn-primary btn-sm"></a>-->
                    <router-link to="/employee/create" class="btn btn-primary btn-sm" tag="button">
                        <i class="fa fa-plus"></i> Create New
                    </router-link>
                    <router-link to="/employee" class="btn btn-primary btn-sm" tag="button">
                        <i class="fa fa-plus"></i> Employee List
                    </router-link>
                </form>
            </div>
            <div class="card-body">
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>

<script>
import EmployeeList from "./EmployeeList";

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
.router-link-exact-active{
    visibility: hidden;
    width: 0px;
    height: 0px;
}
</style>
