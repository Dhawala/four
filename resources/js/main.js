
var app = new Vue({
    el: '#app',
    data: {
        message: '',
        x:0,
        y:0,
        employees:[],
    },
    methods:{
        cdn(event){
            this.x = event.offsetX;
            this.y = event.offsetY;
        }
    }
})
