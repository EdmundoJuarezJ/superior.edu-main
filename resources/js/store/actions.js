import Vue from 'vue';

let loader = null;

function showLoader(text = 'loading'){
    loader = Vue.prototype.$loading({
        lock:true,
        text: text,
        spinner: 'el-icon-loading',
        background: 'rgba(255,255,255,0.85)',
    });
}

function hideLoader(){
    loader.close();
}

//ACCIONES PARA MODALIDADES
export const getCmodalidades = ({ commit }, payload) => {
    let url = `/get-cmodalidadesdata`;
    
    axios.post(url, payload)
        .then(res => {
            commit('setTableData', res.data);
    });
};


export const saveCmodalidad = ({ commit}, payload) => {
    let url = `/save-cmodalidad`;
    showLoader("Saving Modalidad");
    axios.post(url, payload).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message:'Modalidad Created Successfully',
            type:'success',
        });
        hideLoader();
        window.location.href = '/modalidades';
    });
}

export const updateCmodalidad = ({ commit}, payload) => {
    let url = `/update-cmodalidad/${payload.id}`;
    showLoader("Updating Modalidad");
    axios.put(url, payload.model).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        window.location.href = '/modalidades';
    });
}

export const deleteCmodalidad = ({ commit}, payload) => {

    let url = `/delete-cmodalidad/${payload.id}`;
    showLoader("Deleting Modalidad");
    axios.delete(url).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        
    });

}
//ACCIONES PARA CARRERA
export const getCcarreras = ({ commit }, payload)=>{

    let url = `/get-ccarrerasdata`;

    axios.post(url, payload)
        .then( res => {
            commit('setTableData', res.data);
        });
}

export const saveCcarrera =({commit}, payload)=>{

    let url = `/save-ccarrera`;

    showLoader('Saving Carrera');
    axios.post(url, payload).then( res => {
        Vue.prototype.$notify({
            title:'Success',
            message:'Carrera Created Successfully',
            type:'success',
        });
        hideLoader();
        window.location.href = '/carreras';
    });
}

export const updateCcarrera = ({commit}, payload)=>{

    let url = `/update-ccarrera/${payload.id}`;

    showLoader('Updating Carrera');
    axios.put(url, payload.model).then( res => {

        Vue.prototype.$notify({

            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        window.location.href = '/carreras';
    });
}



export const deleteCcarrera = ({commit}, payload)=>{

    let url = `/delete-ccarrera/${payload.id}`;

    showLoader('Deleting Carrera');
    axios.delete(url).then( res => {

        Vue.prototype.$notify({

            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
    });
}

//ACCIONES PARA PLAN DE ESTUDIOS

export const getCplanestudios = ({ commit }, payload) => {
    let url = `/get-cplanestudiosdata`;
    
    axios.post(url, payload)
        .then(res => {
            commit('setTableData', res.data);
    });
};


export const saveCplanestudio = ({ commit}, payload) => {
    let url = `/save-cplanestudio`;
    showLoader("Saving Plan de Estudios");
    axios.post(url, payload).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message:'Plan de estudio Created Successfully',
            type:'success',
        });
        hideLoader();
        window.location.href = '/planestudios';
    });
}

export const updateCplanestudio = ({ commit}, payload) => {
    let url = `/update-cplanestudio/${payload.id}`;
    showLoader("Updating Plan de estudio");
    axios.put(url, payload.model).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        window.location.href = '/planestudios';
    });
}

export const deleteCplanestudio = ({ commit}, payload) => {

    let url = `/delete-cplanestudio/${payload.id}`;
    showLoader("Deleting Plan de estudio");
    axios.delete(url).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        
    });

}

//ACCIONES PARA ESCALAEVAL
export const getCescalaevals = ({ commit }, payload) => {
    let url = `/get-cescalaevalsdata`;
    
    axios.post(url, payload)
        .then(res => {
            commit('setTableData', res.data);
    });
};


