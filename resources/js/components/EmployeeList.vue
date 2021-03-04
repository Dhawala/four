<template>
    <div>
        <div class="row mb-2">
            <div class="col-6">
                <router-link to="/employee/create" class="btn btn-primary btn-sm" tag="button">
                    <i class="fa fa-plus"></i> Create New
                </router-link>
            </div>
        </div>
        <div class="row">
            <form class="form" @submit.prevent>
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-6">
                                <input type="text"
                                       class="form-control"
                                       name="query" id="query"
                                       v-model="query"
                                       placeholder="search by name"
                                       @change="getEmployees(1)"
                                >
                            </div>
                            <div class="col-6">
                                <input type="text"
                                       class="form-control"
                                       name="dep" id="dep"
                                       v-model="department"
                                       placeholder="Search Department"
                                       @change="getEmployees(1)"
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <table class="table table-borderless table-sm">
            <thead>
            <tr>
                <th>Employee name</th>
                <th>Department</th>
                <th>Address</th>
                <th>Date Hired</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="employee in employees.data" :key="employee.id">
                <td>{{ name(employee) }}</td>
                <td>{{ employee.department.name }}</td>
                <td>{{ address(employee) }}</td>
                <td>{{ employee.date_hired }}</td>
            </tr>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
        <div class="col-1">
            <pagination :data="employees"
                        @pagination-change-page="getEmployees"
                        :size="'small'"
                        :limit="5">
            </pagination>
        </div>
    </div>
</template>

<script>
import {bus} from "../employees";

export default {
    name: "EmployeeList",
    data() {
        return {
            employees: {},
            query: '',
            department: '',

        }
    },
    methods: {
        getEmployees(page = 1) {
            axios.get('/api/employees?page=' + page
                + (this.query != '' ? '&name=' + this.query : '')
                + (this.department != '' ? '&department=' + this.department : '')
            ).then(response => {
                this.employees = response.data;
                //console.log(this.query);
            }).catch(e => {
                console.log(e);
            });
        },
        name(emp) {
            return emp.first_name + ' ' + emp.last_name
        },
        address(emp) {
            try {
                return emp.address;
            } catch (e) {
                console.log(e);
            }
        }
    },
    computed: {},

    created() {
        this.getEmployees();
    }

}
</script>

<style scoped>

</style>
