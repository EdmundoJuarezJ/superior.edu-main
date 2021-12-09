<template>
  <div>
    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <el-page-header @back="goBack" :content="`Categoría - ${scope}`">
        </el-page-header>
      </div>

      <div>
        <el-form :model="model" :rules="rules" ref="centidadForm">
          <el-row :guuter="10">
            <el-form-item label="Nombre" required prop="nombre">
              <el-input
                v-model="model.nombre"
                :readonly="readOnlyFields"
                aria-placeholder="Nombre de la entidad"
              ></el-input>
            </el-form-item>
          </el-row>
          <el-row :guuter="10" v-if="scope != 'show'">
            <el-form-item>
              <el-button type="success" @click="saveForm('centidadForm')">
                Guardar Entidad
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
  name: "centidad-form-component",
  props: {
    scope: String,
    id: Number,
  },
  mounted() {
    switch (this.scope) {
      case "show":
      case "edit":
        axios.get(`/fetch-centidad-showbyid/${this.id}`).then((res) => {
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
      },
      rules: {},
    };
  },
  methods: {
    goBack() {
      window.location.href = "/entidades";
    },
    saveForm(formName) {
      this.$refs[formName].validate((valid) => {
        if (valid) {
            switch(this.scope){
                case 'create':
                this.$store.dispatch("saveCentidad", this.model);
                break;
                case 'edit':
                this.$store.dispatch("updateCentidad", {id:this.id, model:this.model});
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
