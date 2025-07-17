// Dataset Detail Tabs Functionality
document.addEventListener('DOMContentLoaded', function() {
    // Tab switching functionality
    const tabButtons = document.querySelectorAll('.tab-button');
    const tabPanes = document.querySelectorAll('.tab-pane');
    
    tabButtons.forEach(button => {
        button.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-tab');
            
            // Remove active class from all buttons and panes
            tabButtons.forEach(btn => btn.classList.remove('active'));
            tabPanes.forEach(pane => pane.classList.remove('active'));
            
            // Add active class to clicked button
            this.classList.add('active');
            
            // Show corresponding tab pane
            const targetPane = document.getElementById(targetTab + '-tab');
            if (targetPane) {
                targetPane.classList.add('active');
            }
        });
    });
    
    // Share functionality
    const shareButtons = document.querySelectorAll('.share-btn');
    
    shareButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            
            const currentUrl = window.location.href;
            const title = document.querySelector('.dataset-title').textContent;
            
            if (this.classList.contains('facebook')) {
                const facebookUrl = `https://www.facebook.com/sharer/sharer.php?u=${encodeURIComponent(currentUrl)}`;
                window.open(facebookUrl, '_blank', 'width=600,height=400');
            } else if (this.classList.contains('twitter')) {
                const twitterUrl = `https://twitter.com/intent/tweet?url=${encodeURIComponent(currentUrl)}&text=${encodeURIComponent(title)}`;
                window.open(twitterUrl, '_blank', 'width=600,height=400');
            } else if (this.classList.contains('whatsapp')) {
                const whatsappUrl = `https://wa.me/?text=${encodeURIComponent(title + ' ' + currentUrl)}`;
                window.open(whatsappUrl, '_blank');
            } else if (this.classList.contains('link')) {
                // Copy link to clipboard
                navigator.clipboard.writeText(currentUrl).then(function() {
                    // Show temporary feedback
                    const originalIcon = button.innerHTML;
                    button.innerHTML = '<i class="fas fa-check"></i>';
                    button.style.background = '#10b981';
                    
                    setTimeout(() => {
                        button.innerHTML = originalIcon;
                        button.style.background = '#6b7280';
                    }, 2000);
                }).catch(function() {
                    // Fallback for older browsers
                    const textArea = document.createElement('textarea');
                    textArea.value = currentUrl;
                    document.body.appendChild(textArea);
                    textArea.select();
                    document.execCommand('copy');
                    document.body.removeChild(textArea);
                    
                    // Show feedback
                    const originalIcon = button.innerHTML;
                    button.innerHTML = '<i class="fas fa-check"></i>';
                    button.style.background = '#10b981';
                    
                    setTimeout(() => {
                        button.innerHTML = originalIcon;
                        button.style.background = '#6b7280';
                    }, 2000);
                });
            }
        });
    });
    
    // Add smooth scrolling for better UX
    const tabNavigation = document.querySelector('.tab-navigation');
    if (tabNavigation) {
        tabButtons.forEach(button => {
            button.addEventListener('click', function() {
                // Small delay to allow tab content to render
                setTimeout(() => {
                    tabNavigation.scrollIntoView({ 
                        behavior: 'smooth', 
                        block: 'start' 
                    });
                }, 100);
            });
        });
    }
});

// Table Tab Switching Functionality
function initializeTableTabs() {
    const tableTabs = document.querySelectorAll('.table-tab');
    const tablePanes = document.querySelectorAll('.table-pane');
    
    tableTabs.forEach(tab => {
        tab.addEventListener('click', function() {
            const targetTab = this.getAttribute('data-table-tab');
            
            // Remove active class from all tabs
            tableTabs.forEach(t => t.classList.remove('active'));
            
            // Add active class to clicked tab
            this.classList.add('active');
            
            // Hide all panes
            tablePanes.forEach(pane => pane.classList.remove('active'));
            
            // Show target pane
            const targetPane = document.getElementById(targetTab + '-pane');
            if (targetPane) {
                targetPane.classList.add('active');
                
                // Initialize chart if grafik tab is clicked
                if (targetTab === 'grafik') {
                    initializeChart();
                }
            }
        });
    });
}

