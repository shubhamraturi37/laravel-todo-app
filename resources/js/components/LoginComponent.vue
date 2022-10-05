<template>
    <div class="container d-flex">
        <div class="card m-2" style="width: 18rem;" v-for="user in userData">
         <div class="p-2 bd-highlight col-example""> <div class="first-name">
              {{ user.name }}
          </div>
         </div>
            <div class="card-body">
                <h5 class="card-title">{{ user.name }}</h5>
                <p class="card-text">{{user.email}}</p>
                <a href="#" class="btn btn-primary" disabled>Go somewhere</a>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: ['username'],
    data: function () {
        return {
            userData: JSON.parse(this.username)
        }
    },

    mounted() {
        console.log(this.userData);

    },
    methods: {

        clickEvent: function () {
            // console.log(this.uname)
            // console.log(this.password)
        }
    }
}
</script>
