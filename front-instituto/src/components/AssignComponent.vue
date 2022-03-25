<template>
    <v-app>
        <v-sheet  class=" mx-auto my-12"
            color="white"
            elevation="6"
            rounded
            height= auto
            width="800"
        >
            <v-row class="white--text cyan accent-4 mx-auto my-auto rounded-t-lg d-flex px-10 py-6 " >
                <h2 >Asignar cursos</h2>
            </v-row>
            <v-row justify="center" class="mx-15 my-6  d-flex px-10  py-6">

                <form @submit.prevent="updateUsuario" >
                    <v-container bg fill-height>
                    <v-row class=" d-flex my-1">
                        <h3>Alumno/a: <p class="font-weight-regular"> {{assignUpdate.name}} {{assignUpdate.lastName}}</p></h3>
                    </v-row>
                    <v-row class=" d-flex my-1">
                        <h3>Email: <p class="font-weight-regular"> {{assignUpdate.email}}   </p></h3>
                        <p>{{listaCursos}}</p>
                    </v-row>
                    <v-row class="d-flex" >
                        <v-select
                        v-model="assignUpdate.courses"
                        :items= "listCourses"
                        label="Cursos"
                        item-text="nameCourse"
                        required attach chips multiple solo>
                        </v-select>
                    </v-row>

                    <v-row justify="center" class="mt-15">
                        <v-btn
                        class="mr-10 light-blue darken-1 px-10 mb-4"
                        type="submit">
                            <span class="white--text">Asignar cursos</span>
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
            assignUpdate: {
                courses: []
            },

            listCourses:{ },
        }
    },


        created() {

            let cursosURL ="http://127.0.0.1:8000/api/auth/coursesList/";
            axios .get(cursosURL) .then((res) => { this.listCourses = res.data;  });

            let apiURL = `http://127.0.0.1:8000/api/auth/userID/${this.$route.params.id}`;
            axios.get(apiURL).then((res) => {
            this.assignUpdate = res.data;
    });
    },


    methods: {
        updateUsuario() {
        let apiURL = `http://127.0.0.1:8000/api/auth/usersEdit/${this.$route.params.id}`;
        if (window.confirm("¿Realmente desea modificar el usuario?")) {
            axios
            .put(apiURL, this.assignUpdate)
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