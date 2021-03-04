<template>
    <div>
        <form @submit.prevent="createEmployee">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="first_name">First Name: </label>
                        <input type="text" class="form-control"
                               name="first_name" id="first_name"
                               v-model="employee.first_name">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="last_name">Last Name: </label>
                        <input type="text" class="form-control"
                               name="last_name" id="last_name"
                               v-model="employee.last_name">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="middle_name">Middle Name: </label>
                        <input type="text" class="form-control"
                               name="middle_name" id="middle_name"
                               v-model="employee.middle_name">
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="address">Address: </label>
                        <textarea class="form-control"
                                  name="address" id="address"
                                  v-model="employee.address">
                        </textarea>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="zip">Birthday: </label>
                        <datepicker
                            :bootstrap-styling="true"
                            v-model="birthdate"
                            :format="'yyyy-MM-dd'"
                        >
                        </datepicker>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="zip">Date Hired: </label>
                        <datepicker
                            :bootstrap-styling="true"
                            v-model="date_hired"
                            :format="'yyyy-MM-dd'"
                        >
                        </datepicker>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="department">Department: </label>
                        <model-select :options="departments"
                                      id="department"
                                      option-value="id"
                                      option-text="name"
                                      v-model="selected_department"
                                      placeholder="select department">
                        </model-select>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>Country: </label>
                        <model-select :options="countries"
                                      option-value="id"
                                      option-text="name"
                                      v-model="selected_country"
                                      placeholder="select country">
                        </model-select>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>State: </label>
                        <model-select :options="states"
                                      option-value="id"
                                      option-text="name"
                                      v-model="selected_state"
                                      placeholder="select state">
                        </model-select>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label>City: </label>
                        <model-select :options="cities"
                                      option-value="id"
                                      option-text="name"
                                      v-model="selected_city"
                                      placeholder="select city">
                        </model-select>
                    </div>
                </div>

                <div class="col-6">
                    <div class="form-group">
                        <label for="zip">ZIP: </label>
                        <input type="text"
                               class="form-control"
                               id="zip"
                               v-model="employee.zip">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="form-group  float-right">
                        <input type="submit" class="form-control btn btn-primary" value="submit">
                    </div>
                </div>
            </div>
        </form>
    </div>
</template>

<script>
import {ModelSelect} from 'vue-search-select';
import Datepicker from 'vuejs-datepicker';
import moment from 'moment'

export default {
    name: "EmployeeCreate",
    components: {
        ModelSelect,
        Datepicker,
        moment
    },
    data() {
        return {
            employee: {
                first_name: '',
                last_name: '',
                middle_name: '',
                address: '',
                department_id: null,
                city_id: null,
                state_id: null,
                country_id: null,
                'zip': null,
                birthdate: '',
                date_hired: ''
            },

            birthdate: '',
            date_hired: '',

            selected_department: {},
            departments: [],

            selected_country: {},
            countries: [],

            selected_state: {},
            states: [],

            selected_city: {},
            cities: [],

        };
    },
    methods: {
        getDepartments() {
            axios.get('../api/departments').then(response => {
                const dep = [];
                response.data.forEach(function (item, index) {
                    dep.push({value: item.id, text: item.name})
                });
                this.departments = dep;
            }).catch(e => {
                console.log(e)
            })
        },
        getCountries() {
            axios.get('../api/countries').then(response => {
                const items = [];
                response.data.forEach(function (item, index) {
                    items.push({value: item.id, text: item.name})
                });
                this.countries = items;
            }).catch(e => {
                console.log(e)
            })
        },
        getStates(country = null) {
            axios.get('../api/states' + (country != '' ? '?country=' + country : '')).then(response => {
                const items = [];
                response.data.forEach(function (item, index) {
                    items.push({value: item.id, text: item.name})
                });
                this.states = items;
            }).catch(e => {
                console.log(e)
            })
        },
        getCities(state = null) {
            axios.get('../api/cities' + (state != '' ? '?state=' + state : '')).then(response => {
                const items = [];
                response.data.forEach(function (item, index) {
                    items.push({value: item.id, text: item.name})
                });
                this.cities = items;
            }).catch(e => {
                console.log(e)
            })
        },
        createEmployee() {
            axios.post('../api/employee/store', this.employee).then(response => {
                console.log(response.data);
            }).catch(e => {
                console.log(e);
            });
        }
    },
    computed: {
        getDepID() {
            return this.selected_department.value;
        },
        isCountry() {
            return this.selected_country.id != undefined
        },
        customDate(date) {
            return moment(date).format("yyyy-mm-dd");
        }
    },
    watch: {
        selected_department(current, previous) {
            this.employee.department_id = current.value;
        },
        selected_country(current, previous) {
            this.employee.country_id = current.value;
            if (current.value != previous.value) {
                this.getStates(this.selected_country.value);
                this.getCities(this.selected_country.value);
            }
        },
        selected_state(current, previous) {
            this.employee.state_id = current.value;
            if (current.value != previous.value) {
                this.getCities(this.selected_state.value);
            }
        },
        selected_city(current, previous) {
            this.employee.city_id = current.value;
        },
        birthdate(current, previous) {
            this.employee.birthdate = moment(current).format('YYYY-MM-DD');
            console.log(this.employee.birthdate);
        },
        date_hired(current, previous) {
            this.employee.date_hired = moment(current).format('YYYY-MM-DD');
            console.log(this.employee.date_hired);
        }
    },
    created() {
        this.getDepartments();
        this.getCountries();
        this.getStates(this.selected_country.value);
        this.getCities(this.selected_state.value);
    }
}
</script>

<style scoped>

</style>
