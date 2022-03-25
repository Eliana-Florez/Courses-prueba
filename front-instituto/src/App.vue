<template>
  <v-app>
      <v-row class="cyan darken-3  my-auto  d-flex pr-16">

        <v-col>
          <router-link to="/">
          <v-img contain src="./assets/icons/logo.png" max-width="80" class="ml-16"></v-img>
          </router-link>
        </v-col>
        <v-col class="mx-3 "></v-col>

        <template v-if="!login">
        <v-col class="mx-16 px-16"></v-col>
        <v-col class="mx-16 px-16"></v-col>
        <v-col class="mx-16 px-16"></v-col>
        <v-col  class=" my-auto " r>
          <v-btn text color="#FFF" 
            href="/login"
          ><h3 >Login</h3>
          </v-btn>
        </v-col>
        <v-col  class="my-auto ">
          <v-btn text color="#FFF" 
          href="/register"
          ><h3 >Registrarse</h3>
          </v-btn>
        </v-col>
        </template>

        <template v-if="login">
          <template v-if="typeRol === 'Administrador'">
        <v-col class="mx-16"></v-col>
        <v-col  class=" my-auto ">
          <v-btn  text color="#FFF" block
          href="/listUsers"
          ><h3 >Adimin Usuarios</h3>
          </v-btn>
        </v-col>
        <v-col  class=" my-auto ">
            <v-btn  text color="#FFF" block
            href="/courses"
            ><h3 >Crear curso</h3>
            </v-btn>
          </v-col>

          <v-col  class="my-auto ">
            <v-btn text color="#FFF" block 
            href="/listCourses"
            ><h3 >Adimin Cursos</h3>
            </v-btn>
          </v-col>

        <v-col  class=" my-auto " >
          <v-btn text color="#FFF" block
            @click="deleteToke()"
          ><h3 >Logout</h3>
          </v-btn>
        </v-col>
          </template>
          <template v-else>
            <v-col  class="my-auto ">
                <v-btn text color="#FFF" block 
                href="/listCourses"
                ><h3 >Lista de Cursos</h3>
                </v-btn>
              </v-col>
            <v-col  class=" my-auto " >
              <v-btn text color="#FFF" block
                @click="deleteToke()"
              ><h3 >Logout</h3>
              </v-btn>
            </v-col>
          </template>
        </template>
        

      </v-row>

      <router-view/>


    <v-footer dark padless >
      <v-card class="flex " flat tile>
        <v-card-title class="cyan darken-3 px-8 ">
          <strong class="subheading">COURSES</strong>
          <v-col class="mx-3 "></v-col>
          
        </v-card-title>

        <v-card-text class="py-2 white--text text-center">
          {{ new Date().getFullYear() }} — <strong>Eliana Florez</strong>
        </v-card-text>
      </v-card>
    </v-footer>
  </v-app>
</template>

<script>

export default {
  data: () => ({
    login: localStorage.getItem('token'),
    typeRol:localStorage.getItem('typeRol'),
  }),


  methods:{

      deleteToke(){
    localStorage.removeItem('token')
    localStorage.removeItem('typeRol')
    this.$router.push( "/");
    location.reload(true)
  },

  }

};
</script>


