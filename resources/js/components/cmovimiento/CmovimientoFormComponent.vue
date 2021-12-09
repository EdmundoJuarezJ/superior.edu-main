<template>
  <div>
    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <el-page-header @back="goBack" :content="`Categoría - ${scope}`">
        </el-page-header>
      </div>
      
      <div>
          <el-form :model="model" :rules="rules" ref="cmovimientoForm">
              <el-row :gutter="10"> 
                  <el-form-item label="Nombre" required prop="nombre">
                      <el-input v-model="model.nombre" :readonly="readOnlyFields" placeholder="Nombre de la carrera"></el-input>
                  </el-form-item>
                  <el-form-item label="Estatus" required prop="estatus">
                      <el-input v-model="model.estatus" :readonly="readOnlyFields" placeholder="Estatus de la carrera"></el-input>
                  </el-form-item>
                  <el-form-item label="ID de Tipo de Usuario" required prop="idrole">
                      <el-input v-model="model.idrole" :readonly="readOnlyFields" placeholder="ID de modalidad de la carrera"></el-input>
                  </el-form-item>
              </el-row>
              <el-row :gutter="10" v-if="scope != 'show'">
                   <el-form-item >
                      <el-button type="success" @click="saveForm('cmovimientoForm')">Guardar Carrera</el-button>
                  </el-form-item>
              </el-row>
          </el-form>
      </div>
    </el-card>
  </div>
</template>

<script>
export default {
    name: 'cmovimiento-form-component',
    props:{
        scope: String,
        id: Number,

    },
    mounted() {
        
        switch(this.scope){
            case 'show':
            case 'edit':
                axios.get(`/fetch-cmovimiento-showbyid/${this.id}`).then((res)=>{
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
                estatus: null,
                idrole: null,
            },
            rules:{

            }
        }
    },
    methods: {
        goBack(){
            window.location.href="/movimientos";
        },
        saveForm(formName){
            this.$refs[formName].validate((valid)=>{
                if(valid){
                    switch(this.scope){
                        case 'create':
                            this.$store.dispatch('saveCmovimiento', this.model);
                            break;
                        case 'edit':
                            this.$store.dispatch('updateCmovimiento', { id:this.id, model:this.model });
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
 