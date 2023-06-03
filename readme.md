# Bakery Project

This is a bakery website project built with Symfony and Twig templating engine.

## Description

The bakery project aims to showcase a variety of bakery items and provide information about the bakery. It includes features such as a homepage with a banner, a cake list page, an about page, and a contact form for inquiries.

## Installation

1. Clone the repository: `git clone https://github.com/maheshbhandari433/symfony-bakery.git`
2. Navigate to the project directory: `cd bakery-project`
3. Build the Docker containers: `docker-compose build`
4. Start the Docker containers: `docker-compose up -d`
5. Access the PHP container: `docker-compose exec php bash`
6. Install dependencies: `composer install`
7. Update the `.env` file with your desired configuration, including the database credentials:
DATABASE_URL="postgresql://your-username:your-password@localhost:5432/your-database?serverVersion=15&charset=utf8"
8. Replace `your-username`, `your-password`, and `your-database` with your actual PostgreSQL credentials.
9. Generate the encryption keys: `php bin/console generate:key`
10. Run database migrations: `php bin/console doctrine:migrations:migrate`
11. Exit the PHP container: `exit`
12. Access the bakery website in your browser: `http://localhost:8000`

## Usage

1. Access the bakery website in your browser: `http://localhost:8000`
2. Explore the different pages: homepage, cake list, about, and contact.
3. Place orders or send inquiries using the contact form.

## Contributing

Contributions are welcome! If you'd like to contribute to the project, please follow these steps:

1. Fork the repository.
2. Create a new branch: `git checkout -b feature/your-feature-name`
3. Make your changes and commit them: `git commit -m "Add your commit message"`
4. Push to the branch: `git push origin feature/your-feature-name`
5. Submit a pull request explaining your changes.

## Credits

This project was developed by [Mahesh Bhandari](https://github.com/maheshbhandari433).

## License

This project is licensed under the [MIT License](LICENSE).
