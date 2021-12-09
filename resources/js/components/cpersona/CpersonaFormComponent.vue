<template>
  <div>
    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <el-page-header @back="goBack" :content="`Categoría - ${scope}`">
        </el-page-header>
      </div>
 
      <div>
        <el-form :model="model" :rules="rules" ref="cpersonaForm">
          <el-row :guuter="10">
              <el-form-item label="Identificador" required prop="identificador">
              <el-input
                v-model="model.identificador"
                :readonly="readOnlyFields"
                aria-placeholder="Identificador"
                ></el-input>
              </el-form-item>

              <el-form-item label="Nombre" required prop="nombre">
                <el-input
                  v-model="model.nombre"
                  :readonly="readOnlyFields"
                  aria-placeholder="Nombre"
                ></el-input>
              </el-form-item>

              <el-form-item label="Apellido Paterno" required prop="apellido1">
                <el-input
                  v-model="model.apellido1"
                  :readonly="readOnlyFields"
                  aria-placeholder="Apellido Paterno"
                ></el-input>
              </el-form-item>

              <el-form-item label="Apellido Materno" required prop="apellido2">
                <el-input
                  v-model="model.apellido2"
                  :readonly="readOnlyFields"
                  aria-placeholder="Apellido Materno"
                ></el-input>
              </el-form-item>

              <el-form-item label="Sexo" required prop="sexo">
                <el-input
                  v-model="model.sexo"
                  :readonly="readOnlyFields"
                  aria-placeholder="Sexo"
                ></el-input>
              </el-form-item>

              <el-form-item label="CURP" required prop="curp">
                <el-input
                  v-model="model.curp"
                  :readonly="readOnlyFields"
                  aria-placeholder="CURP"
                ></el-input>
              </el-form-item>

              <el-form-item label="RFC" required prop="rfc">
                <el-input
                  v-model="model.rfc"
                  :readonly="readOnlyFields"
                  aria-placeholder="RFC"
                ></el-input>
              </el-form-item>

              <el-form-item label="Número de Teléfono" required prop="num_tel">
                <el-input
                  v-model="model.num_tel"
                  :readonly="readOnlyFields"
                  aria-placeholder="Número de Teléfono"
                ></el-input>
              </el-form-item>
              <el-form-item label="Número de Celular" required prop="num_cel">
                <el-input
                  v-model="model.num_cel"
                  :readonly="readOnlyFields"
                  aria-placeholder="Número de Celular"
                ></el-input>
              </el-form-item>
              <el-form-item label="Email" required prop="email">
                <el-input
                  v-model="model.email"
                  :readonly="readOnlyFields"
                  aria-placeholder="Email"
                ></el-input>
              </el-form-item>
              <el-form-item label="Domicilio" required prop="domicilio">
                <el-input
                  v-model="model.domicilio"
                  :readonly="readOnlyFields"
                  aria-placeholder="Domicilio"
                ></el-input>
              </el-form-item>
              <el-form-item label="ID de Colonia" required prop="idcolonia">
                <el-input
                  v-model="model.idcolonia"
                  :readonly="readOnlyFields"
                  aria-placeholder="ID de Colonia"
                ></el-input>
              </el-form-item>
              <el-form-item label="Nombre de Colonia" required prop="colonia">
                <el-input
                  v-model="model.colonia"
                  :readonly="readOnlyFields"
                  aria-placeholder="Nombre de Colonia"
                ></el-input>
              </el-form-item>
              <el-form-item label="ID de Entidad" required prop="identidad">
                <el-input
                  v-model="model.identidad"
                  :readonly="readOnlyFields"
                  aria-placeholder="ID de Entidad"
                ></el-input>
              </el-form-item>
              <el-form-item label="ID de Municipio" required prop="idmunicipio">
                <el-input
                  v-model="model.idmunicipio"
                  :readonly="readOnlyFields"
                  aria-placeholder="ID de Municipio"
                ></el-input>
              </el-form-item>
              <el-form-item label="ID de Rol" required prop="idrole">
                <el-input
                  v-model="model.idrole"
                  :readonly="readOnlyFields"
                  aria-placeholder="ID de Rol"
                ></el-input>
              </el-form-item>
              <el-form-item label="ID de Usuario" required prop="iduser">
                <el-input
                  v-model="model.iduser"
                  :readonly="readOnlyFields"
                  aria-placeholder="ID de Usuario"
                ></el-input>
              </el-form-item>
              <el-form-item label="ID de Persona" required prop="idusuario">
                <el-input
                  v-model="model.idusuario"
                  :readonly="readOnlyFields"
                  aria-placeholder="ID de Persona"
                ></el-input>
              </el-form-item>
          </el-row>
          <el-row :guuter="10" v-if="scope != 'show'">
            <el-form-item>
              <el-button type="success" @click="saveForm('cpersonaForm')">
                Guardar Persona
              </el-button>
            </el-form-item>
          </el-row>
        </el-form>
      </div>
    </el-card>
  </div>
</template>

<script>
export default {
  name: "cpersona-form-component",
  props: {
    scope: String,
    id: Number,
  },
  mounted() {
    switch (this.scope) {
      case "show":
      case "edit":
        axios.get(`/fetch-cpersona-showbyid/${this.id}`).then((res) => {
        //   console.log(res.data.data);
          this.$set(this, "model", res.data.data);
        });
        break;
      default:
        break;
    }
  },
  computed: {
    readOnlyFields(){
      return (this.scope == 'show') ? true: false;
    }
  },
  data() {
    return {
      model: {
        identificador: null,
        nombre: null,
        apellido1: null,
        apellido2: null,
        sexo: null,
        curp: null,
        rfc: null,
        num_tel: null,
        num_cel: null,
        email: null,
        domicilio: null,
        idcolonia: null,
        colonia: null,
        identidad: null,
        idmunicipio: null,
        idrole: null,
        iduser: null,
        idusuario: null,
      },
      rules: {},
    };
  },
  methods: {
    goBack() {
      window.location.href = "/personas";
    },
    saveForm(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
            switch(this.scope){
                case 'create':
                this.$store.dispatch("saveCpersona", this.model);
                break;
                case 'edit':
                this.$store.dispatch("updateCpersona", {id:this.id, model:this.model});
                break;
                default:
                break;

            }
          
        }
      });
    },
  },
}
</script>
