<template>
    <v-app>
        <v-sheet  class=" mx-auto my-12"
            color="white"
            elevation="6"
            rounded
            height= auto
            width="1000"
        >
            <v-row class="white--text cyan accent-4 mx-auto my-auto rounded-t-lg d-flex px-10 py-6 " >
                <h2 >Modificar Usuario</h2>
            </v-row>
            <v-row justify="center" class="mx-15 my-6  d-flex px-10  py-6">

                <form @submit.prevent="updateUsuario" >
                    <v-container bg fill-height>
                    <v-row class=" d-flex ">
                        <v-col class="mr-12">
                        <v-text-field
                            v-model="userUpdate.name"
                            class="form-control"
                            label="Nombres"
                            required
                            solo
                        ></v-text-field>
                        </v-col>
                        <v-col>
                        <v-text-field
                            v-model="userUpdate.lastName"
                            class="form-control"
                            label="Apellidos"
                            required
                            solo
                        ></v-text-field>
                        </v-col>
                    </v-row>

                    <v-row class=" d-flex">
                        <v-col class="mr-12">
                        <v-text-field
                            v-model="userUpdate.email"
                            class="Email"
                            label="Email"
                            required
                            solo
                        ></v-text-field>
                        </v-col>
                        <v-col>
                        <v-text-field
                            v-model="userUpdate.phone"
                            class="form-control"
                            label="Teléfono"
                            required
                            solo
                        ></v-text-field>
                        </v-col>
                    </v-row>

                    <v-row class=" d-flex">
                        <v-col class="mr-12">
                        <v-text-field
                            type="password"
                            v-model="userUpdate.password"
                            class="form-control"
                            label="Contraseña"
                            solo
                        ></v-text-field>
                        </v-col>
                        <v-col>
                        <v-text-field
                            type="password"
                            v-model="userUpdate.confirmPass"
                            class="form-control"
                            label="Confirmar contraseña"
                            solo
                        ></v-text-field>
                        </v-col>
                    </v-row>

                    <v-row class=" d-flex mx-1">
                        <v-select
                        v-model="userUpdate.rol"
                        :items="items"
                        label="Rol"
                        required
                        solo
                        ></v-select>
                    </v-row>
                    <v-row justify="center" class="mt-15">
                        <v-btn @click="clear" class="mr-10 red darken-4 px-10 ">
                            <span class="white--text">Limpiar</span>
                        </v-btn>
                        <v-btn
                        class="mr-10  red darken-4 px-10 mb-4"
                        type="submit">
                            <span class="white--text">Editar</span>
                        </v-btn>
                    </v-row>
                    </v-container>
                </form>
            </v-row>
        </v-sheet>
    </v-app>
</template>




<script>
import axios from "axios";
export default {
    data() {
        return {
            userUpdate: {
                name: '',
                lastName: '',
                email: '',
                phone: '',
                password: '',
                confirmPass: '',
                rol: '',
                courses: null
            },
            items: ['Administrador', 'Alumno/a']
        }
    },
        created() {
        let apiURL = `http://127.0.0.1:8000/api/auth/userID/${this.$route.params.id}`;
        axios.get(apiURL).then((res) => {
        this.userUpdate = res.data;
    });
    },

    methods: {
        updateUsuario() {
        let apiURL = `http://127.0.0.1:8000/api/auth/usersEdit/${this.$route.params.id}`;
        if (window.confirm("¿Realmente desea modificar el usuario?")) {
            axios
            .put(apiURL, this.userUpdate)
            .then((res) => {
            console.log(res);
            this.$router.push("/listUsers");
            })
            .catch((error) => {
            console.log(error);
            });
        }else{this.$router.push("/listUsers")}
        },
    },
    };
</script>