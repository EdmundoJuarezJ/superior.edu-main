<template>
  <div>
    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <el-page-header @back="goBack" :content="`Category - ${scope}`">
        </el-page-header>
      </div>

      <div>
        <el-form :model="model" :rules="rules" ref="cplanestudioForm">

          <el-row :guuter="10">

            <el-form-item label="Nombre" required prop="nombre">
              <el-input v-model="model.nombre" :readonly="readOnlyFields"
                aria-placeholder="Nombre del plan de estudio"
              ></el-input>
            </el-form-item>
          

          
            <el-form-item label="Nombre corto" required prop="nombre_corto">
              <el-input
                v-model="model.nombre_corto"
                :readonly="readOnlyFields"
                aria-placeholder="Nombre corto"
              ></el-input>
            </el-form-item>
          

          
            <el-form-item label="Estatus" required prop="estatus">
              <el-input
                v-model="model.estatus"
                :readonly="readOnlyFields"
                aria-placeholder="Estatus"
              ></el-input>
            </el-form-item>
          

           
            <el-form-item label="Creditos Totales" required prop="num_creditos_total">
              <el-input
                v-model="model.num_creditos_total"
                :readonly="readOnlyFields"
                aria-placeholder="Creditos Totales"
              ></el-input>
            </el-form-item>
           

          
            <el-form-item label="Creditos Minimos" required prop="num_creditos_min">
              <el-input
                v-model="model.num_creditos_min"
                :readonly="readOnlyFields"
                aria-placeholder="Creditos Minimos"
              ></el-input>
            </el-form-item>
          

          
            <el-form-item label="Creditos Maximos" required prop="num_creditos_max">
              <el-input
                v-model="model.num_creditos_max"
                :readonly="readOnlyFields"
                aria-placeholder="Creditos Maximos"
              ></el-input>
            </el-form-item>

            <el-form-item label="ID de la Carrera" required prop="idcarrera">
              <el-input
                v-model="model.idcarrera"
                :readonly="readOnlyFields"
                aria-placeholder="Id de la Carrera"
              ></el-input>
            </el-form-item>


          </el-row>
          <el-row :guuter="10" v-if="scope != 'show'">
            <el-form-item>
              <el-button type="success" @click="saveForm('cplanestudioForm')">
                Guardar Plan de Estudio
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
  name: "cplanestudio-form-component",
  props: {
    scope: String,
    id: Number,
  },
  mounted() {
    switch (this.scope) {
      case "show":
      case "edit":
        axios.get(`/fetch-cplanestudio-showbyid/${this.id}`).then((res) => {
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
        nombre_corto: null,
        estatus: null,
        num_creditos_total: null,
        num_creditos_min: null,
        num_creditos_max: null,
        idcarrera: null,
      },
      rules: {},
    };
  },
  methods: {
    goBack() {
      window.location.href = "/planestudios";
    },
    saveForm(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
            switch(this.scope){
                case 'create':
                this.$store.dispatch("saveCplanestudio", this.model);
                break;
                case 'edit':
                this.$store.dispatch("updateCplanestudio", {id:this.id, model:this.model});
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
