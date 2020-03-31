<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createPlace'}" class="btn btn-success">Create new place</router-link>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Places list</div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th style="min-width: 150px;">Name</th>
                        <th style="min-width: 300px;">Price</th>
                        <th>Bedrooms</th>
                        <th>Bathrooms</th>
                        <th>Storeys</th>
                        <th>Garages</th>
                        <th>&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <input v-model="name" type="text" class="form-control" v-on:keyup="findEntry">
                        </td>
                        <td class="d-flex">
                            <input style="margin-right: 3px" v-model="price_from" type="text" class="form-control" v-on:keyup="findEntry">
                            :
                            <input style="margin-left: 3px" v-model="price_to" type="text" class="form-control" v-on:keyup="findEntry">
                        </td>
                        <td>
                            <input v-model="bedrooms" type="text" class="form-control" v-on:keyup="findEntry">
                        </td>
                        <td>
                            <input v-model="bathrooms" type="text" class="form-control" v-on:keyup="findEntry">
                        </td>
                        <td>
                            <input v-model="storeys" type="text" class="form-control" v-on:keyup="findEntry">
                        </td>
                        <td>
                            <input v-model="garages" type="text" class="form-control" v-on:keyup="findEntry">
                        </td>
                    </tr>
                    <tr v-for="place, index in places">
                        <td>{{ place.name }}</td>
                        <td>{{ place.price }}</td>
                        <td>{{ place.bedrooms }}</td>
                        <td>{{ place.bathrooms }}</td>
                        <td>{{ place.storeys }}</td>
                        <td>{{ place.garages }}</td>
                        <td class="d-flex">
                            <router-link :to="{name: 'editPlace', params: {id: place.id}}"
                                         class="btn btn-primary">
                                Edit
                            </router-link>
                            <a style="margin-left: 5px" href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(place.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                name: '',
                price_from: '',
                price_to: '',
                bathrooms: '',
                bedrooms: '',
                storeys: '',
                garages: '',
                places: []
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/places')
                .then(function (resp) {
                    app.places = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load places");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/places/' + id)
                        .then(function (resp) {
                            app.places.splice(index, 1);
                        })
                        .catch(function (resp) {
                            console.log(resp);
                            alert("Could not load places");
                        });
                }
            },
            findEntry(el) {
                if (el.key === 'Enter') {
                    var app = this;
                    let qString = 'name=' + app.name + '&';
                    qString += 'price_from=' + app.price_from + '&';
                    qString += 'price_to=' + app.price_to + '&';
                    qString += 'bathrooms=' + app.bathrooms + '&';
                    qString += 'bedrooms=' + app.bedrooms + '&';
                    qString += 'storeys=' + app.storeys + '&';
                    qString += 'garages=' + app.garages;
                    axios.get('/api/v1/places/?' + qString)
                        .then(function (resp) {
                            app.places = resp.data;
                        })
                        .catch(function (resp) {
                            console.log(resp);
                            alert("Could not load places");
                        });
                }
            }
        }
    }
</script>