// Column Sorting Functionality
function initializeTableSorting() {
    const sortableHeaders = document.querySelectorAll('.data-table th.sortable');
    
    sortableHeaders.forEach(header => {
        header.addEventListener('click', function() {
            const table = this.closest('table');
            const tbody = table.querySelector('tbody');
            const rows = Array.from(tbody.querySelectorAll('tr'));
            const columnIndex = Array.from(this.parentNode.children).indexOf(this);
            const isAscending = !this.classList.contains('sort-asc');
            
            // Remove sort classes from all headers
            sortableHeaders.forEach(h => {
                h.classList.remove('sort-asc', 'sort-desc');
                const icon = h.querySelector('i.fas');
                if (icon) {
                    icon.className = 'fas fa-sort';
                }
            });
            
            // Add sort class to current header
            this.classList.add(isAscending ? 'sort-asc' : 'sort-desc');
            const icon = this.querySelector('i.fas');
            if (icon) {
                icon.className = isAscending ? 'fas fa-sort-up' : 'fas fa-sort-down';
            }
            
            // Sort rows
            rows.sort((a, b) => {
                const aValue = a.children[columnIndex].textContent.trim();
                const bValue = b.children[columnIndex].textContent.trim();
                
                // Check if values are numbers
                const aNum = parseFloat(aValue.replace(/[^0-9.-]/g, ''));
                const bNum = parseFloat(bValue.replace(/[^0-9.-]/g, ''));
                
                if (!isNaN(aNum) && !isNaN(bNum)) {
                    return isAscending ? aNum - bNum : bNum - aNum;
                } else {
                    return isAscending ? 
                        aValue.localeCompare(bValue) : 
                        bValue.localeCompare(aValue);
                }
            });
            
            // Reorder rows in DOM
            rows.forEach(row => tbody.appendChild(row));
        });
    });
}

// Column Filtering Functionality
function initializeColumnFilters() {
    const filterInputs = document.querySelectorAll('.column-filter-input');
    const filterSelects = document.querySelectorAll('.column-filter-select');
    
    function filterTable() {
        const table = document.querySelector('.data-table');
        const tbody = table.querySelector('tbody');
        const rows = tbody.querySelectorAll('tr');
        
        rows.forEach(row => {
            let showRow = true;
            const cells = row.querySelectorAll('td');
            
            // Check each filter
            filterInputs.forEach((input, index) => {
                if (input.value.trim() !== '') {
                    const cellValue = cells[index]?.textContent.toLowerCase() || '';
                    const filterValue = input.value.toLowerCase();
                    if (!cellValue.includes(filterValue)) {
                        showRow = false;
                    }
                }
            });
            
            filterSelects.forEach((select, index) => {
                if (select.value !== '') {
                    const cellValue = cells[index]?.textContent.toLowerCase() || '';
                    const filterValue = select.value.toLowerCase();
                    if (!cellValue.includes(filterValue)) {
                        showRow = false;
                    }
                }
            });
            
            row.style.display = showRow ? '' : 'none';
        });
    }
    
    filterInputs.forEach(input => {
        input.addEventListener('input', filterTable);
    });
    
    filterSelects.forEach(select => {
        select.addEventListener('change', filterTable);
    });
}

// Pagination Functionality
function initializePagination() {
    const itemsPerPageSelect = document.querySelector('.items-per-page');
    const pageSelector = document.querySelector('.page-selector');
    const prevBtn = document.querySelector('.pagination-btn.prev');
    const nextBtn = document.querySelector('.pagination-btn.next');
    
    if (itemsPerPageSelect) {
        itemsPerPageSelect.addEventListener('change', function() {
            // Update table display based on items per page
            console.log('Items per page changed to:', this.value);
        });
    }
    
    if (pageSelector) {
        pageSelector.addEventListener('change', function() {
            // Update table display based on page
            console.log('Page changed to:', this.value);
        });
    }
    
    if (prevBtn) {
        prevBtn.addEventListener('click', function() {
            const currentPage = parseInt(pageSelector.value);
            if (currentPage > 1) {
                pageSelector.value = currentPage - 1;
                pageSelector.dispatchEvent(new Event('change'));
            }
        });
    }
    
    if (nextBtn) {
        nextBtn.addEventListener('click', function() {
            const currentPage = parseInt(pageSelector.value);
            const maxPage = parseInt(pageSelector.options[pageSelector.options.length - 1].value);
            if (currentPage < maxPage) {
                pageSelector.value = currentPage + 1;
                pageSelector.dispatchEvent(new Event('change'));
            }
        });
    }
}

// Download dropdown functionality
function initializeDropdowns() {
    const dropdownButtons = document.querySelectorAll('[data-dropdown]');
    
    dropdownButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const dropdownType = this.getAttribute('data-dropdown');
            const dropdownMenu = document.getElementById(`${dropdownType}-dropdown`);
            
            // Close all other dropdowns
            document.querySelectorAll('.dropdown-menu').forEach(menu => {
                if (menu !== dropdownMenu) {
                    menu.classList.remove('show');
                }
            });
            
            // Toggle current dropdown
            dropdownMenu.classList.toggle('show');
        });
    });
    
    // Close dropdowns when clicking outside
    document.addEventListener('click', function() {
        document.querySelectorAll('.dropdown-menu').forEach(menu => {
            menu.classList.remove('show');
        });
    });
    
    // Handle dropdown item clicks
    document.querySelectorAll('.dropdown-item').forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const format = this.getAttribute('data-format');
            const isFiltered = this.closest('#filter-dropdown') !== null;
            handleDownload(format, isFiltered);
            
            // Close dropdown
            this.closest('.dropdown-menu').classList.remove('show');
        });
    });
}