export const saveCescalaeval =({commit}, payload)=>{

    let url = `/save-cescalaeval`;

    showLoader('Saving Modalidad de Carrera');
    axios.post(url, payload).then( res => {
        Vue.prototype.$notify({
            title:'Success',
            message:'Modalidad de carrera Created Successfully',
            type:'success',
        });
        hideLoader();
        window.location.href = '/escalaevals';
    });
}

export const updateCescalaeval = ({ commit}, payload) => {
    let url = `/update-cescalaeval/${payload.id}`;
    showLoader("Updating Modalidad de Carrera");
    axios.put(url, payload.model).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        window.location.href = '/escalaevals';
    });
}

export const deleteCescalaeval = ({ commit}, payload) => {

    let url = `/delete-cescalaeval/${payload.id}`;
    showLoader("Deleting Modalidad de Carrera");
    axios.delete(url).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        
    });

}
//ACCIONES PARA ENTIDAD

export const getCentidades = ({ commit }, payload) => {
    let url = `/get-centidadesdata`;
    
    axios.post(url, payload)
        .then(res => {
            commit('setTableData', res.data);
    });
};


export const saveCentidad = ({ commit}, payload) => {
    let url = `/save-centidad`;
    showLoader("Guardando Entidad");
    axios.post(url, payload).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message:'Entidad Creada Exitosamente',
            type:'success',
        });
        hideLoader();
        window.location.href = '/entidades';
    });
}

export const updateCentidad = ({ commit}, payload) => {
    let url = `/update-centidad/${payload.id}`;
    showLoader("Actualizando Entidad");
    axios.put(url, payload.model).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        window.location.href = '/entidades';
    });
}

export const deleteCentidad = ({ commit}, payload) => {

    let url = `/delete-centidad/${payload.id}`;
    showLoader("Eliminando Entidad");
    axios.delete(url).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        
    });

}

//ACCIONES PARA LOCALIDAD
export const getClocalidades = ({ commit }, payload) => {
    let url = `/get-clocalidadesdata`;
    
    axios.post(url, payload)
        .then(res => {
            commit('setTableData', res.data);
    });
};


export const saveClocalidad = ({ commit}, payload) => {
    let url = `/save-clocalidad`;
    showLoader("Guardando Localidad");
    axios.post(url, payload).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message:'Localidad Creada Exitosamente',
            type:'success',
        });
        hideLoader();
        window.location.href = '/localidades';
    });
}

export const updateClocalidad = ({ commit}, payload) => {
    let url = `/update-clocalidad/${payload.id}`;
    showLoader("Actualizando Localidad");
    axios.put(url, payload.model).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        window.location.href = '/localidades';
    });
}

export const deleteClocalidad = ({ commit}, payload) => {

    let url = `/delete-clocalidad/${payload.id}`;
    showLoader("Eliminando Localidad");
    axios.delete(url).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        
    });

}
//ACCIONES PARA MOVIMIENTOS
export const getCmovimientos = ({ commit }, payload) => {
    let url = `/get-cmovimientosdata`;
    
    axios.post(url, payload)
        .then(res => {
            commit('setTableData', res.data);
    });
};


export const saveCmovimiento = ({ commit}, payload) => {
    let url = `/save-cmovimiento`;
    showLoader("Guardando Movimiento");
    axios.post(url, payload).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message:'Movimiento Creado Exitosamente',
            type:'success',
        });
        hideLoader();
        window.location.href = '/movimientos';
    });
}

export const updateCmovimiento = ({ commit}, payload) => {
    let url = `/update-cmovimiento/${payload.id}`;
    showLoader("Actualizando Movimiento");
    axios.put(url, payload.model).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        window.location.href = '/movimientos';
    });
}

export const deleteCmovimiento = ({ commit}, payload) => {

    let url = `/delete-cmovimiento/${payload.id}`;
    showLoader("Eliminando Movimiento");
    axios.delete(url).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        
    });

}
//ACCIONES PARA ASIGNATURA

export const getCasignaturas = ({ commit }, payload) => {
    let url = `/get-casignaturasdata`;
    
    axios.post(url, payload)
        .then(res => {
            commit('setTableData', res.data);
    });
};


