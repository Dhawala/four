<template>
    <div>
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
            </tbody>
            <tfoot>
            </tfoot>
        </table>
    </div>
</template>

<script>
export default {
    name: "EmployeeList",
    data(){
        return{
            employees:[],
        }
    },

}
</script>

<style scoped>

</style>
