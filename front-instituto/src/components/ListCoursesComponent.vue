<template>
    <v-app>
        <h1 class=" mt-8 text-center">Listado de Cursos</h1>
        <v-row justify="center" class=" mx-8 my-8  d-flex  pb-4 ">
        <v-simple-table>
        <template v-slot:default>
        <thead >
            <tr class="cyan accent-4 ">
            <th class="text-left font-weight-black white--text text-md-body-1 px-12"> Cod </th>
            <th class="text-left font-weight-black white--text text-md-body-1 px-12"> Nombre del curso </th>
            <th class="text-left font-weight-black white--text text-md-body-1 px-12"> Intensidad horaria </th>
            <th class="text-left font-weight-black white--text text-md-body-1 px-12"> Acciones </th>
            </tr>
        </thead>
        <tbody>
            <tr
            v-for="course in courses"
            :key="course.id"
            >
            <td class="text-auto px-12 ">{{ course.id}}</td>
            <td class="text-auto px-12 ">{{ course.nameCourse }}</td>
            <td class="text-auto px-14 ">{{ course.hours}}</td>
            <td>
                <v-btn
                    :to="{path: '/editCourse/'+ course.id }"
                    class="light-blue lighten-3 mx-1" x-small 
                    >Editar
                </v-btn>
                <v-btn
                    @click="deleteCurso(course.id)"
                    class="red darken-4  mx-2"
                    x-small
                >
                    <span class="white--text">Eliminar</span>
                </v-btn>
                </td>
            </tr>
        </tbody>
        </template>
    </v-simple-table>
        </v-row>
    </v-app>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
        courses: [],
        }
    },
    mounted(){
        this.mostrarCursos()
    },



    methods: {

    mostrarCursos() {
    let apiURL = "http://127.0.0.1:8000/api/auth/coursesList/";
        axios
        .get(apiURL)
        .then((res) => {
            this.courses = res.data;
        })
        .catch((error) => {
            console.log(error);
        });
    },

        deleteCurso(id) {
        let apiURL = `http://127.0.0.1:8000/api/auth/coursesDel/${id}`;

        if (window.confirm("¿Realmente desea eliminar el curso?")) {
            axios
            .delete(apiURL)
            .then(() => {
                this.mostrarCursos();
            })
            .catch((error) => {
                console.log(error);
            });
        }
        },
    },
    };
</script>

