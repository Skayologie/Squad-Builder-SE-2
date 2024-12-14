# FUT Champions Ultimate Team Backend

## Project Context
This project focuses on developing the backend of the FUT Champions Ultimate Team platform using procedural PHP and MySQLi. The goal is to create a robust content manager to handle players, teams, nationalities, and related entities. Additionally, an internationalization feature will be integrated to support multilingual usage of the platform. 🌐

---

## Backend Features

### 1. Data Analysis and Optimization
- 🔍 Perform a deep analysis of the provided JSON file to design an optimal database structure.
- 📊 Apply database normalization principles to eliminate redundancy in attributes and data.
- 🛠️ Create effective relational schemas to manage entities such as players, teams, nationalities, and their relationships.

### 2. Entity Management
- 📝 Implement an interface to add, edit, delete, and list entities.
- 🤝 Manage relationships between entities (e.g., associating a player with a team and a nationality).

### 3. Dashboard and Statistics
- 📈 Design a dynamic dashboard to visualize key statistics (e.g., number of players, distribution by nationality, team performance).
- 📊 Integrate charts and diagrams using libraries like Chart.js to make statistics interactive.

### 4. Internationalization (i18n)
- 🌍 Implement an internationalization system to support multilingual functionality.
- 📂 Use separate language files for each supported language (e.g., `fr.php`, `en.php`, `es.php`).
- 🔄 Allow users to change the interface language through a dashboard option.

### 5. Script Documentation
- 📖 Provide clear and concise documentation for each PHP script.
- 💡 Include inline comments to explain the code logic.
- 🗂️ Add README files with setup and usage instructions.

---

## Bonus Features
- ⚡ Use AJAX for asynchronous operations (e.g., dynamic content loading, validation without page reload).
- ✨ Integrate modals for a seamless user experience (e.g., management forms in modal windows).
- 📊 Enhance statistical visualization with interactive charts.

---

## User Stories

### US01: Player Management
As an administrator, I want to add, edit, delete, and list players to maintain an up-to-date database. 🧑‍💻

### US02: Team Management
As an administrator, I want to create and manage teams to efficiently organize competitions. ⚽

### US03: Internationalization (Bonus)
As a user, I want to change the interface language to use the platform in my preferred language. 🌐

### US04: Dynamic Statistics
As an administrator, I want to visualize key statistics on a dashboard to better understand platform usage. 📊

### US05: Navigation Fluidity (Bonus)
As a user, I want to perform actions without page reloads using AJAX to enhance my experience. 🚀

---

## Setup Instructions
1. 📥 Clone this repository.
2. ⚙️ Configure the database connection in the `config.php` file.
3. 🗄️ Import the provided SQL schema to initialize the database.
4. 🛠️ Follow the entity management interfaces to populate data.
5. 📊 Access the dashboard to view and manage statistics.

## Requirements
- 🖥️ PHP 7.4 or higher
- 🗄️ MySQL 5.7 or higher
- 📊 Chart.js library for statistical visualization
- 🌐 AJAX-enabled browser for bonus features

---

## Contributions
Feel free to contribute to this project by opening pull requests. Ensure code adheres to the existing documentation and conventions. 🤝

---

## License
This project is licensed under the MIT License. See the LICENSE file for details. 📜
