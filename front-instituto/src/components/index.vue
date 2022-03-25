<template>
    <v-app>
        <v-sheet  class=" mx-auto my-12 py-8 px-12"
            color="white"
            elevation="6"
            rounded
            height= auto
            width="1000"
        >
        <v-row justify="center" class="mx-16   d-flex px-10 py-4 ">
            <h1>COURSES</h1>
        </v-row>
        <v-row justify="center" class=" mx-auto my-5 d-flex ">
                <v-col  class=" ml-16 pl-5 my-auto">
                    <v-img height="250"  width="250" src="../assets/icons/student.png"
                    ></v-img>
                </v-col>

                <v-col  class="mr-15  my-auto text-justify">
                    <p>Bienvenido/a al software COURSES , regístrate para crear tu usuario y si eres administrador, crea cursos y podrás asignar estos a los alumnos registrados; pero si eres un alumno podrás ver cuáles son los cursos que tienes asignados.</p>
                    <br/>
                    <p><strong>Usuario Administrador: </strong> Para poder acceder a las opciones de administrador puede ingresar con el siguiente usuario</p>
                    <p>Email: admin@mail.com <br/> Password: 123456789</p>
                    <p><strong>Usuario Alumno/a: </strong> Para porder ingresar como alumno/a debe registrarse y luego loguearse </p>
                </v-col>
            </v-row>
        </v-sheet>
    </v-app>
</template>

<script>
export default {
        data () {
            return {}
    }}
</script>

