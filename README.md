<p align="center"><a href="https://www.sinarrodautama.com/" target="_blank"><img src="https://images.squarespace-cdn.com/content/v1/63815cb087699e73650ce040/de5e9c8b-a08a-4da1-aafd-086954a0538c/SRU_Logo_FullColor_Lockup_NoPadding.png?format=1500w" width="400" alt="PT. Sinar Roda Utama Logo"></a></p>

## About This Project

This project was developed as part of a technical assessment for PT. Sinar Roda Utama. The objective of the test is to evaluate the candidate’s ability to build a well-structured Laravel application with a clean and user-friendly UI/UX. It also assesses the candidate’s experience in organizing and consuming APIs effectively.

## How to Run This Project

1. **Clone the Repository**: 
   ```bash
   git clone git@github.com:iamwilldev/news-articles-test-sru.git
    ```
   
2. **Navigate to the Project Directory**:
    ```bash
   cd news-articles-test-sru
   ```
   
3. **Install Dependencies**:
   ```bash
    composer install && npm install
    ```

4. **Set Up Environment Variables**:
    - Copy the `.env.example` file to `.env`:
      ```bash
      cp .env.example .env
      ```
    - Update the `.env` file with your database credentials and other configurations.
    - Generate the application key:
      ```bash
      php artisan key:generate
      ```
      
5. **Run Migrations and Seed the Database**:
    ```bash
    php artisan migrate:fresh --seed
    ```
   
7. **Run the Application**:
    ```bash
    composer run dev
    ```
   
8. **Access the Application**:
   Open your web browser and navigate to `http://localhost:8000` to view the application.

# API Documentation
For API documentation, you can use the following endpoint after running the application:
- **API Documentation**: [Postman Collection](https://www.postman.com/sidamaba-api-5174/workspace/pt-sinar-roda-utama/collection/29629765-0cc72b99-a9ce-4fe6-bd19-f94dc15c7e13?action=share&creator=29629765&active-environment=29629765-8408790e-86ad-4ee8-8012-6263092ce231)
- **API Authentication**: Use the `Bearer` token from the `token` field in the `users` table for authentication.

# API Endpoints
- **POST /api/v1/registers**: Register a new user.
- **POST /api/v1/login**: User login to obtain a token.
- **POST /api/v1/logout**: User logout to invalidate the token.
- **GET /api/v1/articles**: Retrieve all articles with pagination.
