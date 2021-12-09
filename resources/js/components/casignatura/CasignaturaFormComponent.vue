<template>
  <div>
    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <el-page-header @back="goBack" :content="`Category - ${scope}`">
        </el-page-header>
      </div>

      <div>
        <el-form :model="model" :rules="rules" ref="casignaturaForm">
          <el-row :guuter="10">
              <el-form-item label="Nombre" required prop="nombre">
              <el-input
                v-model="model.nombre"
                :readonly="readOnlyFields"
                aria-placeholder="Nombre de la Asignatura"
                ></el-input>
              </el-form-item>

              <el-form-item label="Nombre corto" required prop="nombre_corto">
                <el-input
                  v-model="model.nombre_corto"
                  :readonly="readOnlyFields"
                  aria-placeholder="Nombre corto"
                ></el-input>
              </el-form-item>

              <el-form-item label="Semestre" required prop="semestre">
                <el-input
                  v-model="model.semestre"
                  :readonly="readOnlyFields"
                  aria-placeholder="Semestre"
                ></el-input>
              </el-form-item>

              <el-form-item label="Estatus" required prop="estatus">
                <el-input
                  v-model="model.estatus"
                  :readonly="readOnlyFields"
                  aria-placeholder="Estatus"
                ></el-input>
              </el-form-item>

              <el-form-item label="Clave" required prop="clave">
                <el-input
                  v-model="model.clave"
                  :readonly="readOnlyFields"
                  aria-placeholder="Clave"
                ></el-input>
              </el-form-item>

              <el-form-item label="Orden" required prop="orden">
                <el-input
                  v-model="model.orden"
                  :readonly="readOnlyFields"
                  aria-placeholder="Orden"
                ></el-input>
              </el-form-item>

              <el-form-item label="Promediar" required prop="promediar">
                <el-input
                  v-model="model.promediar"
                  :readonly="readOnlyFields"
                  aria-placeholder="Promediar"
                ></el-input>
              </el-form-item>

              <el-form-item label="Numero de creditos" required prop="num_creditos">
                <el-input
                  v-model="model.num_creditos"
                  :readonly="readOnlyFields"
                  aria-placeholder="Numero de creditos"
                ></el-input>
              </el-form-item>
              <el-form-item label="ID de Plan de Estudios" required prop="idplan">
                <el-input
                  v-model="model.idplan"
                  :readonly="readOnlyFields"
                  aria-placeholder="ID de Plan de Estudios"
                ></el-input>
              </el-form-item>
              <el-form-item label="ID de Modelo de Evaluacion" required prop="idescala">
                <el-input
                  v-model="model.idescala"
                  :readonly="readOnlyFields"
                  aria-placeholder="ID de Modelo de Evaluacion"
                ></el-input>
              </el-form-item>
              <el-form-item label="ID de Asignatura" required prop="idantecesor">
                <el-input
                  v-model="model.idantecesor"
                  :readonly="readOnlyFields"
                  aria-placeholder="ID de Asignatura"
                ></el-input>
              </el-form-item>
          </el-row>
          <el-row :guuter="10" v-if="scope != 'show'">
            <el-form-item>
              <el-button type="success" @click="saveForm('casignaturaForm')">
                Guardar Asignatura
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
  name: "casignatura-form-component",
  props: {
    scope: String,
    id: Number,
  },
  mounted() {
    switch (this.scope) {
      case "show":
      case "edit":
        axios.get(`/fetch-casignatura-showbyid/${this.id}`).then((res) => {
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
        nombre: null,
        idplan: null,
        idescala: null,
        idantecesor: null,
      },
      rules: {},
    };
  },
  methods: {
    goBack() {
      window.location.href = "/asignaturas";
    },
    saveForm(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
            switch(this.scope){
                case 'create':
                this.$store.dispatch("saveCasignatura", this.model);
                break;
                case 'edit':
                this.$store.dispatch("updateCasignatura", {id:this.id, model:this.model});
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
