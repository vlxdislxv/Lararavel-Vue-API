<template>
    <div>
        <div class="form-group">
            <router-link to="/" class="btn btn-outline-dark"><- Back</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Edit new place</div>
            <div class="panel-body">
                <form v-on:submit="saveForm()">
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Place name</label>
                            <input type="text" v-model="place.name" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Place price</label>
                            <input type="text" v-model="place.price" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Place bedrooms</label>
                            <input type="text" v-model="place.bedrooms" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Place bathrooms</label>
                            <input type="text" v-model="place.bathrooms" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Place storeys</label>
                            <input type="text" v-model="place.storeys" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <label class="control-label">Place garages</label>
                            <input type="text" v-model="place.garages" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 form-group">
                            <button class="btn btn-success">Edit</button>
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
                }
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
                    .catch(function (resp) {
                        console.log(resp);
                        alert("Could not create your place");
                    });
            }
        }
    }
</script>
