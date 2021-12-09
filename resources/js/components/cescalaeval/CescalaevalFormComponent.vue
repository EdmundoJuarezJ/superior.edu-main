<template>
  <div>
    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <el-page-header @back="goBack" :content="`Categoría - ${scope}`">
        </el-page-header>
      </div>

      <div>
        <el-form :model="model" :rules="rules" ref="cescalaevalForm">
          <el-row :guuter="10">
            <el-form-item label="Nombre" required prop="nombre">
              <el-input
                v-model="model.nombre"
                :readonly="readOnlyFields"
                aria-placeholder="Nombre de la modalidad"
              ></el-input>
            </el-form-item>
            <el-form-item label="Calificacion Mínima" required prop="calificacion_min">
              <el-input
                v-model="model.calificacion_min"
                :readonly="readOnlyFields"
                aria-placeholder="Calificacion Minima de la Carrera"
              ></el-input>
            </el-form-item>
            <el-form-item label="Calificacion Máxima" required prop="calificacion_max">
              <el-input
                v-model="model.calificacion_max"
                :readonly="readOnlyFields"
                aria-placeholder="Calificacion Maxima de la carrera"
              ></el-input>
            </el-form-item>
          </el-row>
          <el-row :guuter="10" v-if="scope != 'show'">
            <el-form-item>
              <el-button type="success" @click="saveForm('cescalaevalForm')">
                Guardar Modalidad de Carrera
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
  name: "cescalaeval-form-component",
  props: {
    scope: String,
    id: Number,
  },
  mounted() {
    switch (this.scope) {
      case "show":
      case "edit":
        axios.get(`/fetch-cescalaeval-showbyid/${this.id}`).then((res) => {
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
        calificacion_min: null,
        calificacion_max: null,
      },
      rules: {},
    };
  },
  methods: {
    goBack() {
      window.location.href = "/escalaevals";
    },
    saveForm(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
            switch(this.scope){
                case 'create':
                this.$store.dispatch("saveCescalaeval", this.model);
                break;
                case 'edit':
                this.$store.dispatch("updateCescalaeval", {id:this.id, model:this.model});
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