export const saveCasignatura = ({ commit}, payload) => {
    let url = `/save-casignatura`;
    showLoader("Saving Asignatura");
    axios.post(url, payload).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message:'Asignatura Created Successfully',
            type:'success',
        });
        hideLoader();
        window.location.href = '/asignaturas';
    });
}

export const updateCasignatura = ({ commit}, payload) => {
    let url = `/update-casignatura/${payload.id}`;
    showLoader("Updating Asignatura");
    axios.put(url, payload.model).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        window.location.href = '/asignaturas';
    });
}

export const deleteCasignatura = ({ commit}, payload) => {

    let url = `/delete-casignatura/${payload.id}`;
    showLoader("Deleting Asignatura");
    axios.delete(url).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        
    });

}


////ACCIONES PARA MUNICIPIO

export const getCmunicipios = ({ commit }, payload) => {
    let url = `/get-cmunicipiosdata`;
    
    axios.post(url, payload)
        .then(res => {
            commit('setTableData', res.data);
    });
};


export const saveCmunicipio = ({ commit}, payload) => {
    let url = `/save-cmunicipio`;
    showLoader("Saving Municipio");
    axios.post(url, payload).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message:'Municipio Created Successfully',
            type:'success',
        });
        hideLoader();
        window.location.href = '/municipios';
    });
}

export const updateCmunicipio = ({ commit}, payload) => {
    let url = `/update-cmunicipio/${payload.id}`;
    showLoader("Updating Municipio");
    axios.put(url, payload.model).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        window.location.href = '/municipios';
    });
}

export const deleteCmunicipio = ({ commit}, payload) => {

    let url = `/delete-cmunicipio/${payload.id}`;
    showLoader("Deleting Municipio");
    axios.delete(url).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        
    });

}

//ACCIONES PARA MOTIVO BAJA

export const getCmotivobajas = ({ commit }, payload) => {
    let url = `/get-cmotivobajasdata`;
    
    axios.post(url, payload)
        .then(res => {
            commit('setTableData', res.data);
    });
};


export const saveCmotivobaja = ({ commit}, payload) => {
    let url = `/save-cmotivobaja`;
    showLoader("Saving Baja");
    axios.post(url, payload).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message:'Baja Created Successfully',
            type:'success',
        });
        hideLoader();
        window.location.href = '/motivobajas';
    });
}

export const updateCmotivobaja = ({ commit}, payload) => {
    let url = `/update-cmotivobaja/${payload.id}`;
    showLoader("Updating Baja");
    axios.put(url, payload.model).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        window.location.href = '/motivobajas';
    });
}

export const deleteCmotivobaja = ({ commit}, payload) => {

    let url = `/delete-cmotivobaja/${payload.id}`;
    showLoader("Deleting Baja");
    axios.delete(url).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        
    });

}

// ACCIONES PARA PERIODO
export const getCperiodos = ({ commit }, payload) => {
    let url = `/get-cperiodosdata`;
    
    axios.post(url, payload)
        .then(res => {
            commit('setTableData', res.data);
    });
};


export const saveCperiodo = ({ commit}, payload) => {
    let url = `/save-cperiodo`;
    showLoader("Saving Periodo");
    axios.post(url, payload).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message:'Periodo Created Successfully',
            type:'success',
        });
        hideLoader();
        window.location.href = '/periodos';
    });
}

export const updateCperiodo = ({ commit}, payload) => {
    let url = `/update-cperiodo/${payload.id}`;
    showLoader("Updating Periodo");
    axios.put(url, payload.model).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        window.location.href = '/periodos';
    });
}

export const deleteCperiodo = ({ commit}, payload) => {

    let url = `/delete-cperiodo/${payload.id}`;
    showLoader("Deleting Periodo");
    axios.delete(url).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        
    });

}

//ACCIONES PARA ASIGNATURA

export const getCpersonas = ({ commit }, payload) => {
    let url = `/get-cpersonasdata`;
    
    axios.post(url, payload)
        .then(res => {
            commit('setTableData', res.data);
    });
};


