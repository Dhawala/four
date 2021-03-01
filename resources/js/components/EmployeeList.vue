<template>
    <div>
        <table class="table table-borderless table-sm" @click="getEmployees">
            <thead>
            <tr>
                <th>Employee name</th>
                <th>Department</th>
                <th>Address</th>
                <th>Date Hired</th>
            </tr>
            </thead>
            <tbody>
                <tr v-for="employee in employees" :key="employee.id">
                    <td>{{name(employee)}}</td>
                    <td>{{employee.department.name}}</td>
                    <td>{{address(employee)}}</td>
                    <td>{{employee.date_hired}}</td>
                </tr>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
</template>

<script>
export default {
    name: "EmployeeList",
    data() {
        return {
            employees: [],
        }
    },
    methods: {
        getEmployees() {
            axios.get('/api/employees').then(response => {
                this.employees = response.data.data;
            }).catch(e=>{
                console.log(e);
            });
        },
        name(emp){
            return emp.first_name+' '+emp.last_name
        },
        address(emp){
            try {
                return emp.address;
            }catch (e){
                console.log(e);
            }
        }

    },
    computed:{

    },

    created() {
        this.getEmployees();
    }

}
</script>

<style scoped>

</style>
