<template>
    <div class="col-lg-12 mb-4">
        <div class="card" @mouseover="cdn($event)">
            <div class="card-header d-flex justify-content-between">
                <h2 class="d-inline-flex">Employees</h2>
                <p>{{ message }}</p>
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
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "EmployeeComponent",
    data() {
        return {
            message: '',
            x: 0,
            y: 0,
            employees: [],
        }
    },
    methods: {
        cdn(event) {
            this.x = event.offsetX;
            this.y = event.offsetY;
            this.message = 'X:'+this.x+'Y:'+this.y;
        }
    }
}
</script>

<style scoped>

</style>
