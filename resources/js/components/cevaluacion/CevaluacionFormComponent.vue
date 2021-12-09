<template>
  <div>
    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <el-page-header @back="goBack" :content="`Categoría - ${scope}`">
        </el-page-header>
      </div>
      
      <div>
          <el-form :model="model" :rules="rules" ref="cevaluacionForm">
              <el-row :gutter="10"> 
                  <el-form-item label="Calificación" required prop="calificacion">
                      <el-input v-model="model.calificacion" :readonly="readOnlyFields" placeholder="Calificación"></el-input>
                  </el-form-item>
                  <el-form-item label="ID del Expediente" required prop="idexpediente">
                      <el-input v-model="model.idexpediente" :readonly="readOnlyFields" placeholder="ID del Expediente"></el-input>
                  </el-form-item>
                  <el-form-item label="ID del Usuario" required prop="idusuario">
                      <el-input v-model="model.idusuario" :readonly="readOnlyFields" placeholder="ID del Usuario"></el-input>
                  </el-form-item>
                  <el-form-item label="ID de la Asignatura" required prop="idasignatura">
                      <el-input v-model="model.idasignatura" :readonly="readOnlyFields" placeholder="ID de Asignatura"></el-input>
                  </el-form-item>
              </el-row>
              <el-row :gutter="10" v-if="scope != 'show'">
                   <el-form-item >
                      <el-button type="success" @click="saveForm('cevaluacionForm')">Guardar Evaluacion</el-button>
                  </el-form-item>
              </el-row>
          </el-form>
      </div>
    </el-card>
  </div>
</template>

<script>
export default {
    name: 'cevaluacion-form-component',
    props:{
        scope: String,
        id: Number,

    },
    mounted() {
        
        switch(this.scope){
            case 'show':
            case 'edit':
                axios.get(`/fetch-cevaluacion-showbyid/${this.id}`).then((res)=>{
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
                calificacion: null,
                idexpediente: null,
                idusuario: null,
                idasignatura: null,
            },
            rules:{

            }
        }
    },
    methods: {
        goBack(){
            window.location.href="/evaluaciones";
        },
        saveForm(formName){
            this.$refs[formName].validate((valid)=>{
                if(valid){
                    switch(this.scope){
                        case 'create':
                            this.$store.dispatch('saveCevaluacion', this.model);
                            break;
                        case 'edit':
                            this.$store.dispatch('updateCevaluacion', { id:this.id, model:this.model });
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
 