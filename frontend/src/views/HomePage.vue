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
                  <button class="btn btn-primary me-2" @click="editItem(item.id)">Editar</button>
                  <button class="btn btn-danger" @click="deleteItem(item.id)">Excluir</button>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
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
      // Implemente a lógica para adicionar um novo item
    },
    editItem() {
      // Implemente a lógica para editar um item
    },
    deleteItem() {
      // Implemente a lógica para excluir um item
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
