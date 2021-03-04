<template>
    <div>
        <form @submit.prevent>
            <div class="form-group">
                <label for="first_name">First name: </label>
                <input type="text" name="first_name" id="first_name" v-model="employee.first_name">
            </div>
        </form>
    </div>
</template>

<script>
export default {
name: "EmployeeEdit",
    data(){
    return {
        employee:{
            first_name:'',
            last_name:'',
            middle_name:'',
            address:'',
            department_id:null,
            city_id:null,
            state_id:null,
            country_id:null,
            "zip":null,
            birthdate:'',
            date_hired:'',
        }
    };
    }
}
</script>

<style scoped>

</style>
