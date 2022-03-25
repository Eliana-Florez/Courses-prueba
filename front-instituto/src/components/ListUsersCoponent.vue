<template>
    <v-app>
        <h1 class=" mt-8 text-center">Listado de Usuarios</h1>
        <v-row justify="center" class=" mx-8 my-8  d-flex  pb-4 ">
        <v-simple-table>
        <template v-slot:default>
        <thead >
            <tr class="cyan accent-4 ">
            <th class="text-left font-weight-black white--text text-md-body-1 px-6"> Cod </th>
            <th class="text-left font-weight-black white--text text-md-body-1 px-6"> Nombres </th>
            <th class="text-left font-weight-black white--text text-md-body-1 px-6"> Apellidos </th>
            <th class="text-left font-weight-black white--text text-md-body-1 px-6"> Email</th>
            <th class="text-left font-weight-black white--text text-md-body-1 px-6"> Teléfono</th>
            <th class="text-left font-weight-black white--text text-md-body-1 px-6"> Rol</th>
            <th class="text-left font-weight-black white--text text-md-body-1 px-6"> Cursos</th>
            <th class="text-center font-weight-black white--text text-md-body-1 px-6"> Acciones</th>
            </tr>
        </thead>
        <tbody>
            <tr
            v-for="usuario in users"
            :key="usuario.id"
            >
            <td class="text-left px-6">{{ usuario.id}}</td>
            <td class="text-left px-6">{{ usuario.name }}</td>
            <td class="text-left px-6">{{ usuario.lastName }}</td>
            <td class="text-left px-6">{{ usuario.email }}</td>
            <td class="text-left px-6">{{ usuario.phone }}</td>
            <td class="text-left px-6">{{ usuario.rol }}</td>
            <td class="text-left px-6">{{ usuario.courses }}</td>
            <td>
                <v-btn
                    :to="{path: '/assing/'+ usuario.id }"
                    class="light-green lighten-3 mx-1"  x-small 
                    >Asignar curso
                </v-btn>
                <v-btn
                    :to="{path: '/editUser/'+ usuario.id }"
                    class="light-blue lighten-3 mx-1" x-small 
                    >Editar
                </v-btn>
                <v-btn
                    @click.prevent="deleteUsuario(usuario.id)"
                    class="red darken-4 mx-1" x-small >
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
            users: [],
        }
    },
    mounted(){
        this.mostrarUsuarios()
    },

    methods: {

        mostrarUsuarios() {
        let apiURL = "http://127.0.0.1:8000/api/auth/usersList";
        axios
        .get(apiURL)
        .then((res) => {
            this.users = res.data;
        })
        .catch((error) => {
            console.log(error);
        });
    },

    deleteUsuario(id) {
        let apiURL = `http://127.0.0.1:8000/api/auth/usersDel/${id}`;

        if (window.confirm("¿Realmente desea eliminar el usuario?")) {
            axios
            .delete(apiURL)
            .then(() => {
                this.mostrarUsuarios();
            })
            .catch((error) => {
                console.log(error);
            });
        }
        },
    },
    };
</script>

