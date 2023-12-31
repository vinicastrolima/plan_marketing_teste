<template>
  <div class="custom-modal">
    <div class="custom-modal-content">
      <div class="custom-modal-header">
        <h5 class="custom-modal-title">Editar Item</h5>
        <button class="custom-modal-close" @click="closeModal">×</button>
      </div>
      <div class="custom-modal-body">
        <form>
          <div class="custom-form-group">
            <label for="editNome">Nome</label>
            <input type="text" id="editNome" v-model="editedItem.nome" class="custom-form-control" :class="{ 'is-invalid': errors.nome }">
            <div class="invalid-feedback">{{ errors.nome }}</div>
          </div>
          <div class="custom-form-group">
            <label for="editDescricao">Descrição</label>
            <input type="text" id="editDescricao" v-model="editedItem.descricao" class="custom-form-control" :class="{ 'is-invalid': errors.descricao }">
            <div class="invalid-feedback">{{ errors.descricao }}</div>
          </div>
          <div class="custom-form-group">
            <label for="editMarca">Marca</label>
            <input type="text" id="editMarca" v-model="editedItem.marca" class="custom-form-control" :class="{ 'is-invalid': errors.marca }">
            <div class="invalid-feedback">{{ errors.marca }}</div>
          </div>
          <div class="custom-form-group">
            <label for="editTensao">Tensão</label>
            <select id="editTensao" v-model="editedItem.tensao" class="custom-form-control">
              <option v-for="option in tensaoOptions" :key="option" :value="option">{{ option }}</option>
            </select>
          </div>
        </form>
      </div>
      <div class="custom-modal-footer">
        <button class="custom-btn custom-btn-secondary" @click="closeModal">Cancelar</button>
        <button class="custom-btn custom-btn-primary" @click="saveItem">Salvar</button>
      </div>
    </div>
  </div>
</template>


<script>
import axios from 'axios';
import { APP_URL } from '@/config';

export default {
  props: {
    itemToEdit: Object,
  },
  data() {
    return {
      editedItem: {
        nome: '',
        descricao: '',
        marca: '',
        tensao: '',
      },
      tensaoOptions: ['100V','110V','127V', '208V','220V', '230V', '240V', '480V'],
      errors: {
        nome: '',
        descricao: '',
        marca: '',
      },
    };
  },
  watch: {
    itemToEdit: {
      handler(newItem) {
        this.editedItem.nome = newItem.nome;
        this.editedItem.descricao = newItem.descricao;
        this.editedItem.marca = newItem.marca;
        this.editedItem.tensao = newItem.tensao;
      },
      immediate: true,
    },
  },
  methods: {
    closeModal() {
      this.$emit('close');
    },
    validateFields() {
      this.errors = {
        nome: this.isFieldEmptyOrWhiteSpace(this.editedItem.nome) ? 'Campo obrigatório' : (this.editedItem.nome.trim().length > 200 ? 'Nome não pode ter mais de 200 caracteres' : ''),
        descricao: this.isFieldEmptyOrWhiteSpace(this.editedItem.descricao) ? 'Campo obrigatório' : (this.editedItem.descricao.trim().length > 200 ? 'Descrição não pode ter mais de 200 caracteres' : ''),
        marca: this.isFieldEmptyOrWhiteSpace(this.editedItem.marca) ? 'Campo obrigatório' : (this.editedItem.marca.trim().length > 50 ? 'Marca não pode ter mais de 50 caracteres' : ''),
      };

      return Object.values(this.errors).every(error => error === '');
    },
    isFieldEmptyOrWhiteSpace(value) {
      return value.trim().length === 0 || value.trim() === '';
    },
    async saveItem() {
      if (this.validateFields()) {
        try {
          const response = await axios.put(`${APP_URL}/eletrodomesticos/${this.itemToEdit.id}`, {
            nome: this.editedItem.nome,
            descricao: this.editedItem.descricao,
            marca: this.editedItem.marca,
            tensao: this.editedItem.tensao,
          });

          this.$emit('item-editado', response.data);

          this.closeModal();
        } catch (error) {
          console.error('Erro ao editar o item:', error);
        }
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
