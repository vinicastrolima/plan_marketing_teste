<template>
    <div class="custom-modal">
      <div class="custom-modal-content">
        <div class="custom-modal-header">
          <h5 class="custom-modal-title">Adicionar Item</h5>
          <button class="custom-modal-close" @click="closeModal">×</button>
        </div>
        <div class="custom-modal-body">
          <form>
            <div class="custom-form-group">
              <label for="nome">Nome</label>
              <input type="text" id="nome" v-model="nome" class="custom-form-control">
            </div>
            <div class="custom-form-group">
              <label for="descricao">Descrição</label>
              <input type="text" id="descricao" v-model="descricao" class="custom-form-control">
            </div>
            <div class="custom-form-group">
              <label for="marca">Marca</label>
              <input type="text" id="marca" v-model="marca" class="custom-form-control">
            </div>
            <div class="custom-form-group">
                <label for="tensao">Tensão</label>
                <select id="tensao" v-model="tensao" class="custom-form-control">
                <option v-for="option in tensaoOptions" :key="option" :value="option">{{ option }}</option>
                </select>
            </div>
          </form>
        </div>
        <div class="custom-modal-footer">
          <button class="custom-btn custom-btn-secondary" @click="closeModal">Fechar</button>
          <button class="custom-btn custom-btn-primary" @click="saveItem">Salvar</button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';

  export default {
    data() {
      return {
        nome: '',
        descricao: '',
        marca: '',
        tensaoOptions: ['100V','110V','127V', '208V','220V', '230V', '240V', '480V'],
        tensao: '',
      };
    },
    methods: {
      closeModal() {
        this.$emit('close');
      },
      async saveItem() {
      try {
        const newItem = {
          nome: this.nome,
          descricao: this.descricao,
          marca: this.marca,
          tensao: this.tensao,
        };

        const response = await axios.post('http://127.0.0.1:8000/api/eletrodomesticos', newItem);
        console.log('Novo item adicionado:', response.data);

        // Emitir um evento para atualizar a lista de itens na página inicial
        this.$emit('itemAdded', response.data);

        this.closeModal(); // Fechar o modal após salvar (ajuste conforme necessário)
        alert('Produto salvo com sucesso!')
      } catch (error) {
        console.error('Erro ao salvar o item:', error);
      }
    },

    },
  };
  </script>
  
  <style scoped>
  /* Estilize o modal personalizado aqui */
  .custom-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    justify-content: center;
    align-items: center;
  }
  
  .custom-modal-content {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
    max-width: 80%;
    width: 400px;
  }
  
  .custom-modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 10px 20px;
    border-bottom: 1px solid #ccc;
  }
  
  .custom-modal-title {
    margin: 0;
  }
  
  .custom-modal-close {
    background: none;
    border: none;
    cursor: pointer;
    font-size: 18px;
    padding: 0;
  }
  
  .custom-modal-body {
    padding: 20px;
  }
  
  .custom-form-group {
    margin-bottom: 15px;
  }
  
  .custom-form-group label {
    display: block;
    font-weight: bold;
  }
  
  .custom-form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 4px;
  }
  
  .custom-modal-footer {
    padding: 10px 20px;
    border-top: 1px solid #ccc;
    display: flex;
    justify-content: flex-end;
  }
  
  .custom-btn {
    padding: 8px 16px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
  }
  
  .custom-btn-secondary {
    background-color: #ccc;
    margin-right: 10px;
  }
  
  .custom-btn-primary {
    background-color: #007bff;
    color: white;
  }
  </style>
  