export const saveCpersona = ({ commit}, payload) => {
    let url = `/save-cpersona`;
    showLoader("Guardando Persona");
    axios.post(url, payload).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message:'Persona Creada Exitosamente',
            type:'success',
        });
        hideLoader();
        window.location.href = '/personas';
    });
}

export const updateCpersona = ({ commit}, payload) => {
    let url = `/update-cpersona/${payload.id}`;
    showLoader("Actualizando Persona");
    axios.put(url, payload.model).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        window.location.href = '/personas';
    });
}

export const deleteCpersona = ({ commit}, payload) => {

    let url = `/delete-cpersona/${payload.id}`;
    showLoader("Eliminando Persona");
    axios.delete(url).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        
    });

}

//ACCIONES PARA ALUMNO MOVIMIENTO
export const getCalumnomovimientos = ({ commit }, payload) => {
    let url = `/get-calumnomovimientosdata`;
    
    axios.post(url, payload)
        .then(res => {
            commit('setTableData', res.data);
    });
};


export const saveCalumnomovimiento = ({ commit}, payload) => {
    let url = `/save-calumnomovimiento`;
    showLoader("Saving movimiento");
    axios.post(url, payload).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message:'Movimiento Created Successfully',
            type:'success',
        });
        hideLoader();
        window.location.href = '/alumnomovimientos';
    });
}

export const updateCalumnomovimiento = ({ commit}, payload) => {
    let url = `/update-calumnomovimiento/${payload.id}`;
    showLoader("Actualizando Movimiento");
    axios.put(url, payload.model).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        window.location.href = '/alumnomovimientos';
    });
}

export const deleteCalumnomovimiento = ({ commit}, payload) => {

    let url = `/delete-calumnomovimiento/${payload.id}`;
    showLoader("Deleting Movimiento");
    axios.delete(url).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        
    });

}

//ACCIONES PARA GRUPO
export const getCgrupos = ({ commit }, payload) => {
    let url = `/get-cgruposdata`;
    
    axios.post(url, payload)
        .then(res => {
            commit('setTableData', res.data);
    });
};


export const saveCgrupo = ({ commit}, payload) => {
    let url = `/save-cgrupo`;
    showLoader("Saving Grupo");
    axios.post(url, payload).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message:'Grupo Created Successfully',
            type:'success',
        });
        hideLoader();
        window.location.href = '/grupos';
    });
}

export const updateCgrupo = ({ commit}, payload) => {
    let url = `/update-cgrupo/${payload.id}`;
    showLoader("Updating Grupo");
    axios.put(url, payload.model).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        window.location.href = '/grupos';
    });
}

export const deleteCgrupo = ({ commit}, payload) => {

    let url = `/delete-cgrupo/${payload.id}`;
    showLoader("Deleting Grupo");
    axios.delete(url).then(res =>{
        Vue.prototype.$notify({
            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        
    });

}

//ACCIONES PARA EVALUACION
export const getCevaluaciones = ({ commit }, payload)=>{

    let url = `/get-cevaluacionesdata`;

    axios.post(url, payload)
        .then( res => {
            commit('setTableData', res.data);
        });
}

export const saveCevaluacion =({commit}, payload)=>{

    let url = `/save-cevaluacion`;

    showLoader('Guardando Evaluacion');
    axios.post(url, payload).then( res => {
        Vue.prototype.$notify({
            title:'Success',
            message:'Evaluacion Creada Exitosamente',
            type:'success',
        });
        hideLoader();
        window.location.href = '/evaluaciones';
    });
}

export const updateCevaluacion = ({commit}, payload)=>{

    let url = `/update-cevaluacion/${payload.id}`;

    showLoader('Actualizando Evaluacion');
    axios.put(url, payload.model).then( res => {

        Vue.prototype.$notify({

            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
        window.location.href = '/evaluaciones';
    });
}



export const deleteCevaluacion = ({commit}, payload)=>{

    let url = `/delete-cevaluacion/${payload.id}`;

    showLoader('Eliminando Evaluacion');
    axios.delete(url).then( res => {

        Vue.prototype.$notify({

            title:'Success',
            message: res.data.message,
            type:'success',
        });
        hideLoader();
    });
}
