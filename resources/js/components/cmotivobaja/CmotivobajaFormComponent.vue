<template>
  <div>
    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <el-page-header @back="goBack" :content="`Category - ${scope}`">
        </el-page-header>
      </div>

      <div>
        <el-form :model="model" :rules="rules" ref="cmotivobajaForm">
          <el-row :guuter="10">
            <el-form-item label="Nombre" required prop="nombre">
              <el-input
                v-model="model.nombre"
                :readonly="readOnlyFields"
                aria-placeholder="Nombre"
              ></el-input>
            </el-form-item>

            <el-form-item label="Estatus" required prop="estatus">
              <el-input
                v-model="model.estatus"
                :readonly="readOnlyFields"
                aria-placeholder="Estatus"
              ></el-input>
            </el-form-item>

            <el-form-item label="ID de Rol" required prop="idrole">
              <el-input
                v-model="model.idrole"
                :readonly="readOnlyFields"
                aria-placeholder="ID de Rol"
              ></el-input>
            </el-form-item>

          </el-row>
          <el-row :guuter="10" v-if="scope != 'show'">
            <el-form-item>
              <el-button type="success" @click="saveForm('cmotivobajaForm')">
                Guardar Motivo
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
  name: "cmotivobaja-form-component",
  props: {
    scope: String,
    id: Number,
  },
  mounted() {
    switch (this.scope) {
      case "show":
      case "edit":
        axios.get(`/fetch-cmotivobaja-showbyid/${this.id}`).then((res) => {
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
        estatus: null,
        idrole: null,
      },
      rules: {},
    };
  },
  methods: {
    goBack() {
      window.location.href = "/motivobajas";
    },
    saveForm(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
            switch(this.scope){
                case 'create':
                this.$store.dispatch("saveCmotivobaja", this.model);
                break;
                case 'edit':
                this.$store.dispatch("updateCmotivobaja", {id:this.id, model:this.model});
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
