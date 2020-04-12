<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-outline-dark"><- Back</router-link>
        </div>
        <ul v-if="error" class="list-group">
            <li v-for="error in errors" class="list-group-item list-group-item-danger">
                {{ error[0] }}
            </li>
        </ul>
        <div class="container">
            <h1 class="w-100 d-flex justify-content-center">Edit place</h1>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group w-100">
                            <label class="control-label">Place name</label>
                            <input type="text" v-model="place.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group w-100">
                            <label class="control-label">Place price</label>
                            <input type="text" v-model="place.price" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group w-100">
                            <label class="control-label">Place bedrooms</label>
                            <input type="text" v-model="place.bedrooms" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group w-100">
                            <label class="control-label">Place bathrooms</label>
                            <input type="text" v-model="place.bathrooms" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group w-100">
                            <label class="control-label">Place storeys</label>
                            <input type="text" v-model="place.storeys" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group w-100">
                            <label class="control-label">Place garages</label>
                            <input type="text" v-model="place.garages" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group w-100">
                            <button class="btn btn-success w-100">Edit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        mounted() {
            let app = this;
            let id = app.$route.params.id;
            app.placeId = id;
            axios.get('/api/v1/places/' + id)
                .then(function (resp) {
                    app.place = resp.data;
                })
                .catch(function () {
                    alert("Could not load your place")
                });
        },
        data: function () {
            return {
                placeId: null,
                place: {
                    name: '',
                    price: '',
                    bedrooms: '',
                    bathrooms: '',
                    storeys: '',
                    garages: '',
                },
                error: false,
                errors : []
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newPlace = app.place;
                axios.patch('/api/v1/places/' + app.placeId, newPlace)
                    .then(function (resp) {
                        app.$router.replace('/');
                    })
                    .catch(function (err) {
                        console.log(err.response.data);
                        app.error = err.response.data.message;
                        app.errors = err.response.data.errors;
                    });
            }
        }
    }
</script>
