<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-outline-dark"><- Back</router-link>
        </div>

        <div class="container">
            <h1>Create new place</h1>
            <br>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group w-100">
                            <label class="control-label">place name</label>
                            <input type="text" v-model="place.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group w-100">
                            <label class="control-label">place price</label>
                            <input type="text" v-model="place.price" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group w-100">
                            <label class="control-label">place bedrooms</label>
                            <input type="text" v-model="place.bedrooms" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group w-100">
                            <label class="control-label">place bathrooms</label>
                            <input type="text" v-model="place.bathrooms" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group w-100">
                            <label class="control-label">place storeys</label>
                            <input type="text" v-model="place.storeys" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group w-100">
                            <label class="control-label">place garages</label>
                            <input type="text" v-model="place.garages" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group w-100">
                            <button class="btn btn-success w-100">Create</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                place: {
                    name: '',
                    price: '',
                    bedrooms: '',
                    bathrooms: '',
                    storeys: '',
                    garages: '',
                }
            }
        },
        methods: {
            saveForm() {
                event.preventDefault();
                var app = this;
                var newPlace = app.place;
                axios.post('/api/v1/places', newPlace)
                    .then(function (resp) {
                        app.$router.push({path: '/'});
                    })
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your place");
                    });
            }
        }
    }
</script>
