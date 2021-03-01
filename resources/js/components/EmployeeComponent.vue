<template>
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h2 class="d-inline-flex">Employees</h2>
                <form class="form-inline">
                    <a class="btn btn-primary btn-sm"><i class="fa fa-plus"></i> Create New</a>
                </form>
            </div>
            <div class="card-body">
                <form class="form">
                    <div class="col-md-12">
                        <input type="text"
                               class="form-control"
                               name="name" id="name"
                               placeholder="search"
                        >
                    </div>
                </form>
                <employee-list></employee-list>
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
        return {}
    }
}
</script>

<style scoped>

</style>
