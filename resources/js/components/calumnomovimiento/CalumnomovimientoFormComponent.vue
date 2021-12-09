<template>
  <div>
    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <el-page-header @back="goBack" :content="`Categoría - ${scope}`">
        </el-page-header>
      </div>
      
      <div>
          <el-form :model="model" :rules="rules" ref="calumnomovimientoForm">
              <el-row :gutter="10"> 
                  <el-form-item label="ID del Alumno" required prop="idalumno">
                      <el-input v-model="model.idalumno" :readonly="readOnlyFields" placeholder="ID del Alumno"></el-input>
                  </el-form-item>
                  <el-form-item label="ID del Usuario" required prop="idusuario">
                      <el-input v-model="model.idusuario" :readonly="readOnlyFields" placeholder="ID del Usuario"></el-input>
                  </el-form-item>
                  <el-form-item label="ID del Motivo de Baja" required prop="idmotivobaja">
                      <el-input v-model="model.idmotivobaja" :readonly="readOnlyFields" placeholder="ID del Motivo de Baja"></el-input>
                  </el-form-item>
                  <el-form-item label="ID del Tipo de Movimiento" required prop="idtipomovimiento">
                      <el-input v-model="model.idtipomovimiento" :readonly="readOnlyFields" placeholder="ID del Tipo de Movimiento"></el-input>
                  </el-form-item>
              </el-row>
              <el-row :gutter="10" v-if="scope != 'show'">
                   <el-form-item >
                      <el-button type="success" @click="saveForm('calumnomovimientoForm')">Guardar Movimiento</el-button>
                  </el-form-item>
              </el-row>
          </el-form>
      </div>
    </el-card>
  </div>
</template>

<script>
export default {
    name: 'calumnomovimiento-form-component',
    props:{
        scope: String,
        id: Number,

    },
    mounted() {
        
        switch(this.scope){
            case 'show':
            case 'edit':
                axios.get(`/fetch-calumnomovimiento-showbyid/${this.id}`).then((res)=>{
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
                idalumno: null,
                idusuario: null,
                idmotivobaja: null,
                idtipomovimiento: null,
            },
            rules:{

            }
        }
    },
    methods: {
        goBack(){
            window.location.href="/alumnomovimientos";
        },
        saveForm(formName){
            this.$refs[formName].validate((valid)=>{
                if(valid){
                    switch(this.scope){
                        case 'create':
                            this.$store.dispatch('saveCalumnomovimiento', this.model);
                            break;
                        case 'edit':
                            this.$store.dispatch('updateCalumnomovimiento', { id:this.id, model:this.model });
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
 