// Download functionality
function handleDownload(format, isFiltered = false) {
    const downloadType = isFiltered ? 'filtered' : 'full';
    console.log(`Downloading ${downloadType} dataset in ${format} format`);
    
    // Simulate download process
    const fileName = isFiltered ? 
        `dataset-filtered.${format}` : 
        `dataset-pendidikan-jabar.${format}`;
    
    alert(`Dataset akan diunduh: ${fileName}`);
    
    // Here you would implement actual download logic
    // For example, trigger a download URL or API call
}

// Chart functionality
let chartInstance = null;

function initializeChart() {
    const canvas = document.getElementById('dataChart');
    if (!canvas) return;
    
    const ctx = canvas.getContext('2d');
    
    // Sample data based on the table
    const chartData = {
        labels: ['Kab. Bogor', 'Kab. Sukabumi', 'Kab. Cianjur', 'Kab. Bandung', 'Kab. Garut', 'Kab. Tasikmalaya'],
        datasets: [{
            label: 'Jumlah Kepala Sekolah & Guru',
            data: [4646, 1893, 2715, 2532, 2962, 2424],
            backgroundColor: [
                '#3B82F6',
                '#EF4444', 
                '#10B981',
                '#F59E0B',
                '#8B5CF6',
                '#06B6D4'
            ],
            borderColor: [
                '#2563EB',
                '#DC2626',
                '#059669',
                '#D97706',
                '#7C3AED',
                '#0891B2'
            ],
            borderWidth: 2
        }]
    };
    
    const config = {
        type: 'bar',
        data: chartData,
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Distribusi Kepala Sekolah & Guru per Kabupaten'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jumlah (Orang)'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Kabupaten'
                    }
                }
            }
        }
    };
    
    if (chartInstance) {
        chartInstance.destroy();
    }
    
    chartInstance = new Chart(ctx, config);
}

function initializeChartControls() {
    const chartTypeSelect = document.getElementById('chartType');
    const chartFilterSelect = document.getElementById('chartFilter');
    
    if (chartTypeSelect) {
        chartTypeSelect.addEventListener('change', function() {
            updateChartType(this.value);
        });
    }
    
    if (chartFilterSelect) {
        chartFilterSelect.addEventListener('change', function() {
            updateChartFilter(this.value);
        });
    }
    
    // Chart download buttons
    document.querySelectorAll('.btn-chart-download').forEach(btn => {
        btn.addEventListener('click', function() {
            const format = this.getAttribute('data-format');
            downloadChart(format);
        });
    });
}

function updateChartType(type) {
    if (!chartInstance) return;
    
    chartInstance.config.type = type;
    
    if (type === 'pie') {
        chartInstance.options.scales = {};
    } else {
        chartInstance.options.scales = {
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Jumlah (Orang)'
                }
            },
            x: {
                title: {
                    display: true,
                    text: 'Kabupaten'
                }
            }
        };
    }
    
    chartInstance.update();
}

function updateChartFilter(filter) {
    if (!chartInstance) return;
    
    // Update chart data based on filter
    // This is a simplified example
    console.log(`Filtering chart by: ${filter}`);
    chartInstance.update();
}

function downloadChart(format) {
    if (!chartInstance) return;
    
    const canvas = chartInstance.canvas;
    
    if (format === 'png') {
        const url = canvas.toDataURL('image/png');
        const link = document.createElement('a');
        link.download = 'chart.png';
        link.href = url;
        link.click();
    } else if (format === 'svg') {
        // SVG download would require additional library
        alert('SVG download akan segera tersedia');
    }
}

// Initialize all table functionalities when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    initializeTableTabs();
    initializeTableSorting();
    initializeColumnFilters();
    initializePagination();
    initializeDropdowns();
    
    // Initialize chart when grafik tab is shown
    const grafikTab = document.querySelector('[data-table-tab="grafik"]');
    if (grafikTab) {
        grafikTab.addEventListener('click', function() {
            setTimeout(() => {
                initializeChart();
                initializeChartControls();
            }, 100);
        });
    }
});

// Add Font Awesome for icons if not already included
if (!document.querySelector('link[href*="font-awesome"]')) {
    const fontAwesome = document.createElement('link');
    fontAwesome.rel = 'stylesheet';
    fontAwesome.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css';
    document.head.appendChild(fontAwesome);
}