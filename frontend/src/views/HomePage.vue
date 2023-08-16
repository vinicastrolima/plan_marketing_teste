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
                  <button class="btn btn-danger" @click="deleteItem(item)">Excluir</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
    <ModalCriar v-if="showModal" @close="closeModal" @item-added="fetchItems" />
  <ModalEditar v-if="showEditModal" :itemToEdit="itemToEdit" @close="closeModalEditar" @item-editado="itemEditado" />
  <ModalExcluir v-if="showModalExcluir" :itemToExcluir="itemToExcluir" @close="closeModalExcluir" @item-excluido="itemExcluido" />

  </div>
</template>

<script>
import ModalCriar from '@/components/ModalCriar.vue';
import ModalEditar from '@/components/ModalEditar.vue';
import ModalExcluir from '@/components/ModalExcluir.vue';
import axios from 'axios';

export default {
  components: {
    ModalCriar,
    ModalEditar,
    ModalExcluir,
  },
  data() {
    return {
      showModal: false,
      showEditModal: false,
      itemToEdit: null,
      selectedItem: null,
      showModalExcluir: false,
      itemToExcluir: null,
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
      this.itemToEdit = item;
      this.showEditModal = true;
    },
    closeModalEditar() {
    this.showEditModal = false;
    this.itemToEdit = null;
    },
    itemEditado(editedItem) {
      const index = this.items.findIndex(item => item.id === editedItem.id);
      if (index !== -1) {
        this.items.splice(index, 1, editedItem);
      }
      this.showEditModal = false; // Fechar o modal após a edição ser concluída
      this.itemToEdit = null;
      this.fetchItems();
    },
    deleteItem(item) {
      this.itemToExcluir = item;
      this.showModalExcluir = true;
    },
    closeModalExcluir() {
      this.showModalExcluir = false;
    },
    openModal() {
      this.showModal = true;
    },
    closeModal() {
      this.showModal = false;
    },
    itemExcluido(itemId) {
      this.items = this.items.filter(item => item.id !== itemId);
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
