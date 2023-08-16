<template>
  <div class="home-page">
    <div class="container mt-5">
      <div class="card">
        <div class="card-header">
          Lista de Itens
          <button class="btn btn-primary float-end" @click="addItem">Adicionar Item</button>
        </div>
        <div class="card-body">
          <table class="table table-bordered">
            <thead class="table-dark">
              <tr>
                <th scope="col">Nome</th>
                <th scope="col">Descrição</th>
                <th scope="col">Tensão</th>
                <th scope="col">Marca</th>
                <th scope="col">Ações</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="item in items" :key="item.id">
                <td>{{ item.nome }}</td>
                <td>{{ item.descricao }}</td>
                <td>{{ item.tensao }}</td>
                <td>{{ item.marca }}</td>
                <td>
                  <button class="btn btn-primary me-2" @click="editItem(item)">Editar</button>
                  <button class="btn btn-danger" @click="deleteItem(item.id)">Excluir</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <ModalCriar v-if="showModal" @close="closeModal" />
    <ModalEditar v-if="showEditModal" :itemToEdit="selectedItem" @close="closeEditModal" />
  </div>
</template>

<script>
import ModalCriar from '@/components/ModalCriar.vue';
import ModalEditar from '@/components/ModalEditar.vue';
import axios from 'axios';

export default {
  components: {
    ModalCriar,
    ModalEditar,
  },
  data() {
    return {
      showModal: false,
      showEditModal: false,
      selectedItem: null,
      items: [],
    };
  },
  methods: {
    async fetchItems() {
      try {
        const response = await axios.get('http://127.0.0.1:8000/api/eletrodomesticos');
        this.items = response.data;
      } catch (error) {
        console.error('Erro ao buscar itens:', error);
      }
    },
    addItem() {
      this.openModal();
      // Implemente a lógica para adicionar um novo item
    },
    editItem(item) {
      this.selectedItem = item;
      this.showEditModal = true;
    },
    closeEditModal() {
      this.showEditModal = false;
      this.selectedItem = null;
    },
    deleteItem() {
      // Implemente a lógica para excluir um item
    },
    openModal() {
      this.showModal = true;
    },
    closeModal() {
      this.showModal = false;
    },
  },
  mounted() {
    this.fetchItems();
  },
};
</script>

<style>
/* Adicione estilos CSS aqui, se necessário */
</style>
