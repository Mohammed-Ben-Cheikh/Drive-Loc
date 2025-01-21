<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YouDemy-Dashboard</title>
    <script src="http://localhost/youdemy/app/js/tailwindcss.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-blue-900 to-blue-800 min-h-screen">
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar -->
        <nav id="sidebar"
            class="transform -translate-x-full md:translate-x-0 fixed md:relative w-72 min-h-screen bg-blue-900/95 backdrop-blur-xl border-r border-blue-700/50 transition-transform duration-300 ease-in-out z-50">
            <!-- Logo Section -->
            <div class="p-4">
                <div
                    class="bg-gradient-to-r from-purple-600 to-blue-600 rounded-xl p-1 shadow-lg transform hover:scale-105 transition-all">
                    <img src="../img/logo.png" alt="logo" class="h-auto rounded-xl mx-auto">
                </div>
            </div>
            <!-- Navigation Links -->
            <div class="px-3">
                <div class="space-y-1">
                    <a href="../index.php"
                        class="group flex items-center px-4 py-3 text-blue-300 hover:bg-blue-800/50 rounded-lg transition-all duration-200">
                        <i class="fas fa-tachometer-alt text-xl mr-3"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="categories.php"
                        class="group flex items-center px-4 py-3 text-blue-300 hover:bg-blue-800/50 rounded-lg transition-all duration-200">
                        <i class="fas fa-tags text-xl mr-3"></i>
                        <span>Categories et Tags</span>
                    </a>
                    <a href="cours.php"
                        class="group flex items-center px-4 py-3 text-blue-300 hover:bg-blue-800/50 rounded-lg transition-all duration-200">
                        <i class="fa-solid fa-book-open text-xl mr-3"></i>
                        <span>Cours</span>
                    </a>

                    <a href="utilisateurs.php"
                        class="flex items-center px-4 py-3 bg-blue-600 text-white rounded-lg shadow-lg shadow-blue-600/20">
                        <i class="fas fa-users text-xl mr-3"></i>
                        <span>Gestion des utilisateurs</span>
                    </a>
                </div>

                <div class="mt-4 pt-4 border-t border-blue-700/50">
                    <a href="statistique.php"
                        class="group flex items-center px-4 py-3 text-blue-300 hover:bg-blue-800/50 rounded-lg transition-all duration-200">
                        <i class="fas fa-chart-pie text-xl mr-3"></i>
                        <span>Statistique</span>
                    </a>
                    <a href="avis.php"
                        class="group flex items-center px-4 py-3 text-blue-300 hover:bg-blue-800/50 rounded-lg transition-all duration-200">
                        <i class="fas fa-star text-xl mr-3"></i>
                        <span>Avis</span>
                    </a>
                </div>
            </div>
        </nav>
        <!-- Main Content -->
        <div class="flex-1 flex flex-col max-h-screen overflow-hidden">
            <!-- Top Navbar -->
            <nav class="bg-blue-900/95 backdrop-blur-xl border-b border-blue-700/50">
                <div class="mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-16">
                        <div class="flex items-center flex-1">
                            <button id="sidebarToggle"
                                class="p-2 rounded-lg bg-blue-800 text-white hover:bg-blue-700 md:hidden">
                                <i class="fas fa-bars"></i>
                            </button>
                            <div class="hidden md:block ml-4 flex-1 max-w-xl">
                                <div class="relative">
                                    <input type="search"
                                        class="w-full bg-blue-800 text-white rounded-lg pl-10 pr-4 py-2 border border-blue-700 focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                        placeholder="Search...">
                                    <div class="absolute left-3 top-2.5 text-blue-400">
                                        <i class="fas fa-search"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="relative" id="userDropdown">
                            <button id="dropdownButton"
                                class="flex items-center gap-3 p-2 rounded-lg bg-blue-800 text-white hover:bg-blue-700 transition-colors">
                                <img src="https://ui-avatars.com/api/?name=Admin" class="w-8 h-8 rounded-lg"
                                    alt="Admin avatar">
                                <span>Admin</span>
                                <i class="fas fa-chevron-down text-sm transition-transform duration-200"></i>
                            </button>
                            <div id="dropdownMenu"
                                class="absolute right-0 w-48 mt-2 py-2 bg-blue-900 rounded-lg shadow-xl hidden border border-blue-700/50">
                                <a href="#"
                                    class="flex items-center px-4 py-2 text-blue-300 hover:bg-blue-800 hover:text-white">
                                    <i class="fas fa-user-circle mr-2"></i> Profile
                                </a>

                                <hr class="my-2 border-blue-700">
                                <a href="../../authentification/logout.php"
                                    class="flex items-center px-4 py-2 text-red-400 hover:bg-blue-800 hover:text-red-300">
                                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Main Content Area -->
            <main class="flex-1 overflow-y-auto bg-gradient-to-br from-blue-900 to-blue-800 p-6">
                <!-- Stats Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-6 mb-6">
                    <!-- Total Reservations -->
                    <div
                        class="bg-gradient-to-br from-purple-600 to-indigo-600 rounded-2xl p-6 shadow-lg shadow-purple-600/20">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-white/60 text-sm font-medium">Total Réservations</p>
                                <h3 class="text-3xl font-bold text-white mt-1">0</h3>
                            </div>
                            <div class="bg-white/10 p-3 rounded-xl">
                                <i class="fas fa-calendar-check text-2xl text-white"></i>
                            </div>
                        </div>
                    </div>

                    <!-- En Attente -->
                    <div
                        class="bg-gradient-to-br from-amber-500 to-orange-500 rounded-2xl p-6 shadow-lg shadow-orange-500/20">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-white/60 text-sm font-medium">En Attente</p>
                                <h3 class="text-3xl font-bold text-white mt-1">0</h3>
                            </div>
                            <div class="bg-white/10 p-3 rounded-xl">
                                <i class="fas fa-clock text-2xl text-white"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Approuvées -->
                    <div
                        class="bg-gradient-to-br from-emerald-500 to-green-500 rounded-2xl p-6 shadow-lg shadow-green-500/20">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-white/60 text-sm font-medium">Approuvées</p>
                                <h3 class="text-3xl font-bold text-white mt-1">0</h3>
                            </div>
                            <div class="bg-white/10 p-3 rounded-xl">
                                <i class="fas fa-check text-2xl text-white"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Refusées -->
                    <div
                        class="bg-gradient-to-br from-red-500 to-rose-500 rounded-2xl p-6 shadow-lg shadow-rose-500/20">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-white/60 text-sm font-medium">Refusées</p>
                                <h3 class="text-3xl font-bold text-white mt-1">0</h3>
                            </div>
                            <div class="bg-white/10 p-3 rounded-xl">
                                <i class="fas fa-ban text-2xl text-white"></i>
                            </div>
                        </div>
                    </div>

                    <!-- Terminées -->
                    <div
                        class="bg-gradient-to-br from-blue-500 to-indigo-600 rounded-2xl p-6 shadow-lg shadow-blue-500/20">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-white/60 text-sm font-medium">Terminées</p>
                                <h3 class="text-3xl font-bold text-white mt-1">0</h3>
                            </div>
                            <div class="bg-white/10 p-3 rounded-xl">
                                <i class="fas fa-flag-checkered text-2xl text-white"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Users Management -->
                <div class="bg-white rounded-lg shadow-md">
                    <div class="p-6 border-b border-gray-200">
                        <div
                            class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                            <div>
                                <h1 class="text-2xl font-bold">Gestion des Utilisateurs</h1>
                                <p class="text-gray-600">Gérez les utilisateurs de votre plateforme</p>
                            </div>
                            <button onclick="openAddUserModal()"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                <i class="fas fa-plus mr-2"></i>
                                Ajouter un utilisateur
                            </button>
                        </div>
                    </div>

                    <!-- Filters -->
                    <div class="p-6 border-b border-gray-200 bg-gray-50">
                        <div
                            class="flex flex-col md:flex-row md:items-center md:justify-between space-y-4 md:space-y-0">
                            <div class="flex-1 max-w-md relative">
                                <input type="text" id="searchInput" placeholder="Rechercher par nom, email..."
                                    class="w-full pl-10 pr-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <i
                                    class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                            <div class="flex items-center space-x-4">
                                <select id="statusFilter"
                                    class="px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="">Tous les statuts</option>
                                    <option value="active">Actif</option>
                                    <option value="inactive">Inactif</option>
                                    <option value="blocked">Bloqué</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <!-- Users Table -->
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        <input type="checkbox" id="selectAll" class="rounded border-gray-300">
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Utilisateur
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Rôle
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Statut
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Dernière connexion
                                    </th>
                                    <th
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Actions
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="usersTableBody" class="bg-white divide-y divide-gray-200">
                                <!-- Table rows will be inserted here by JavaScript -->
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center text-gray-600 text-sm">
                                <span>Afficher</span>
                                <select id="perPage"
                                    class="mx-2 rounded-lg border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="10">10</option>
                                    <option value="25">25</option>
                                    <option value="50">50</option>
                                    <option value="100">100</option>
                                </select>
                                <span>entrées par page</span>
                            </div>
                            <div id="pagination" class="flex items-center space-x-2">
                                <!-- Pagination buttons will be inserted here by JavaScript -->
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add User Modal -->
                <div id="addUserModal"
                    class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
                    <div class="bg-white rounded-lg w-full max-w-md p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-bold">Ajouter un utilisateur</h2>
                            <button onclick="closeModal('addUserModal')" class="text-gray-500 hover:text-gray-700">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                        <form id="addUserForm" onsubmit="handleAddUser(event)">
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Nom complet</label>
                                    <input type="text" name="fullName" required
                                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500"
                                        placeholder="John Doe">
                                    <p class="mt-1 text-sm text-gray-500">Entrez le nom complet de l'utilisateur</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Email</label>
                                    <input type="email" name="email" required
                                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500"
                                        placeholder="john.doe@example.com">
                                    <p class="mt-1 text-sm text-gray-500">L'email servira d'identifiant de connexion</p>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Rôle</label>
                                    <select name="role" required
                                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500">
                                        <option value="">Sélectionnez un rôle</option>
                                        <option value="user">Utilisateur</option>
                                        <option value="admin">Administrateur</option>
                                        <option value="moderator">Modérateur</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Statut</label>
                                    <select name="status" required
                                        class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500">
                                        <option value="active">Actif</option>
                                        <option value="inactive">Inactif</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-sm font-medium text-gray-700">Mot de passe</label>
                                    <div class="relative">
                                        <input type="password" name="password" required
                                            class="mt-1 block w-full rounded-lg border-gray-300 shadow-sm focus:ring-2 focus:ring-blue-500"
                                            id="password">
                                        <button type="button"
                                            class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500 hover:text-gray-700"
                                            onclick="togglePasswordVisibility()">
                                            <i class="fas fa-eye" id="togglePassword"></i>
                                        </button>
                                    </div>
                                    <p class="mt-1 text-sm text-gray-500">Minimum 8 caractères, incluant majuscules,
                                        chiffres et
                                        caractères spéciaux</p>
                                </div>
                                <div>
                                    <label class="flex items-center">
                                        <input type="checkbox" name="sendCredentials"
                                            class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                                        <span class="ml-2 text-sm text-gray-600">Envoyer les identifiants par
                                            email</span>
                                    </label>
                                </div>
                            </div>
                            <div class="mt-6 flex justify-end space-x-3">
                                <button type="button" onclick="closeModal('addUserModal')"
                                    class="px-4 py-2 border border-gray-300 rounded-lg text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    Annuler
                                </button>
                                <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">
                                    <i class="fas fa-user-plus mr-2"></i>Ajouter l'utilisateur
                                </button>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Success Modal -->
                <div id="successModal"
                    class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
                    <div class="bg-white rounded-lg w-full max-w-md p-6">
                        <div class="text-center">
                            <div
                                class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100 mb-4">
                                <i class="fas fa-check text-green-600 text-xl"></i>
                            </div>
                            <h3 class="text-lg font-medium text-gray-900 mb-2">Utilisateur ajouté avec succès!</h3>
                            <p class="text-sm text-gray-500 mb-6">L'utilisateur a été créé et notifié par email.</p>
                            <button onclick="closeModal('successModal')"
                                class="w-full px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                                Fermer
                            </button>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script>
        // Data management
        let users = [
            { id: 1, name: 'Jean Dupont', email: 'jean.dupont@example.com', role: 'Admin', status: 'active', lastLogin: '2024-01-19 14:30' },
            { id: 2, name: 'Marie Curie', email: 'marie.curie@example.com', role: 'User', status: 'inactive', lastLogin: '2024-01-18 09:15' },
            { id: 3, name: 'Pierre Martin', email: 'pierre.martin@example.com', role: 'Moderator', status: 'blocked', lastLogin: '2024-01-17 16:45' },
            { id: 4, name: 'Sophie Lambert', email: 'sophie.lambert@example.com', role: 'User', status: 'active', lastLogin: '2024-01-16 12:20' },
            { id: 5, name: 'Lucie Dubois', email: 'lucie.dubois@example.com', role: 'Admin', status: 'active', lastLogin: '2024-01-15 08:45' },
            { id: 6, name: 'Thomas Moreau', email: 'thomas.moreau@example.com', role: 'User', status: 'inactive', lastLogin: '2024-01-14 17:30' },
            { id: 7, name: 'Camille Bernard', email: 'camille.bernard@example.com', role: 'Moderator', status: 'active', lastLogin: '2024-01-13 10:10' },
            { id: 8, name: 'Nicolas Petit', email: 'nicolas.petit@example.com', role: 'User', status: 'blocked', lastLogin: '2024-01-12 14:55' },
            { id: 9, name: 'Laura Durand', email: 'laura.durand@example.com', role: 'Admin', status: 'active', lastLogin: '2024-01-11 09:25' },
            { id: 10, name: 'Alexandre Leroy', email: 'alexandre.leroy@example.com', role: 'User', status: 'inactive', lastLogin: '2024-01-10 16:40' },
            { id: 11, name: 'Julie Morel', email: 'julie.morel@example.com', role: 'Moderator', status: 'active', lastLogin: '2024-01-09 11:15' },
            { id: 12, name: 'Antoine Simon', email: 'antoine.simon@example.com', role: 'User', status: 'blocked', lastLogin: '2024-01-08 13:50' },
            { id: 13, name: 'Céline Laurent', email: 'celine.laurent@example.com', role: 'Admin', status: 'active', lastLogin: '2024-01-07 08:30' },
            { id: 14, name: 'David Michel', email: 'david.michel@example.com', role: 'User', status: 'inactive', lastLogin: '2024-01-06 17:20' },
            { id: 15, name: 'Émilie Lefebvre', email: 'emilie.lefebvre@example.com', role: 'Moderator', status: 'active', lastLogin: '2024-01-05 10:45' },
            { id: 16, name: 'Guillaume Roux', email: 'guillaume.roux@example.com', role: 'User', status: 'blocked', lastLogin: '2024-01-04 14:35' },
            { id: 17, name: 'Sarah Fournier', email: 'sarah.fournier@example.com', role: 'Admin', status: 'active', lastLogin: '2024-01-03 09:10' },
            { id: 18, name: 'Julien Girard', email: 'julien.girard@example.com', role: 'User', status: 'inactive', lastLogin: '2024-01-02 16:25' },
            { id: 19, name: 'Manon Bonnet', email: 'manon.bonnet@example.com', role: 'Moderator', status: 'active', lastLogin: '2024-01-01 11:55' },
            { id: 20, name: 'Maxime Dupuis', email: 'maxime.dupuis@example.com', role: 'User', status: 'blocked', lastLogin: '2023-12-31 13:40' },
            { id: 21, name: 'Chloé Lambert', email: 'chloe.lambert@example.com', role: 'Admin', status: 'active', lastLogin: '2023-12-30 08:20' },
            { id: 22, name: 'Hugo Martinez', email: 'hugo.martinez@example.com', role: 'User', status: 'inactive', lastLogin: '2023-12-29 17:10' },
            { id: 23, name: 'Léa Fontaine', email: 'lea.fontaine@example.com', role: 'Moderator', status: 'active', lastLogin: '2023-12-28 10:35' },
            { id: 24, name: 'Quentin Robin', email: 'quentin.robin@example.com', role: 'User', status: 'blocked', lastLogin: '2023-12-27 14:50' },
            { id: 25, name: 'Clara Gauthier', email: 'clara.gauthier@example.com', role: 'Admin', status: 'active', lastLogin: '2023-12-26 09:05' },
            { id: 26, name: 'Romain Perrot', email: 'romain.perrot@example.com', role: 'User', status: 'inactive', lastLogin: '2023-12-25 16:15' },
            { id: 27, name: 'Inès Chevalier', email: 'ines.chevalier@example.com', role: 'Moderator', status: 'active', lastLogin: '2023-12-24 11:40' },
            { id: 28, name: 'Mathieu Brun', email: 'mathieu.brun@example.com', role: 'User', status: 'blocked', lastLogin: '2023-12-23 13:25' },
            { id: 29, name: 'Lola Garnier', email: 'lola.garnier@example.com', role: 'Admin', status: 'active', lastLogin: '2023-12-22 08:55' },
            { id: 30, name: 'Théo Fernandez', email: 'theo.fernandez@example.com', role: 'User', status: 'inactive', lastLogin: '2023-12-21 17:30' },
            { id: 31, name: 'Zoé Lemoine', email: 'zoe.lemoine@example.com', role: 'Moderator', status: 'active', lastLogin: '2023-12-20 10:50' },
            { id: 32, name: 'Nathan Roussel', email: 'nathan.roussel@example.com', role: 'User', status: 'blocked', lastLogin: '2023-12-19 14:15' },
            { id: 33, name: 'Louise Colin', email: 'louise.colin@example.com', role: 'Admin', status: 'active', lastLogin: '2023-12-18 09:30' },
            { id: 34, name: 'Enzo Arnaud', email: 'enzo.arnaud@example.com', role: 'User', status: 'inactive', lastLogin: '2023-12-17 16:45' },
            { id: 35, name: 'Maëlys Barbier', email: 'maelys.barbier@example.com', role: 'Moderator', status: 'active', lastLogin: '2023-12-16 11:10' },
            { id: 36, name: 'Adam Perrier', email: 'adam.perrier@example.com', role: 'User', status: 'blocked', lastLogin: '2023-12-15 13:55' },
            { id: 37, name: 'Léna Faure', email: 'lena.faure@example.com', role: 'Admin', status: 'active', lastLogin: '2023-12-14 08:40' },
            { id: 38, name: 'Gabriel Marty', email: 'gabriel.marty@example.com', role: 'User', status: 'inactive', lastLogin: '2023-12-13 17:20' },
            { id: 39, name: 'Louna Leclercq', email: 'louna.leclercq@example.com', role: 'Moderator', status: 'active', lastLogin: '2023-12-12 10:35' },
            { id: 40, name: 'Sacha Caron', email: 'sacha.caron@example.com', role: 'User', status: 'blocked', lastLogin: '2023-12-11 14:50' },
            { id: 41, name: 'Alice Vidal', email: 'alice.vidal@example.com', role: 'Admin', status: 'active', lastLogin: '2023-12-10 09:15' },
            { id: 42, name: 'Lucas Roche', email: 'lucas.roche@example.com', role: 'User', status: 'inactive', lastLogin: '2023-12-09 16:30' },
            { id: 43, name: 'Jade Guerin', email: 'jade.guerin@example.com', role: 'Moderator', status: 'active', lastLogin: '2023-12-08 11:55' },
            { id: 44, name: 'Hugo Blanc', email: 'hugo.blanc@example.com', role: 'User', status: 'blocked', lastLogin: '2023-12-07 13:40' },
            { id: 45, name: 'Emma Garnier', email: 'emma.garnier@example.com', role: 'Admin', status: 'active', lastLogin: '2023-12-06 08:25' },
            { id: 46, name: 'Liam Moreau', email: 'liam.moreau@example.com', role: 'User', status: 'inactive', lastLogin: '2023-12-05 17:10' },
            { id: 47, name: 'Chloé Dupont', email: 'chloe.dupont@example.com', role: 'Moderator', status: 'active', lastLogin: '2023-12-04 10:45' },
            { id: 48, name: 'Noah Lambert', email: 'noah.lambert@example.com', role: 'User', status: 'blocked', lastLogin: '2023-12-03 14:20' },
            { id: 49, name: 'Léa Martin', email: 'lea.martin@example.com', role: 'Admin', status: 'active', lastLogin: '2023-12-02 09:05' },
            { id: 50, name: 'Louis Bernard', email: 'louis.bernard@example.com', role: 'User', status: 'inactive', lastLogin: '2023-12-01 16:15' },
            { id: 51, name: 'Emma Petit', email: 'emma.petit@example.com', role: 'Moderator', status: 'active', lastLogin: '2023-11-30 11:40' },
            { id: 52, name: 'Gabriel Durand', email: 'gabriel.durand@example.com', role: 'User', status: 'blocked', lastLogin: '2023-11-29 13:25' },
            { id: 53, name: 'Jade Leroy', email: 'jade.leroy@example.com', role: 'Admin', status: 'active', lastLogin: '2023-11-28 08:50' },
            { id: 54, name: 'Lucas Morel', email: 'lucas.morel@example.com', role: 'User', status: 'inactive', lastLogin: '2023-11-27 17:30' },
            { id: 55, name: 'Léa Simon', email: 'lea.simon@example.com', role: 'Moderator', status: 'active', lastLogin: '2023-11-26 10:55' },
            { id: 56, name: 'Hugo Laurent', email: 'hugo.laurent@example.com', role: 'User', status: 'blocked', lastLogin: '2023-11-25 14:10' },
            { id: 57, name: 'Chloé Michel', email: 'chloe.michel@example.com', role: 'Admin', status: 'active', lastLogin: '2023-11-24 09:35' },
            { id: 58, name: 'Liam Lefebvre', email: 'liam.lefebvre@example.com', role: 'User', status: 'inactive', lastLogin: '2023-11-23 16:20' },
            { id: 59, name: 'Emma Roux', email: 'emma.roux@example.com', role: 'Moderator', status: 'active', lastLogin: '2023-11-22 11:45' },
            { id: 60, name: 'Noah Fournier', email: 'noah.fournier@example.com', role: 'User', status: 'blocked', lastLogin: '2023-11-21 13:30' },
            { id: 61, name: 'Léa Girard', email: 'lea.girard@example.com', role: 'Admin', status: 'active', lastLogin: '2023-11-20 08:55' },
            { id: 62, name: 'Louis Bonnet', email: 'louis.bonnet@example.com', role: 'User', status: 'inactive', lastLogin: '2023-11-19 17:10' },
            { id: 63, name: 'Jade Dupuis', email: 'jade.dupuis@example.com', role: 'Moderator', status: 'active', lastLogin: '2023-11-18 10:35' },
            { id: 64, name: 'Gabriel Lambert', email: 'gabriel.lambert@example.com', role: 'User', status: 'blocked', lastLogin: '2023-11-17 14:50' },
            { id: 65, name: 'Emma Martinez', email: 'emma.martinez@example.com', role: 'Admin', status: 'active', lastLogin: '2023-11-16 09:15' },
            { id: 66, name: 'Lucas Fontaine', email: 'lucas.fontaine@example.com', role: 'User', status: 'inactive', lastLogin: '2023-11-15 16:30' },
            { id: 67, name: 'Léa Robin', email: 'lea.robin@example.com', role: 'Moderator', status: 'active', lastLogin: '2023-11-14 11:55' },
            { id: 68, name: 'Hugo Gauthier', email: 'hugo.gauthier@example.com', role: 'User', status: 'blocked', lastLogin: '2023-11-13 13:40' },
            { id: 69, name: 'Chloé Perrot', email: 'chloe.perrot@example.com', role: 'Admin', status: 'active', lastLogin: '2023-11-12 08:25' },
            { id: 70, name: 'Liam Chevalier', email: 'liam.chevalier@example.com', role: 'User', status: 'inactive', lastLogin: '2023-11-11 17:10' },
            { id: 71, name: 'Emma Brun', email: 'emma.brun@example.com', role: 'Moderator', status: 'active', lastLogin: '2023-11-10 10:45' },
            { id: 72, name: 'Noah Garnier', email: 'noah.garnier@example.com', role: 'User', status: 'blocked', lastLogin: '2023-11-09 14:20' },
            { id: 73, name: 'Léa Fernandez', email: 'lea.fernandez@example.com', role: 'Admin', status: 'active', lastLogin: '2023-11-08 09:05' },
            { id: 74, name: 'Louis Lemoine', email: 'louis.lemoine@example.com', role: 'User', status: 'inactive', lastLogin: '2023-11-07 16:15' },
            { id: 75, name: 'Jade Roussel', email: 'jade.roussel@example.com', role: 'Moderator', status: 'active', lastLogin: '2023-11-06 11:40' },
            { id: 76, name: 'Gabriel Colin', email: 'gabriel.colin@example.com', role: 'User', status: 'blocked', lastLogin: '2023-11-05 13:25' },
            { id: 77, name: 'Emma Arnaud', email: 'emma.arnaud@example.com', role: 'Admin', status: 'active', lastLogin: '2023-11-04 08:50' },
            { id: 78, name: 'Lucas Barbier', email: 'lucas.barbier@example.com', role: 'User', status: 'inactive', lastLogin: '2023-11-03 17:30' },
            { id: 79, name: 'Léa Perrier', email: 'lea.perrier@example.com', role: 'Moderator', status: 'active', lastLogin: '2023-11-02 10:55' },
            { id: 80, name: 'Hugo Faure', email: 'hugo.faure@example.com', role: 'User', status: 'blocked', lastLogin: '2023-11-01 14:10' },
            { id: 81, name: 'Chloé Marty', email: 'chloe.marty@example.com', role: 'Admin', status: 'active', lastLogin: '2023-10-31 09:35' },
            { id: 82, name: 'Liam Leclercq', email: 'liam.leclercq@example.com', role: 'User', status: 'inactive', lastLogin: '2023-10-30 16:20' },
            { id: 83, name: 'Emma Caron', email: 'emma.caron@example.com', role: 'Moderator', status: 'active', lastLogin: '2023-10-29 11:45' },
            { id: 84, name: 'Noah Vidal', email: 'noah.vidal@example.com', role: 'User', status: 'blocked', lastLogin: '2023-10-28 13:30' },
            { id: 85, name: 'Léa Roche', email: 'lea.roche@example.com', role: 'Admin', status: 'active', lastLogin: '2023-10-27 08:55' },
            { id: 86, name: 'Louis Guerin', email: 'louis.guerin@example.com', role: 'User', status: 'inactive', lastLogin: '2023-10-26 17:10' },
            { id: 87, name: 'Jade Blanc', email: 'jade.blanc@example.com', role: 'Moderator', status: 'active', lastLogin: '2023-10-25 10:35' },
            { id: 88, name: 'Gabriel Garnier', email: 'gabriel.garnier@example.com', role: 'User', status: 'blocked', lastLogin: '2023-10-24 14:50' },
            { id: 89, name: 'Emma Moreau', email: 'emma.moreau@example.com', role: 'Admin', status: 'active', lastLogin: '2023-10-23 09:15' },
            { id: 90, name: 'Lucas Dupont', email: 'lucas.dupont@example.com', role: 'User', status: 'inactive', lastLogin: '2023-10-22 16:30' },
            { id: 91, name: 'Léa Lambert', email: 'lea.lambert@example.com', role: 'Moderator', status: 'active', lastLogin: '2023-10-21 11:55' },
            { id: 92, name: 'Hugo Martin', email: 'hugo.martin@example.com', role: 'User', status: 'blocked', lastLogin: '2023-10-20 13:40' },
            { id: 93, name: 'Chloé Bernard', email: 'chloe.bernard@example.com', role: 'Admin', status: 'active', lastLogin: '2023-10-19 08:25' },
            { id: 94, name: 'Liam Petit', email: 'liam.petit@example.com', role: 'User', status: 'inactive', lastLogin: '2023-10-18 17:10' },
            { id: 95, name: 'Emma Durand', email: 'emma.durand@example.com', role: 'Moderator', status: 'active', lastLogin: '2023-10-17 10:45' },
            { id: 96, name: 'Noah Leroy', email: 'noah.leroy@example.com', role: 'User', status: 'blocked', lastLogin: '2023-10-16 14:20' },
            { id: 97, name: 'Léa Morel', email: 'lea.morel@example.com', role: 'Admin', status: 'active', lastLogin: '2023-10-15 09:05' },
            { id: 98, name: 'Louis Simon', email: 'louis.simon@example.com', role: 'User', status: 'inactive', lastLogin: '2023-10-14 16:15' },
            { id: 99, name: 'Jade Laurent', email: 'jade.laurent@example.com', role: 'Moderator', status: 'active', lastLogin: '2023-10-13 11:40' },
            { id: 100, name: 'Gabriel Michel', email: 'gabriel.michel@example.com', role: 'User', status: 'blocked', lastLogin: '2023-10-12 13:25' }
        ];

        // Pagination state
        let currentPage = 1;
        let itemsPerPage = 10;
        let filteredUsers = [...users];

        // Initialize the dashboard
        document.addEventListener('DOMContentLoaded', function () {
            initializeEventListeners();
            updateTable();
            setupResponsiveBehavior();
        });

        // Event listeners setup
        function initializeEventListeners() {
            // Search input
            document.getElementById('searchInput').addEventListener('input', (e) => {
                const searchTerm = e.target.value.toLowerCase();
                filteredUsers = users.filter(user =>
                    user.name.toLowerCase().includes(searchTerm) ||
                    user.email.toLowerCase().includes(searchTerm)
                );
                currentPage = 1;
                updateTable();
            });

            // Status filter
            document.getElementById('statusFilter').addEventListener('change', (e) => {
                const status = e.target.value;
                filteredUsers = status ? users.filter(user => user.status === status) : [...users];
                currentPage = 1;
                updateTable();
            });

            // Items per page
            document.getElementById('perPage').addEventListener('change', (e) => {
                itemsPerPage = parseInt(e.target.value);
                currentPage = 1;
                updateTable();
            });

            // Password input
            const passwordInput = document.getElementById('password');
            if (passwordInput) {
                passwordInput.addEventListener('input', (e) => checkPasswordStrength(e.target.value));
            }
        }

        let selectedUserIds = []; // Tableau pour stocker les IDs des utilisateurs sélectionnés
        function attachCheckboxListeners() {
            const checkboxes = document.querySelectorAll('.user-checkbox');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function (event) {
                    const userId = event.target.dataset.userId;

                    if (event.target.checked) {
                        // Ajouter l'ID à l'état global
                        if (!selectedUserIds.includes(userId)) {
                            selectedUserIds.push(userId);
                        }
                    } else {
                        // Retirer l'ID de l'état global
                        selectedUserIds = selectedUserIds.filter(id => id !== userId);
                    }

                    console.log('Utilisateurs sélectionnés :', selectedUserIds);
                });

                // Synchroniser la case à cocher avec l'état global
                checkbox.checked = selectedUserIds.includes(checkbox.dataset.userId);
            });

            // Gestionnaire pour "Tout sélectionner"
            const selectAllCheckbox = document.getElementById('selectAll');
            if (selectAllCheckbox) {
                selectAllCheckbox.addEventListener('change', function (event) {
                    const isChecked = event.target.checked;

                    if (isChecked) {
                        // Ajouter tous les IDs des utilisateurs à l'état global
                        filteredUsers.forEach(user => {
                            if (!selectedUserIds.includes(user.id)) {
                                selectedUserIds.push(user.id);
                            }
                        });
                    } else {
                        // Vider l'état global
                        selectedUserIds = [];
                    }

                    // Mettre à jour les cases à cocher visibles
                    checkboxes.forEach(checkbox => {
                        checkbox.checked = isChecked;
                    });

                    console.log('Utilisateurs sélectionnés :', selectedUserIds);
                });
            }
        }

        function attachCheckboxListeners() {
            const checkboxes = document.querySelectorAll('.user-checkbox');

            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function (event) {
                    const userId = event.target.dataset.userId;

                    if (event.target.checked) {
                        if (!selectedUserIds.includes(userId)) {
                            selectedUserIds.push(userId);
                        }
                    } else {
                        selectedUserIds = selectedUserIds.filter(id => id !== userId);
                    }

                    console.log('Utilisateurs sélectionnés :', selectedUserIds);

                    // Mettre à jour l'état de "Tout sélectionner"
                    updateSelectAllCheckbox();
                });

                // Synchroniser la case à cocher avec l'état global
                checkbox.checked = selectedUserIds.includes(checkbox.dataset.userId);
            });

            // Gestionnaire pour "Tout sélectionner"
            const selectAllCheckbox = document.getElementById('selectAll');
            if (selectAllCheckbox) {
                selectAllCheckbox.addEventListener('change', function (event) {
                    const isChecked = event.target.checked;

                    if (isChecked) {
                        // Ajouter tous les IDs des utilisateurs à l'état global
                        filteredUsers.forEach(user => {
                            if (!selectedUserIds.includes(user.id)) {
                                selectedUserIds.push(user.id);
                            }
                        });
                    } else {
                        // Vider l'état global
                        selectedUserIds = [];
                    }

                    // Mettre à jour les cases à cocher visibles
                    checkboxes.forEach(checkbox => {
                        checkbox.checked = isChecked;
                    });

                    console.log('Utilisateurs sélectionnés :', selectedUserIds);
                });
            }
        }

        function updateSelectAllCheckbox() {
            const selectAllCheckbox = document.getElementById('selectAll');
            if (selectAllCheckbox) {
                // Cochez "Tout sélectionner" uniquement si tous les utilisateurs sont sélectionnés
                selectAllCheckbox.checked = filteredUsers.every(user => selectedUserIds.includes(user.id));
            }
        }

        // Table update function
        function updateTable() {
            const tableBody = document.getElementById('usersTableBody');
            const start = (currentPage - 1) * itemsPerPage;
            const end = start + itemsPerPage;
            const paginatedUsers = filteredUsers.slice(start, end);

            tableBody.innerHTML = paginatedUsers.map(user => `
                <tr class="hover:bg-gray-50">
                    <td class="px-6 py-4">
                        <input type="checkbox" class="rounded border-gray-300 user-checkbox" data-user-id="${user.id}">
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <img src="/api/placeholder/40/40" class="h-10 w-10 rounded-full" alt="${user.name}">
                            <div>
                                <div class="font-medium">${user.name}</div>
                                <div class="text-sm text-gray-500">${user.email}</div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-sm rounded-full ${getRoleBadgeClass(user.role)}">
                            ${user.role}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="px-2 py-1 text-sm rounded-full ${getStatusBadgeClass(user.status)}">
                            ${capitalizeFirstLetter(user.status)}
                        </span>
                    </td>
                    <td class="px-6 py-4 text-sm text-gray-500">
                        ${formatDate(user.lastLogin)}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <button onclick="editUser(${user.id})" class="text-blue-600 hover:text-blue-800">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="toggleUserStatus(${user.id})" class="text-yellow-600 hover:text-yellow-800">
                                <i class="fas fa-ban"></i>
                            </button>
                            <button onclick="deleteUser(${user.id})" class="text-red-600 hover:text-red-800">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </td>
                </tr>
            `).join('');
            updatePagination();
            attachCheckboxListeners();
        }



        // Pagination update
        function updatePagination() {
            const totalPages = Math.ceil(filteredUsers.length / itemsPerPage);
            const pagination = document.getElementById('pagination');
            let paginationHTML = '';

            // Previous button
            paginationHTML += `
                <button onclick="changePage(${currentPage - 1})" 
                        class="px-3 py-1 rounded-md ${currentPage === 1 ? 'text-gray-400 cursor-not-allowed' : 'text-gray-600 hover:bg-gray-100'}"
                        ${currentPage === 1 ? 'disabled' : ''}>
                    <i class="fas fa-chevron-left"></i>
                </button>
            `;

            // Page numbers
            for (let i = 1; i <= totalPages; i++) {
                if (i === 1 || i === totalPages || (i >= currentPage - 1 && i <= currentPage + 1)) {
                    paginationHTML += `
                        <button onclick="changePage(${i})" 
                                class="px-3 py-1 rounded-md ${currentPage === i ? 'bg-blue-600 text-white' : 'text-gray-600 hover:bg-gray-100'}">
                            ${i}
                        </button>
                    `;
                } else if (i === currentPage - 2 || i === currentPage + 2) {
                    paginationHTML += `<span class="px-2">...</span>`;
                }
            }

            // Next button
            paginationHTML += `
                <button onclick="changePage(${currentPage + 1})" 
                        class="px-3 py-1 rounded-md ${currentPage === totalPages ? 'text-gray-400 cursor-not-allowed' : 'text-gray-600 hover:bg-gray-100'}"
                        ${currentPage === totalPages ? 'disabled' : ''}>
                    <i class="fas fa-chevron-right"></i>
                </button>
            `;

            pagination.innerHTML = paginationHTML;
        }

        // Utility functions
        function getRoleBadgeClass(role) {
            const classes = {
                'Admin': 'bg-purple-100 text-purple-800',
                'Moderator': 'bg-blue-100 text-blue-800',
                'User': 'bg-gray-100 text-gray-800'
            };
            return classes[role] || 'bg-gray-100 text-gray-800';
        }

        function getStatusBadgeClass(status) {
            const classes = {
                'active': 'bg-green-100 text-green-800',
                'inactive': 'bg-yellow-100 text-yellow-800',
                'blocked': 'bg-red-100 text-red-800'
            };
            return classes[status] || 'bg-gray-100 text-gray-800';
        }

        function capitalizeFirstLetter(string) {
            return string.charAt(0).toUpperCase() + string.slice(1);
        }

        function formatDate(dateString) {
            return new Date(dateString).toLocaleString('fr-FR', {
                year: 'numeric',
                month: 'short',
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit'
            });
        }

        // User management functions
        function editUser(userId) {
            const user = users.find(u => u.id === userId);
            // Implement edit user logic
            console.log('Editing user:', user);
        }

        function toggleUserStatus(userId) {
            const userIndex = users.findIndex(u => u.id === userId);
            if (userIndex !== -1) {
                const newStatus = users[userIndex].status === 'active' ? 'blocked' : 'active';
                users[userIndex].status = newStatus;
                updateTable();
            }
        }

        function deleteUser(userId) {
            if (confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?')) {
                users = users.filter(u => u.id !== userId);
                filteredUsers = filteredUsers.filter(u => u.id !== userId);
                updateTable();
            }
        }

        function changePage(page) {
            const totalPages = Math.ceil(filteredUsers.length / itemsPerPage);
            if (page >= 1 && page <= totalPages) {
                currentPage = page;
                updateTable();
            }
        }

        // Modal management functions
        function openAddUserModal() {
            openModal('addUserModal');
        }

        function openModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
            const firstInput = modal.querySelector('input:not([type="hidden"])');
            if (firstInput) firstInput.focus();
        }

        function closeModal(modalId) {
            const modal = document.getElementById(modalId);
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
            if (modalId === 'addUserModal') {
                document.getElementById('addUserForm').reset();
                resetPasswordStrength();
            }
        }

        // Password visibility toggle
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('togglePassword');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('fa-eye');
                toggleIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('fa-eye-slash');
                toggleIcon.classList.add('fa-eye');
            }
        }

        // Password strength checker
        function checkPasswordStrength(password) {
            const lengthCheck = document.getElementById('lengthCheck');
            const upperCheck = document.getElementById('upperCheck');
            const numberCheck = document.getElementById('numberCheck');
            const specialCheck = document.getElementById('specialCheck');
            const strengthBar = document.getElementById('passwordStrengthBar');
            const strengthText = document.getElementById('passwordStrengthText');

            // Reset all checks
            [lengthCheck, upperCheck, numberCheck, specialCheck].forEach(check => {
                check.classList.remove('text-green-500', 'text-red-500');
                check.classList.add('text-gray-300');
            });

            if (!password) {
                strengthBar.style.width = '0%';
                strengthBar.classList.remove('bg-red-500', 'bg-yellow-500', 'bg-green-500');
                strengthBar.classList.add('bg-gray-400');
                strengthText.textContent = 'Force du mot de passe';
                strengthText.classList.remove('text-red-500', 'text-yellow-500', 'text-green-500');
                return;
            }

            // Check criteria
            const hasLength = password.length >= 8;
            const hasUpper = /[A-Z]/.test(password);
            const hasNumber = /\d/.test(password);
            const hasSpecial = /[!@#$%^&*(),.?":{}|<>]/.test(password);

            // Update check icons
            if (hasLength) lengthCheck.classList.add('text-green-500');
            if (hasUpper) upperCheck.classList.add('text-green-500');
            if (hasNumber) numberCheck.classList.add('text-green-500');
            if (hasSpecial) specialCheck.classList.add('text-green-500');

            // Calculate strength
            const strength = [hasLength, hasUpper, hasNumber, hasSpecial].filter(Boolean).length;
            let width = (strength / 4) * 100;

            // Update strength bar
            strengthBar.style.width = `${width}%`;
            strengthBar.classList.remove('bg-red-500', 'bg-yellow-500', 'bg-green-500');

            if (strength <= 2) {
                strengthBar.classList.add('bg-red-500');
                strengthText.textContent = 'Faible';
                strengthText.classList.add('text-red-500');
            } else if (strength === 3) {
                strengthBar.classList.add('bg-yellow-500');
                strengthText.textContent = 'Moyen';
                strengthText.classList.add('text-yellow-500');
            } else {
                strengthBar.classList.add('bg-green-500');
                strengthText.textContent = 'Fort';
                strengthText.classList.add('text-green-500');
            }
        }

        function resetPasswordStrength() {
            checkPasswordStrength('');
        }

        // Form submission handler
        function handleAddUser(event) {
            event.preventDefault();

            // Get form data
            const form = event.target;
            const formData = new FormData(form);

            // Validate password
            const password = formData.get('password');
            if (!isPasswordValid(password)) {
                showNotification('Le mot de passe ne respecte pas les critères de sécurité', 'error');
                return;
            }

            // Create user object
            const user = {
                id: Date.now(),
                name: formData.get('fullName'),
                email: formData.get('email'),
                role: formData.get('role'),
                status: formData.get('status'),
                lastLogin: '-',
                createdAt: new Date().toISOString()
            };

            // Add user to the list
            users.push(user);
            filteredUsers = [...users];

            // Show success notification
            showNotification(`L'utilisateur ${user.name} a été créé avec succès`, 'success');

            // Send credentials by email if requested
            if (formData.get('sendCredentials')) {
                sendCredentialsByEmail(user.email, password);
            }

            // Close modal and reset form
            closeModal('addUserModal');

            // Update table
            updateTable();
        }

        // Password validation
        function isPasswordValid(password) {
            const minLength = password.length >= 8;
            const hasUpper = /[A-Z]/.test(password);
            const hasNumber = /\d/.test(password);
            const hasSpecial = /[!@#$%^&*(),.?":{}|<>]/.test(password);

            return minLength && hasUpper && hasNumber && hasSpecial;
        }

        // Notification system
        function showNotification(message, type = 'success') {
            // Remove existing notifications
            const existingNotifications = document.querySelectorAll('.notification');
            existingNotifications.forEach(notification => notification.remove());

            // Create notification element
            const notification = document.createElement('div');
            notification.className = `notification fixed top-4 right-4 p-4 rounded-lg shadow-lg transform transition-all duration-300 translate-x-full z-50 ${type === 'success' ? 'bg-green-100 text-green-800 border border-green-200' :
                type === 'error' ? 'bg-red-100 text-red-800 border border-red-200' :
                    'bg-blue-100 text-blue-800 border border-blue-200'
                }`;

            // Add icon based on type
            const icon = type === 'success' ? 'check-circle' :
                type === 'error' ? 'exclamation-circle' :
                    'information-circle';

            notification.innerHTML = `
        <div class="flex items-center space-x-3">
            <i class="fas fa-${icon}"></i>
            <p class="flex-1">${message}</p>
            <button onclick="this.parentElement.parentElement.remove()" class="text-gray-500 hover:text-gray-700">
                <i class="fas fa-times"></i>
            </button>
        </div>
    `;

            // Add to document
            document.body.appendChild(notification);

            // Animate in
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);

            // Remove after 5 seconds
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    notification.remove();
                }, 300);
            }, 5000);
        }

        // Email simulation
        function sendCredentialsByEmail(email, password) {
            console.log(`Simulation: Envoi des identifiants à ${email}`);
            // Dans un vrai projet, ceci serait géré par le backend
        }

        // Responsive behavior
        function setupResponsiveBehavior() {
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.getElementById('main-content');

            function toggleSidebar() {
                sidebar.classList.toggle('-translate-x-full');
                mainContent.classList.toggle('lg:ml-0');
            }

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', (e) => {
                if (window.innerWidth < 1024 && !sidebar.contains(e.target) && !e.target.closest('[onclick="toggleSidebar()"]')) {
                    sidebar.classList.add('-translate-x-full');
                }
            });

            // Reset sidebar state on window resize
            window.addEventListener('resize', () => {
                if (window.innerWidth >= 1024) {
                    sidebar.classList.remove('-translate-x-full');
                    mainContent.classList.add('lg:ml-64');
                }
            });
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Get DOM elements
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const content = document.querySelector('.flex-1');

            // Toggle sidebar on mobile
            if (sidebarToggle) {
                sidebarToggle.addEventListener('click', (e) => {
                    e.stopPropagation();
                    sidebar.classList.toggle('-translate-x-full');
                });
            }

            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', (e) => {
                if (window.innerWidth < 768 &&
                    !sidebar.contains(e.target) &&
                    !sidebarToggle.contains(e.target)) {
                    sidebar.classList.add('-translate-x-full');
                }
            });

            // Handle resize events
            let resizeTimeout;
            window.addEventListener('resize', () => {
                clearTimeout(resizeTimeout);
                resizeTimeout = setTimeout(() => {
                    if (window.innerWidth >= 768) {
                        sidebar.classList.remove('-translate-x-full');
                    }
                }, 250);
            });
        });
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const dropdownButton = document.getElementById('dropdownButton');
            const dropdownMenu = document.getElementById('dropdownMenu');
            const chevronIcon = dropdownButton.querySelector('.fa-chevron-down');
            let isOpen = false;

            // Function to toggle dropdown
            const toggleDropdown = () => {
                isOpen = !isOpen;
                dropdownMenu.classList.toggle('hidden');
                chevronIcon.style.transform = isOpen ? 'rotate(180deg)' : 'rotate(0)';
            };

            // Toggle on button click
            dropdownButton.addEventListener('click', (e) => {
                e.stopPropagation();
                toggleDropdown();
            });

            // Close when clicking outside
            document.addEventListener('click', (e) => {
                if (!dropdownButton.contains(e.target) && !dropdownMenu.contains(e.target)) {
                    isOpen = false;
                    dropdownMenu.classList.add('hidden');
                    chevronIcon.style.transform = 'rotate(0)';
                }
            });

            // Close on escape key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && !dropdownMenu.classList.contains('hidden')) {
                    isOpen = false;
                    dropdownMenu.classList.add('hidden');
                    chevronIcon.style.transform = 'rotate(0)';
                }
            });

            // Prevent menu from closing when clicking inside it
            dropdownMenu.addEventListener('click', (e) => {
                e.stopPropagation();
            });
        });
    </script>
</body>

</html>