import Auth from "./auth.js";

const API_BASE_URL = 'http://localhost:8000/api/todo';

const todosService = {
    getHeaders() {
        if (!Auth.token) {
            throw new Error('Токен авторизации отсутствует');
        }
        return {
            'Content-Type': 'application/json',
            'Authorization': `Bearer ${Auth.token}`,
        };
    },

    async handleResponse(response, operation) {
        const data = await response.json();
        console.log(`${operation}:`, data);
        
        if (!response.ok) {
            throw new Error(data.message || `Ошибка при ${operation.toLowerCase()}`);
        }
        return data;
    },

    async getAll() {
        const response = await fetch(API_BASE_URL, {
            headers: this.getHeaders(),
        });
        const data = await this.handleResponse(response, 'Загрузка задач');
        return data.data;
    },

    async create(description) {
        const response = await fetch(API_BASE_URL, {
            method: 'POST',
            headers: this.getHeaders(),
            body: JSON.stringify({ description }),
        });
        const data = await this.handleResponse(response, 'Создание задачи');
        return data;
    },

    async updateStatus(todoId, completed) {
        const response = await fetch(`${API_BASE_URL}/${todoId}`, {
            method: 'PUT',
            headers: this.getHeaders(),
            body: JSON.stringify({ completed }),
        });
        return await this.handleResponse(response, `Обновление статуса задачи ${todoId}`);
    },

    async delete(todoId) {
        const response = await fetch(`${API_BASE_URL}/${todoId}`, {
            method: 'DELETE',
            headers: this.getHeaders(),
        });
        return await this.handleResponse(response, `Удаление задачи ${todoId}`);
    }
};

export default todosService;