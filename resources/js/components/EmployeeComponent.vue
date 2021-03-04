<template>
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h2 class="d-inline-flex">Employees</h2>
                <form class="form-inline" @submit.prevent>
<!--                    <a class="btn btn-primary btn-sm"></a>-->
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

</style>
