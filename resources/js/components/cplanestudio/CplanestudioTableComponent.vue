<template>
  <div>
    <el-card class="box-card">
      <div slot="header" class="clearfix">
        <div>
          Datos del Plan de estudio
          <el-button type="default" class="float-right" @click="create"
            >Agregar Plan de Estudio</el-button
          >
        </div>
      </div>

      <div>
        <el-table
          :data="tableData"
          :stripe="true"
          :border="true"
          height="400"
          style="width: 100%"
        >
          <el-table-column
            v-for="column in tableColumns"
            :key="column.label"
            :label="column.label"
            :prop="column.prop"
            :column-key="column.prop"
            :min-width="column.minWidth"
            :sortable="column.sortable"
            :align="column.align"
            :header-align="column.align"
            :fixed="column.fixed || null"
            :formatter="column.formatter || null"
          >
          </el-table-column>
          <el-table-column align="right" min-width="90">
            <template slot="header" slot-scope="scope">
              <el-input
                v-model="searchQuery"
                size="mini"
                placeholder="Type to search"
              />
            </template>
            <template slot-scope="scope" >
              <el-button
                size="mini"
                type="info"
                icon="el-icon-view"
                @click="showData(scope.$index, scope.row)"
                ></el-button
              >
              <el-button
                size="mini"
                type="success"
                icon="el-icon-edit"
                @click="editData(scope.$index, scope.row)"
                ></el-button
              >
              <el-button
                size="mini"
                type="danger"
                icon="el-icon-delete"
                @click="deleteData(scope.$index, scope.row)"
                ></el-button
              >
            </template>
          </el-table-column>
        </el-table>
      </div>
    </el-card>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
export default {
  name: "cplanestudio-table-component",

  mounted() {
    const loading = this.$loading({
      lock: true,
      text: "text",
      spinner: "el-icon-loading",
      background: "rgba(255,255,255,0.85)",
    });

    this.$store.dispatch("getCplanestudios", {searchQuery: this.searchQuery});
    loading.close();
  },
  computed: {
    ...mapGetters({
      tableData: "tableData",
    }),
  },
  watch: {
    searchQuery: function(val){
      this.$store.dispatch("getCplanestudios", {searchQuery: this.searchQuery} );
    },
  },
  data() {
    return {
      searchQuery: null,
      tableColumns: [
        {
          prop: "id",
          label: "ID",
          minWidth: 40,
          sortable: true,
          hidden: false,
          align: "center",
          fixed: true,
        },
        {
          prop: "nombre",
          label: "Nombre",
          minWidth: 100,
          sortable: false,
          hidden: false,
          align: "center",
          fixed: true,
        },
        {
          prop: "nombre_corto",
          label: "Nombre Corto",
          minWidth: 100,
          sortable: false,
          hidden: false,
          align: "center",
          fixed: true,
        },
        {
          prop: "estatus",
          label: "Estatus",
          minWidth: 100,
          sortable: false,
          hidden: false,
          align: "center",
          fixed: true,
        },
        {
          prop: "num_creditos_total",
          label: "Creditos Totales",
          minWidth: 100,
          sortable: false,
          hidden: false,
          align: "center",
          fixed: true,
        },
        {
          prop: "num_creditos_min",
          label: "Creditos Minimos",
          minWidth: 120,
          sortable: false,
          hidden: false,
          align: "center",
          fixed: true,
        },
        {
          prop: "num_creditos_max",
          label: "Creditos Maximos",
          minWidth: 120,
          sortable: false,
          hidden: false,
          align: "center",
          fixed: true,
        },
      ],
    };
  },
  methods: {
    create() {
      window.location.href = "/add-cplanestudio";
    },
    showData(index, row){
      window.location.href = "/show-cplanestudio/"+row.id;
    },
    editData(index, row) {
      window.location.href = "/edit-cplanestudio/" + row.id + "/edit";
    },
    deleteData(index, row){
      if(confirm("Estas seguro de borrar este dato?")){
        this.$store.dispatch('deleteCplanestudio', {id:row.id});
        this.$store.dispatch('getCplanestudios');
      }
    },
  },
};
</script>
