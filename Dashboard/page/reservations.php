<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive-Loc Dashboard</title>
    <link rel="stylesheet" href="../../src/output.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- Add DataTables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.11.5/css/dataTables.tailwind.min.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.tailwind.min.css">
    <!-- Add Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-dark text-gray-100">
    <div class="flex flex-col md:flex-row min-h-screen">
        <!-- Sidebar - avec toggle pour mobile -->
        <nav id="sidebar"
            class="transform -translate-x-full md:translate-x-0 fixed md:relative w-64 min-h-screen bg-dark-light backdrop-blur-xl bg-opacity-80 border-r border-gray-800 transition-transform duration-300 ease-in-out z-50">
            <div class="p-5 bg-gradient-to-r from-purple-600 to-blue-600">
                <a href="../index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                    <div class="relative group">
                        <div
                            class="absolute -inset-1 bg-gradient-to-r from-gray-600 to-gray-400 rounded-[2rem] blur opacity-25 group-hover:opacity-50 transition duration-1000 group-hover:duration-200">
                        </div>
                        <img src="../img/logo.png" alt="logo"
                            class="rounded-lg shadow-2xl transform group-hover:scale-[1.02] transition-all duration-500 relative">
                    </div>
                </a>
            </div>
            <ul class="py-5">
                <li class="hover:bg-gray-700">
                    <a href="../index.php" class="flex items-center px-6 py-3 text-gray-300 hover:text-white">
                        <i class="fas fa-chart-line mr-3"></i> Dashboard
                    </a>
                </li>
                <li class="bg-dark/50 border-l-4 border-purple-600">
                    <a href="reservations.php" class="flex items-center px-6 py-3 text-gray-300 hover:text-white">
                        <i class="fas fa-calendar-alt mr-3"></i> Reservations
                    </a>
                </li>
                <li class="hover:bg-gray-700">
                    <a href="categories.php" class="flex items-center px-6 py-3 text-gray-300 hover:text-white">
                        <i class="fas fa-tags mr-3"></i> Categories
                    </a>
                </li>
                <li class="hover:bg-gray-700">
                    <a href="vehicules.php" class="flex items-center px-6 py-3 text-gray-300 hover:text-white">
                        <i class="fas fa-car-side mr-3"></i> Vehicles
                    </a>
                </li>
                <li class="hover:bg-gray-700">
                    <a href="statistiques.php" class="flex items-center px-6 py-3 text-gray-300 hover:text-white">
                        <i class="fas fa-chart-bar mr-3"></i> Statistiques
                    </a>
                </li>
                <li class="hover:bg-gray-700">
                    <a href="users.php" class="flex items-center px-6 py-3 text-gray-300 hover:text-white">
                        <i class="fas fa-users mr-3"></i> Utilisateurs
                    </a>
                </li>
                <li class="hover:bg-gray-700">
                    <a href="reviews.php" class="flex items-center px-6 py-3 text-gray-300 hover:text-white">
                        <i class="fas fa-star mr-3"></i> Reviews
                    </a>
                </li>
                <li class="hover:bg-gray-700">
                    <a href="admins.php" class="flex items-center px-6 py-3 text-gray-300 hover:text-white">
                        <i class="fas fa-user-shield mr-3"></i> Settings
                    </a>
                </li>
            </ul>
        </nav>

        <!-- Main Content -->
        <div class="flex-1 max-h-screen overflow-y-auto custom-scrollbar">
            <!-- Top Navbar -->
            <nav class="bg-dark-light backdrop-blur-xl bg-opacity-80 shadow-lg border-b border-gray-800 p-4">
                <div class="flex justify-between items-center">
                    <div class="flex items-center flex-1">
                        <button id="sidebarToggle" class="p-2 rounded-md bg-gray-800 text-white mr-4 md:hidden">
                            <i class="fas fa-bars"></i>
                        </button>
                        <div class="relative flex-1 max-w-xl hidden md:block">
                            <input type="search"
                                class="w-full pl-10 pr-4 py-2 rounded-lg border focus:outline-none focus:border-blue-500"
                                placeholder="Search...">
                            <div class="absolute left-3 top-2 text-gray-400">
                                <i class="fas fa-search"></i>
                            </div>
                        </div>
                    </div>
                    <div class="flex items-center space-x-4">
                        <button class="p-2 text-gray-400 hover:text-gray-600">
                            <i class="fas fa-bell"></i>
                        </button>
                        <div class="relative group">
                            <button class="flex items-center space-x-2 p-2 rounded-md bg-gray-800 text-white">
                                <img src="https://ui-avatars.com/api/?name=Admin" class="w-8 h-8 rounded-full">
                                <span>Admin</span>
                            </button>
                            <div
                                class="absolute right-0 w-48 mt-2 py-2 bg-white rounded-md shadow-xl hidden group-hover:block z-50">
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100"><i
                                        class="fas fa-user-circle mr-2"></i> Profile</a>
                                <a href="#" class="block px-4 py-2 text-gray-800 hover:bg-gray-100"><i
                                        class="fas fa-cog mr-2"></i> Settings</a>
                                <hr class="my-2">
                                <a href="#" class="block px-4 py-2 text-red-600 hover:bg-gray-100"><i
                                        class="fas fa-sign-out-alt mr-2"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- Dashboard Content -->
            <div class="p-4 md:p-6">
                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <div class="bg-gradient-to-r from-purple-600 to-purple-800 rounded-xl p-4">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-white/60">Réservations totales</p>
                                <h3 class="text-2xl font-bold">1,234</h3>
                            </div>
                            <div class="text-white/80">
                                <i class="fas fa-calendar-check text-3xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 text-white/60 text-sm">
                            <span class="text-green-400"><i class="fas fa-arrow-up"></i> +15%</span> vs mois dernier
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-purple-600 to-purple-800 rounded-xl p-4">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-white/60">Réservations totales</p>
                                <h3 class="text-2xl font-bold">1,234</h3>
                            </div>
                            <div class="text-white/80">
                                <i class="fas fa-calendar-check text-3xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 text-white/60 text-sm">
                            <span class="text-green-400"><i class="fas fa-arrow-up"></i> +15%</span> vs mois dernier
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-purple-600 to-purple-800 rounded-xl p-4">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-white/60">Réservations totales</p>
                                <h3 class="text-2xl font-bold">1,234</h3>
                            </div>
                            <div class="text-white/80">
                                <i class="fas fa-calendar-check text-3xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 text-white/60 text-sm">
                            <span class="text-green-400"><i class="fas fa-arrow-up"></i> +15%</span> vs mois dernier
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-purple-600 to-purple-800 rounded-xl p-4">
                        <div class="flex justify-between">
                            <div>
                                <p class="text-white/60">Réservations totales</p>
                                <h3 class="text-2xl font-bold">1,234</h3>
                            </div>
                            <div class="text-white/80">
                                <i class="fas fa-calendar-check text-3xl"></i>
                            </div>
                        </div>
                        <div class="mt-4 text-white/60 text-sm">
                            <span class="text-green-400"><i class="fas fa-arrow-up"></i> +15%</span> vs mois dernier
                        </div>
                    </div>
                    <!-- Similar cards for other stats -->
                </div>

                <!-- Filters Section -->
                <div class="bg-dark-light rounded-xl p-6 mb-6">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-400 mb-2">Statut</label>
                            <select class="w-full bg-gray-800 text-white rounded-lg px-4 py-2 focus:ring-2 focus:ring-purple-600">
                                <option value="">Tous les statuts</option>
                                <option value="en_attente">En attente</option>
                                <option value="confirme">Confirmé</option>
                                <option value="en_cours">En cours</option>
                                <option value="termine">Terminé</option>
                                <option value="annule">Annulé</option>
                            </select>
                        </div>
                        <!-- Add more filters -->
                    </div>
                </div>

                <!-- Reservations Grid -->
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                    <?php for ($i = 0; $i < 9; $i++): ?>
                    <div class="bg-dark-light rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300">
                        <div class="relative">
                            <!-- Add ribbon for urgent/special status -->
                            <?php if ($i % 3 === 0): ?>
                            <div class="absolute top-4 left-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm">
                                Urgent
                            </div>
                            <?php endif; ?>
                            
                            <!-- Vehicle Image -->
                            <img src="../img/herocar.jpg" class="w-full h-48 object-cover" alt="Vehicle">
                            
                            <!-- Status Badge -->
                            <div class="absolute top-4 right-4">
                                <?php
                                $status_classes = [
                                    'en_attente' => 'bg-yellow-500',
                                    'approuve' => 'bg-green-500',
                                    'refuse' => 'bg-red-500',
                                    'termine' => 'bg-blue-500'
                                ];
                                $status = array_rand($status_classes);
                                ?>
                                <span class="<?php echo $status_classes[$status]; ?> text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    <?php echo ucfirst($status); ?>
                                </span>
                            </div>
                        </div>

                        <!-- Card Content -->
                        <div class="p-6">
                            <!-- Header -->
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-xl font-bold mb-2">Réservation #<?php echo $i + 1000; ?></h3>
                                    <p class="text-gray-400">BMW M3 Competition</p>
                                </div>
                                <div class="text-right">
                                    <p class="text-lg font-bold">450€</p>
                                    <p class="text-sm text-gray-400">3 jours</p>
                                </div>
                            </div>

                            <!-- Customer Info -->
                            <div class="flex items-center mb-4">
                                <img src="https://ui-avatars.com/api/?name=John+Doe" class="w-10 h-10 rounded-full mr-3">
                                <div>
                                    <p class="font-semibold">John Doe</p>
                                    <p class="text-sm text-gray-400">john.doe@example.com</p>
                                </div>
                            </div>

                            <!-- Additional Details -->
                            <div class="space-y-2 mb-4 text-sm text-gray-400">
                                <div class="flex items-center">
                                    <i class="fas fa-clock w-5"></i>
                                    <span>Durée: 3 jours</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-map-marker-alt w-5"></i>
                                    <span>Lieu de prise: Paris</span>
                                </div>
                                <div class="flex items-center">
                                    <i class="fas fa-credit-card w-5"></i>
                                    <span>Paiement: Carte bancaire</span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="grid grid-cols-2 gap-2 pt-4 border-t border-gray-700">
                                <button onclick="showReservationDetails(<?php echo $i; ?>)" class="flex items-center justify-center px-4 py-2 bg-purple-600 hover:bg-purple-700 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-eye mr-2"></i> Détails
                                </button>
                                <button class="flex items-center justify-center px-4 py-2 bg-gray-600 hover:bg-gray-700 rounded-lg transition-colors duration-200">
                                    <i class="fas fa-edit mr-2"></i> Modifier
                                </button>
                            </div>
                        </div>
                    </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- Detailed View Modal -->
    <div id="reservationModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
        <div class="bg-dark-light rounded-xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
            <div class="p-6">
                <div class="flex justify-between items-start mb-4">
                    <h3 class="text-xl font-bold">Détails de la réservation</h3>
                    <button onclick="closeModal()" class="text-gray-400 hover:text-white">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div id="modalContent">
                    <!-- Modal content will be dynamically inserted here -->
                </div>
            </div>
        </div>
    </div>
        <!-- Ajout du script pour le toggle du sidebar -->
        <script>
        // Handle Mobile Adjustments
        function handleMobileAdjustments() {
            const isMobile = window.innerWidth < 768;
            Chart.defaults.font.size = isMobile ? 10 : 12;

            // Update chart configurations for mobile
            if (charts.revenue) {
                charts.revenue.options.scales.y.ticks.maxTicksLimit = isMobile ? 5 : 8;
                charts.revenue.update('none');
            }
        }

        // Sidebar Toggle Handler
        function setupSidebarToggle() {
            const sidebar = document.getElementById('sidebar');
            const sidebarToggle = document.getElementById('sidebarToggle');
            const content = document.querySelector('.flex-1');

            sidebarToggle?.addEventListener('click', () => {
                sidebar.classList.toggle('-translate-x-full');
            });

            // Close sidebar when clicking outside
            document.addEventListener('click', (e) => {
                if (window.innerWidth < 768 &&
                    !sidebar.contains(e.target) &&
                    !sidebarToggle.contains(e.target)) {
                    sidebar.classList.add('-translate-x-full');
                }
            });
        }

        // Initialize Everything
        function initialize() {
            setupSidebarToggle();
            handleMobileAdjustments();
            initCharts();
        }

        // Event Listeners
        document.addEventListener('DOMContentLoaded', initialize);

        // Debounced resize handler
        let resizeTimeout;
        window.addEventListener('resize', () => {
            clearTimeout(resizeTimeout);
            resizeTimeout = setTimeout(() => {
                handleMobileAdjustments();
                initCharts(); // Reinitialize charts on resize
            }, 250);
        });
    </script>
</body>

</html>