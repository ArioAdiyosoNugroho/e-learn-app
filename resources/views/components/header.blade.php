    <header class="header" id="main-header">
        <div class="header-background"></div>
        <div class="header-container">
            <div class="header-content">
                <!-- Logo -->
                <div class="logo">
                    <div class="logo-icon">
                        <img src="{{ asset('tamp/asset/logo/logo.png') }}" alt="logo">
                        <div class="logo-glow"></div>
                    </div>
                    <span class="logo-text">EduQuiz</span>
                    <div class="logo-pulse"></div>
                </div>

                <!-- Navigation -->
                <nav class="navigation">
                    <a href="{{ route('home') }}" class="nav-item {{ request()->routeIs('home') ? 'active' : '' }}"
                        data-nav="home">
                        <span class="nav-text">Beranda</span>
                        <div class="nav-indicator"></div>
                        <div class="nav-wave"></div>
                    </a>

                    <a href="{{ route('materi') }}" class="nav-item {{ request()->routeIs('materi') ? 'active' : '' }}"
                        data-nav="materials">
                        <span class="nav-text">Materi</span>
                        <div class="nav-indicator"></div>
                        <div class="nav-wave"></div>
                    </a>
                    <a href="{{ route('quiz.index') }}" class="nav-item  {{ request()->routeIs('quiz') ? 'active' : '' }}" data-nav="quizzes">
                        <span class="nav-text">Kuiz</span>
                        <div class="nav-indicator"></div>
                        <div class="nav-wave"></div>
                    </a>
                    <a href="Leaderboard.html" class="nav-item" data-nav="teachers">
                        <span class="nav-text">Leaderboard</span>
                        <div class="nav-indicator"></div>
                        <div class="nav-wave"></div>
                    </a>
                    <a href="Artikel.html" class="nav-item" data-nav="blog">
                        <span class="nav-text">Artikel</span>
                        <div class="nav-indicator"></div>
                        <div class="nav-wave"></div>
                    </a>
                </nav>

                <!-- Actions -->
                <div class="header-actions">
                    <!-- Search -->
                    <div class="search-wrapper">
                        <button class="search-toggle" id="search-toggle">
                            <i class="fas fa-search"></i>
                            <div class="icon-ripple"></div>
                        </button>
                        <div class="search-expand" id="search-expand">
                            <input type="text" placeholder="Cari materi..." class="search-input">
                            <button class="search-close">
                                <i class="fas fa-times"></i>
                            </button>
                            <div class="search-progress"></div>
                        </div>
                    </div>

                    <!-- Notifications -->
                    <div class="notifications">
                        <button class="notification-btn">
                            <i class="fas fa-bell"></i>
                            <span class="notification-badge">3</span>
                            <div class="bell-wave"></div>
                            <div class="icon-ripple"></div>
                        </button>
                        <div class="notification-popup">
                            <div class="notification-header">
                                <h4>Notifikasi</h4>
                                <span class="notification-count">3 baru</span>
                            </div>
                            <div class="notification-list">
                                <div class="notification-item">
                                    <div class="notification-icon">
                                        <i class="fas fa-trophy"></i>
                                    </div>
                                    <div class="notification-content">
                                        <p class="notification-title">Pencapaian Baru!</p>
                                        <p class="notification-desc">Kamu menyelesaikan kuiz Matematika</p>
                                        <span class="notification-time">2 menit lalu</span>
                                    </div>
                                </div>
                                <div class="notification-item">
                                    <div class="notification-icon">
                                        <i class="fas fa-book"></i>
                                    </div>
                                    <div class="notification-content">
                                        <p class="notification-title">Materi Baru</p>
                                        <p class="notification-desc">Fisika: Hukum Newton tersedia</p>
                                        <span class="notification-time">1 jam lalu</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- User Menu -->
                    <div class="user-menu">
                        <button class="user-avatar">
                            <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('images/default-avatar.jpg') }}"
                                alt="User" class="w-14 h-14 rounded-full object-cover">
                            <div class="avatar-shine"></div>
                        </button>
                        <div class="user-dropdown">
                            <div class="user-info">
                                <div class="user-avatar-large">
                                    <img src="{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : asset('images/default-avatar.jpg') }}"
                                        alt="User" class="w-14 h-14 rounded-full object-cover">
                                </div>
                                <div class="user-details">
                                    <h4>{{ Auth::user()->name }}</h4>
                                    <span class="text-sm text-gray-400">
                                        <span>@</span>{{ Auth::user()->username }}
                                    </span>
                                    <p>Siswa Premium</p>
                                </div>
                            </div>
                            <div class="dropdown-items">
                                <a href="profile.html" class="dropdown-item">
                                    <i class="fas fa-user"></i>
                                    <span>Profil Saya</span>
                                    <div class="item-wave"></div>
                                </a>
                                <a href="#" class="dropdown-item">
                                    <i class="fas fa-chart-line"></i>
                                    <span>Progress Belajar</span>
                                    <div class="item-wave"></div>
                                </a>
                                <div class="dropdown-divider"></div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="dropdown-item w-full text-left">
                                        <i class="fas fa-sign-out-alt"></i>
                                        <span>Keluar</span>
                                        <div class="item-wave"></div>
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>

                    <!-- Mobile Menu Toggle -->
                    <button class="mobile-toggle" id="mobile-toggle">
                        <span class="toggle-line"></span>
                        <span class="toggle-line"></span>
                        <span class="toggle-line"></span>
                        <div class="toggle-ripple"></div>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Navigation -->
        <nav class="mobile-nav" id="mobile-nav">
            <div class="mobile-nav-backdrop"></div>
            <div class="mobile-nav-content">
                <a href="#home" class="mobile-nav-item active">
                    <i class="fas fa-home"></i>
                    <span>Beranda</span>
                    <div class="mobile-nav-wave"></div>
                </a>
                <a href="#materials" class="mobile-nav-item">
                    <i class="fas fa-book"></i>
                    <span>Materi</span>
                    <div class="mobile-nav-wave"></div>
                </a>
                <a href="#quizzes" class="mobile-nav-item">
                    <i class="fas fa-puzzle-piece"></i>
                    <span>Kuiz</span>
                    <div class="mobile-nav-wave"></div>
                </a>
                <a href="#teachers" class="mobile-nav-item">
                    <i class="fas fa-chalkboard-teacher"></i>
                    <span>Guru</span>
                    <div class="mobile-nav-wave"></div>
                </a>
                <a href="#blog" class="mobile-nav-item">
                    <i class="fas fa-blog"></i>
                    <span>Blog</span>
                    <div class="mobile-nav-wave"></div>
                </a>
            </div>
        </nav>
    </header>
