<template>
  <div>
    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <el-page-header @back="goBack" :content="`Category - ${scope}`">
        </el-page-header>
      </div>

      <div>
        <el-form :model="model" :rules="rules" ref="cperiodoForm">
          <el-row :guuter="10">
            <el-form-item label="Nombre" required prop="nombre">
              <el-input
                v-model="model.nombre"
                :readonly="readOnlyFields"
                aria-placeholder="Nombre del periodo"
              ></el-input>
            </el-form-item>

            <el-form-item label="Fecha de inicio" required prop="fecha_inicio">
              <el-input
                v-model="model.fecha_inicio"
                :readonly="readOnlyFields"
                aria-placeholder="Fecha de inicio"
              ></el-input>
            </el-form-item>

            <el-form-item label="Fecha final" required prop="fecha_fin">
              <el-input
                v-model="model.fecha_fin"
                :readonly="readOnlyFields"
                aria-placeholder="Fecha final"
              ></el-input>
            </el-form-item>

          </el-row>
          <el-row :guuter="10" v-if="scope != 'show'">
            <el-form-item>
              <el-button type="success" @click="saveForm('cperiodoForm')">
                Guardar Periodo
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
  name: "cperiodo-form-component",
  props: {
    scope: String,
    id: Number,
  },
  mounted() {
    switch (this.scope) {
      case "show":
      case "edit":
        axios.get(`/fetch-cperiodo-showbyid/${this.id}`).then((res) => {
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
        fecha_inicio: null,
        fecha_fin: null,
      },
      rules: {},
    };
  },
  methods: {
    goBack() {
      window.location.href = "/periodos";
    },
    saveForm(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
            switch(this.scope){
                case 'create':
                this.$store.dispatch("saveCperiodo", this.model);
                break;
                case 'edit':
                this.$store.dispatch("updateCperiodo", {id:this.id, model:this.model});
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
