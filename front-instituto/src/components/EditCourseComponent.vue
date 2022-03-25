<template>
    <v-app>
        <v-sheet  class=" mx-auto my-16 "
            color="white"
            elevation="6"
            rounded
            height= auto
            width="1200"
        >
            <v-row class="white--text cyan accent-4 mx-auto my-auto rounded-t-lg d-flex px-10 py-6 " >
                <h2 >Modificar Curso</h2>
            </v-row>
            <v-row justify="center" class="mx-15 my-6  d-flex px-10  py-6">

                <form >
                    <v-container bg fill-height>
                    <v-row class=" d-flex ">
                        <v-col class="mr-12">
                        <v-text-field
                            v-model="courseUpdate.nameCourse"
                            class="form-control"
                            label="Nombre del Curso"
                            required
                            solo
                        ></v-text-field>
                        </v-col>
                        <v-col>
                        <v-text-field
                            v-model="courseUpdate.hours"
                            class="form-control"
                            label="Intensidad horaria"
                            required
                            solo
                        ></v-text-field>
                        </v-col>
                    </v-row>


                    <v-row justify="center" class="mt-4">
                        <v-btn @click="cursoUpdate"  
                        class="mr-10  red darken-4 px-10 mb-4"
                        type="submit"
                        >
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
            courseUpdate: [],
        }
    },
    mounted() {
        let apiURL = `http://127.0.0.1:8000/api/auth/courseID/${this.$route.params.id}`;
        axios.get(apiURL).then((res) => {
        this.courseUpdate = res.data;
    });
    },


    methods: {
        cursoUpdate() {
        let apiURL = `http://127.0.0.1:8000/api/coursesEdit/${this.$route.params.id}`;
        if (window.confirm("¿Realmente desea modificar el usuario?")) {
            axios
            .put(apiURL, this.courseUpdate)
            .then((res) => {
            console.log(res);
            this.$router.push("/listCourses");
            })
            .catch((error) => {
            console.log(error);
            });
        }else{ this.$router.push("/listCourses")}
        }
    }
}
</script>