# Projeto Laravel - Medical Record

Este guia fornece instruções sobre como configurar e executar o projeto "Medical Record" desenvolvido em Laravel. Certifique-se de seguir os passos abaixo para preparar o ambiente e iniciar o projeto.

## Instalação

1. **Repositório:**
   ```bash
   cd medical-record

## Instalação (Continuação)

2. **Instalar Dependências:**
   ```bash
   composer install

3. **Configurar o Arquivo de Ambiente:**
   - Copie o arquivo `.env.example` para `.env`:
     ```bash
     cp .env.example .env
     ```
   - Abra o arquivo `.env` e configure as informações do banco de dados e outras configurações conforme necessário.

4. **Gerar Chave de Aplicativo:**
   ```bash
   php artisan key:generate

5. **Executar Migrações do Banco de Dados:**
   ```bash
   php artisan migrate