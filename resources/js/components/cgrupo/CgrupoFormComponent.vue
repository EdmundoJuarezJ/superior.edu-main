<template>
  <div>
    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <el-page-header @back="goBack" :content="`Category - ${scope}`">
        </el-page-header>
      </div>

      <div>
        <el-form :model="model" :rules="rules" ref="cgrupoForm">
          <el-row :guuter="10">
            <el-form-item label="Nombre" required prop="nombre">
              <el-input
                v-model="model.nombre"
                :readonly="readOnlyFields"
                aria-placeholder="Nombre del grupo"
              ></el-input>
            </el-form-item>

            <el-form-item label="Semestre" required prop="semestre">
              <el-input
                v-model="model.semestre"
                :readonly="readOnlyFields"
                aria-placeholder="Semestre"
              ></el-input>
            </el-form-item>
            <el-form-item label="ID del Docente" required prop="iddocente">
              <el-input
                v-model="model.iddocente"
                :readonly="readOnlyFields"
                aria-placeholder="ID del Docente"
              ></el-input>
            </el-form-item>
            <el-form-item label="ID del Usuario" required prop="idusuario">
              <el-input
                v-model="model.idusuario"
                :readonly="readOnlyFields"
                aria-placeholder="ID del Usuario"
              ></el-input>
            </el-form-item>

          </el-row>
          <el-row :guuter="10" v-if="scope != 'show'">
            <el-form-item>
              <el-button type="success" @click="saveForm('cgrupoForm')">
                Guardar Grupo
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
  name: "cgrupo-form-component",
  props: {
    scope: String,
    id: Number,
  },
  mounted() {
    switch (this.scope) {
      case "show":
      case "edit":
        axios.get(`/fetch-cgrupo-showbyid/${this.id}`).then((res) => {
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
        semestre: null,
        iddocente: null,
        idusuario: null,
      },
      rules: {},
    };
  },
  methods: {
    goBack() {
      window.location.href = "/grupos";
    },
    saveForm(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
            switch(this.scope){
                case 'create':
                this.$store.dispatch("saveCgrupo", this.model);
                break;
                case 'edit':
                this.$store.dispatch("updateCgrupo", {id:this.id, model:this.model});
                break;
                default:
                break;

            }
          
        }
      });
    },
  },
};
</script>
