<template>
  <div>
    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <el-page-header @back="goBack" :content="`Categoría - ${scope}`">
        </el-page-header>
      </div>
      
      <div>
          <el-form :model="model" :rules="rules" ref="clocalidadForm">
              <el-row :gutter="10"> 
                  <el-form-item label="Nombre" required prop="nombre">
                      <el-input v-model="model.nombre" :readonly="readOnlyFields" placeholder="Nombre de la localidad"></el-input>
                  </el-form-item>
                  <el-form-item label="ID Del Municipio" required prop="idmunicipio">
                      <el-input v-model="model.idmunicipio" :readonly="readOnlyFields" placeholder="ID del municipio de la localidad"></el-input>
                  </el-form-item>
              </el-row>
              <el-row :gutter="10" v-if="scope != 'show'">
                   <el-form-item >
                      <el-button type="success" @click="saveForm('clocalidadForm')">Guardar Localidad</el-button>
                  </el-form-item>
              </el-row>
          </el-form>
      </div>
    </el-card>
  </div>
</template>

<script>
export default {
    name: 'clocalidad-form-component',
    props:{
        scope: String,
        id: Number,

    },
    mounted() {
        
        switch(this.scope){
            case 'show':
            case 'edit':
                axios.get(`/fetch-clocalidad-showbyid/${this.id}`).then((res)=>{
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
                idmunicipio: null,
            },
            rules:{

            }
        }
    },
    methods: {
        goBack(){
            window.location.href="/localidades";
        },
        saveForm(formName){
            this.$refs[formName].validate((valid)=>{
                if(valid){
                    switch(this.scope){
                        case 'create':
                            this.$store.dispatch('saveClocalidad', this.model);
                            break;
                        case 'edit':
                            this.$store.dispatch('updateClocalidad', { id:this.id, model:this.model });
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
 