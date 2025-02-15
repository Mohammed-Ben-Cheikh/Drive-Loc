<?php
session_start();
if (isset($_SESSION['user_id']) && $_SESSION['user_id']) {
    header("Location: ../../public");
} else if (!isset($_SESSION['admin_id']) && !$_SESSION['admin_id']) {
    header("Location: ../../index.php");
}

require_once '../../app/controller/categories.php';
require_once '../../app/controller/vehicules.php';
require_once '../../app/controller/statistiquesManager.php'; // Add this line to include the statistiquesManager

$vehicules = Vehicule::getAll();
$stats = StatistiquesManager::getVehicleStats(); // Add this line to get the statistics
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drive-Loc Dashboard</title>
    <link rel="stylesheet" href="../../src/output.css">
    <script src="http://localhost/Drive-Loc-/tailwindcss.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                <li class="hover:bg-gray-700">
                    <a href="reservations.php" class="flex items-center px-6 py-3 text-gray-300 hover:text-white">
                        <i class="fas fa-calendar-alt mr-3"></i> Reservations
                    </a>
                </li>
                <li class="hover:bg-gray-700">
                    <a href="categories.php" class="flex items-center px-6 py-3 text-gray-300 hover:text-white">
                        <i class="fas fa-tags mr-3"></i> Categories
                    </a>
                </li>
                <li class="bg-dark/50 border-l-4 border-purple-600">
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
        <div class="flex-1 max-h-screen overflow-y-auto">
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
                                <a href="../../authentification/logout.php" class="block px-4 py-2 text-red-600 hover:bg-gray-100"><i
                                        class="fas fa-sign-out-alt mr-2"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Dashboard Content -->
            <div class="p-4 md:p-6">
                <!-- Page Header -->
                <div class="flex justify-between items-center mb-6">
                    <h1 class="text-2xl font-bold">Gestion des Vehicles</h1>
                    <a href="../../app/action/admin/vehicule/add.php"
                        class="flex items-center px-4 py-2 bg-emerald-600 rounded-lg hover:bg-emerald-700 transition-colors">
                        <i class="fas fa-car mr-2"></i> Add Vehicle
                    </a>
                </div>
                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                    <div class="bg-gradient-to-r from-purple-600 to-purple-800 rounded-xl p-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-white/60">Total vehicule</p>
                                <h3 class="text-3xl font-bold"><?php echo $stats['total_vehicules']; ?></h3>
                            </div>
                            <div class="text-white/80 bg-white/10 p-3 rounded-lg">
                                <i class="fas fa-tags text-2xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-blue-600 to-blue-800 rounded-xl p-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-white/60">Véhicules Disponibles</p>
                                <h3 class="text-3xl font-bold"><?php echo $stats['vehicules_disponibles']; ?></h3>
                            </div>
                            <div class="text-white/80 bg-white/10 p-3 rounded-lg">
                                <i class="fas fa-car text-2xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-red-600 to-red-800 rounded-xl p-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-white/60">Véhicules Indisponibles</p>
                                <h3 class="text-3xl font-bold"><?php echo $stats['vehicules_indisponibles']; ?></h3>
                            </div>
                            <div class="text-white/80 bg-white/10 p-3 rounded-lg">
                                <i class="fas fa-car text-2xl"></i>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gradient-to-r from-green-600 to-green-800 rounded-xl p-4">
                        <div class="flex justify-between items-center">
                            <div>
                                <p class="text-white/60">Véhicules Réservés</p>
                                <h3 class="text-3xl font-bold"><?php echo $stats['vehicules_reserves']; ?></h3>
                            </div>
                            <div class="text-white/80 bg-white/10 p-3 rounded-lg">
                                <i class="fas fa-car text-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Vehicles Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php if (empty($vehicules)): ?>
                        <div class="col-span-full text-center py-10">
                            <i class="fas fa-folder-open text-4xl text-gray-600 mb-3"></i>
                            <p class="text-gray-500">Aucune vehicle trouvée</p>
                        </div>
                    <?php else: ?>
                        <?php foreach ($vehicules as $vehicule): ?>
                            <div
                                class="bg-dark-light rounded-xl shadow-xl p-6 backdrop-blur-xl bg-opacity-80 border border-gray-800">
                                <div class="relative group">
                                    <img src="<?php echo htmlspecialchars($vehicule['image_url'] ?: 'https://via.placeholder.com/300'); ?>"
                                        alt="Vehicle Image" class="rounded-xl w-full h-48 object-cover">
                                    <div class="absolute top-4 right-4 flex flex-col gap-2">
                                        <?php
                                        $disponibilite_classes = [
                                            'Disponible' => 'bg-emerald-600',
                                            'Indisponible' => 'bg-red-500',
                                            'Réservé' => 'bg-blue-600',
                                        ];
                                        $disponibilite = $vehicule['disponibilite'] ?? 'Disponible';
                                        $disponibiliteClass = $disponibilite_classes[$disponibilite] ?? 'bg-gray-500';
                                        ?>
                                        <span
                                            class="<?= $disponibiliteClass; ?> text-white px-3 py-1 rounded-full text-sm font-semibold">
                                            <?= $disponibilite; ?>
                                        </span>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <h3 class="text-lg font-semibold text-gray-100">
                                        <?php echo htmlspecialchars($vehicule['nom']); ?>
                                    </h3>
                                    <p class="text-gray-400">
                                        <?php
                                        $categorie = Categorie::getById($vehicule['id_categorie_fk']);
                                        echo htmlspecialchars($categorie['nom']);
                                        ?>
                                    </p>
                                    <p class="text-gray-400 mt-2">Prix:
                                        <?php echo htmlspecialchars($vehicule['prix_a_loue']); ?>/jour
                                    </p>
                                    <div class="mt-4 flex space-x-2">
                                        <a href="../../app/action/admin/vehicule/edit.php?id=<?php echo $vehicule['id_vehicule']; ?>"
                                            class="flex-1 bg-blue-600 text-white text-center py-2 rounded-lg hover:bg-blue-700 transition">
                                            Edit
                                        </a>
                                        <a href="javascript:void(0);"
                                            onclick="showVehicleDetails(<?php echo $vehicule['id_vehicule']; ?>)"
                                            class="flex-1 bg-yellow-600 text-white text-center py-2 rounded-lg hover:bg-yellow-700 transition">
                                            View Details
                                        </a>
                                        <a href="../../app/action/admin/vehicule/delete.php?id=<?php echo $vehicule['id_vehicule']; ?>"
                                            class="flex-1 bg-red-600 text-white text-center py-2 rounded-lg hover:bg-red-700 transition">
                                            Delete
                                        </a>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php endif; ?>
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

        // Add these new functions
        function showVehicleDetails(vehicleId) {
            const modal = document.getElementById('vehicleDetailsModal');
            const content = document.getElementById('vehicleDetailsContent');

            // Show modal
            modal.classList.remove('hidden');

            // Fetch vehicle details
            fetch(`../../app/action/admin/vehicule/ficheTechnique.php?id=${vehicleId}`)
                .then(response => response.text())
                .then(html => {
                    content.innerHTML = html;
                })
                .catch(error => {
                    content.innerHTML = '<div class="text-red-600">Error loading vehicle details.</div>';
                    console.error('Error:', error);
                });
        }

        function closeModal() {
            const modal = document.getElementById('vehicleDetailsModal');
            modal.classList.add('hidden');
        }

        // Close modal when clicking outside
        document.getElementById('vehicleDetailsModal').addEventListener('click', function (e) {
            if (e.target === this) {
                closeModal();
            }
        });
    </script>

    <!-- Vehicle Details Modal -->
    <div id="vehicleDetailsModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50">
        <div
            class="relative overflow-hidden rounded-[2rem] bg-white/50 backdrop-blur-sm border-4 border-white shadow-2xl p-8 mt-8 max-w-6xl mx-auto">
            <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-600 hover:text-gray-800">
                <i class="fas fa-times text-2xl"></i>
            </button>
            <div id="vehicleDetailsContent" class="h-[400px]">
                <!-- Content will be loaded here -->
            </div>
        </div>
    </div>
</body>

</html>