<template>
    <v-app >
        <v-sheet  class=" mx-auto my-12"
            color="white"
            elevation="6"
            rounded
            height= auto
            width="1000"
        >
            <v-row class="white--text cyan accent-4 mx-auto my-auto rounded-t-lg d-flex px-10 py-6 " >
                <h2 >Registrarse</h2>
            </v-row>

            <v-row  justify="center" class="my-6  d-flex   py-6 mx-16 px-5">
                <form  @submit.prevent="crear">
                    <v-container bg fill-height>
                    <v-row class=" d-flex my-n4">
                        <v-col class="mr-8 ">
                        <v-text-field
                            v-model="user.name"
                            class="form-control"
                            label="Nombres"
                            required
                            solo
                        ></v-text-field>
                        </v-col>
                        <v-col>
                        <v-text-field
                            v-model="user.lastName"
                            class="form-control"
                            label="Apellidos"
                            required
                            solo
                        ></v-text-field>
                        </v-col>
                    </v-row>

                    <v-row class=" d-flex my-n2">
                        <v-col class="mr-8">
                        <v-text-field
                            v-model="user.email"
                            class="form-control"
                            label="Email"
                            required
                            solo
                        ></v-text-field>
                        </v-col>
                        <v-col>
                        <v-text-field
                            v-model="user.phone"
                            class="form-control"
                            label="Teléfono"
                            required
                            solo
                        ></v-text-field>
                        </v-col>
                    </v-row>

                    <v-row class=" d-flex my-n2">
                        <v-col class="mr-8">
                        <v-text-field
                            type="password"
                            v-model="user.password"
                            class="form-control"
                            label="Contraseña"
                            required
                            solo
                        ></v-text-field>
                        </v-col>
                        <v-col>
                        <v-text-field
                            type="password"
                            v-model="user.confirmPass"
                            class="form-control"
                            label="Confirmar contraseña"
                            required
                            solo
                        ></v-text-field>
                        </v-col>
                    </v-row>
                    <v-row justify="center" class="mt-5">
                        <v-btn @click="clear" class="mr-10 cyan darken-1 px-10 ">
                            <span class="white--text">Limpiar</span>
                        </v-btn>
                        <v-btn type="submit"
                        class="mr-10  cyan darken-1 px-10 mb-4">
                            <span class="white--text">Enviar</span>
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
            user: {
                name: '',
                lastName: '',
                email: '',
                phone: '',
                password: '',
                confirmPass: '',
                rol: 'Alumno/a',
                courses: null
            }
        }
    },

    methods: {
        crear() {
            let apiURL = "http://127.0.0.1:8000/api/auth/register";
        axios
            .post(apiURL, this.user)
            .then(response => {

                alert("¡El usuario se ha creado correctamente!");
                this.$router.push({
                    name: "ListUsersView"
                });
            })
            .catch(e => {
            console.log(e);
            this.errors.push(e);
            });
        },
        clear () {
            this.name= ''
            this.lastName = ''
            this.email = ''
            this.phone = ''
            this.password = ''
            this.confirmPass = ''
            this.$refs.observer.reset()
        },
        },
};
</script>

