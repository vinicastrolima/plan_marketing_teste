<template>
    <div class="custom-modal">
      <div class="custom-modal-content">
        <div class="custom-modal-header">
          <h5 class="custom-modal-title">Excluir item:</h5>
          <button class="custom-modal-close" @click="closeModal">×</button>
        </div>
        <div class="custom-modal-body">
          <p>Tem certeza de que deseja excluir o item?</p>
          <p><strong>Nome:</strong> {{ itemToExcluir.nome }}</p>
          <p><strong>Descrição:</strong> {{ itemToExcluir.descricao }}</p>
          <!-- Adicione mais campos estáticos conforme necessário -->
        </div>
        <div class="custom-modal-footer">
          <button class="custom-btn custom-btn-secondary" @click="closeModal">Cancelar</button>
          <button class="custom-btn custom-btn-danger" @click="excluirItem">Excluir</button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    props: {
      itemToExcluir: Object,
    },
    methods: {
      closeModal() {
        this.$emit('close');
      },
      async excluirItem() {
        try {
          await axios.delete(`http://127.0.0.1:8000/api/eletrodomesticos/${this.itemToExcluir.id}`);
          this.$emit('item-excluido', this.itemToExcluir.id);
          this.closeModal();
        } catch (error) {
          console.error('Erro ao excluir o item:', error);
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
  