<template>
  <div>
    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <el-page-header @back="goBack" :content="`Categoría - ${scope}`">
        </el-page-header>
      </div>
      
      <div>
          <el-form :model="model" :rules="rules" ref="ccarreraForm">
              <el-row :gutter="10"> 
                  <el-form-item label="Nombre" required prop="nombre">
                      <el-input v-model="model.nombre" :readonly="readOnlyFields" placeholder="Nombre de la carrera"></el-input>
                  </el-form-item>
                  <el-form-item label="Nombre Corto" required prop="nombre_corto">
                      <el-input v-model="model.nombre_corto" :readonly="readOnlyFields" placeholder="Nombre corto de la carrera"></el-input>
                  </el-form-item>
                  <el-form-item label="Estatus" required prop="estatus">
                      <el-input v-model="model.estatus" :readonly="readOnlyFields" placeholder="Estatus de la carrera"></el-input>
                  </el-form-item>
                  <el-form-item label="ID de la modalidad" required prop="idmodalidad">
                      <el-input v-model="model.idmodalidad" :readonly="readOnlyFields" placeholder="ID de modalidad de la carrera"></el-input>
                  </el-form-item>
              </el-row>
              <el-row :gutter="10" v-if="scope != 'show'">
                   <el-form-item >
                      <el-button type="success" @click="saveForm('ccarreraForm')">Save Carrera</el-button>
                  </el-form-item>
              </el-row>
          </el-form>
      </div>
    </el-card>
  </div>
</template>

<script>
export default {
    name: 'ccarrera-form-component',
    props:{
        scope: String,
        id: Number,

    },
    mounted() {
        
        switch(this.scope){
            case 'show':
            case 'edit':
                axios.get(`/fetch-ccarrera-showbyid/${this.id}`).then((res)=>{
                    this.$set(this, 'model', res.data.data);
                });
                break;
            default:
                break;
        }
    },
    computed:{
        readOnlyFields(){
            return (this.scope == 'show') ? true: false;
        }
    },
    data() {
        return{
            model:{
                nombre: null,
                nombre_corto: null,
                estatus: null,
                idmodalidad: null,
            },
            rules:{

            }
        }
    },
    methods: {
        goBack(){
            window.location.href="/carreras";
        },
        saveForm(formName){
            this.$refs[formName].validate((valid)=>{
                if(valid){
                    switch(this.scope){
                        case 'create':
                            this.$store.dispatch('saveCcarrera', this.model);
                            break;
                        case 'edit':
                            this.$store.dispatch('updateCcarrera', { id:this.id, model:this.model });
                            break;
                        default:
                            break;
                    }
                    
                }
            });
        }
    }
};
</script>
 