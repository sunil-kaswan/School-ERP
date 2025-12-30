<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Chhota Global School - Rania, Sirsa</title>
    <link href=" {{ asset('assets/css/welcome.min.css') }}" rel="stylesheet" type="text/css">
</head>
<body>
    <!-- Scroll Progress Bar -->
    <div class="scroll-progress" id="scrollProgress"></div>

    <!-- Navigation -->
    <nav>
        <div class="container">
            <div class="logo">
                <span class="logo-icon">🎓</span>
                My Chhota Global School
            </div>
            <ul>
                <li><a href="#home">Home</a></li>
                <li><a href="#about">About</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#features">Features</a></li>
                <li><a href="#levels">Levels</a></li>
                <li><a href="#contact">Contact</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section with Image Slider -->
    <section class="hero" id="home">
        <div class="slider-container">
            <!-- Slide 1 -->
            <div class="slide active">
                <div class="slide-bg" style="background-image: url('https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=1920&q=80');"></div>
                <div class="slide-overlay"></div>
                <div class="slide-content">
                    <h1>Welcome to My Chhota Global School</h1>
                    <p>Excellence in Education Since Day One</p>
                    <button class="cta-button" onclick="document.getElementById('about').scrollIntoView({behavior: 'smooth'})">
                        <span style="position: relative; z-index: 1;">Discover More</span>
                    </button>
                </div>
            </div>

            <!-- Slide 2 -->
            <div class="slide">
                <div class="slide-bg" style="background-image: url('https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=1920&q=80');"></div>
                <div class="slide-overlay"></div>
                <div class="slide-content">
                    <h1>Nurturing Young Minds</h1>
                    <p>Located in Rania, Sirsa - Haryana</p>
                    <button class="cta-button" onclick="document.getElementById('contact').scrollIntoView({behavior: 'smooth'})">
                        <span style="position: relative; z-index: 1;">Get In Touch</span>
                    </button>
                </div>
            </div>

            <!-- Slide 3 -->
            <div class="slide">
                <div class="slide-bg" style="background-image: url('https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=1920&q=80');"></div>
                <div class="slide-overlay"></div>
                <div class="slide-content">
                    <h1>Building Tomorrow's Leaders</h1>
                    <p>Quality Education for Every Student</p>
                    <button class="cta-button" onclick="document.getElementById('features').scrollIntoView({behavior: 'smooth'})">
                        <span style="position: relative; z-index: 1;">Explore Programs</span>
                    </button>
                </div>
            </div>

            <!-- Slide 4 -->
            <div class="slide">
                <div class="slide-bg" style="background-image: url('https://images.unsplash.com/photo-1509062522246-3755977927d7?w=1920&q=80');"></div>
                <div class="slide-overlay"></div>
                <div class="slide-content">
                    <h1>Empowering Students</h1>
                    <p>Comprehensive Approach to Learning</p>
                    <button class="cta-button" onclick="document.getElementById('gallery').scrollIntoView({behavior: 'smooth'})">
                        <span style="position: relative; z-index: 1;">View Gallery</span>
                    </button>
                </div>
            </div>
        </div>

        <!-- Slider Arrows -->
        <div class="slider-arrows">
            <div class="arrow" onclick="changeSlide(-1)">‹</div>
            <div class="arrow" onclick="changeSlide(1)">›</div>
        </div>

        <!-- Slider Dots -->
        <div class="slider-dots">
            <div class="dot active" onclick="goToSlide(0)"></div>
            <div class="dot" onclick="goToSlide(1)"></div>
            <div class="dot" onclick="goToSlide(2)"></div>
            <div class="dot" onclick="goToSlide(3)"></div>
        </div>
    </section>

    <!-- About Section -->
    <section class="about" id="about">
        <div class="floating-elements">
            <div class="float-shape" style="top: 10%; left: 10%; width: 200px; height: 200px; background: linear-gradient(135deg, #667eea, #764ba2); border-radius: 50%;"></div>
            <div class="float-shape" style="bottom: 10%; right: 10%; width: 150px; height: 150px; background: linear-gradient(135deg, #764ba2, #667eea); border-radius: 50%;"></div>
        </div>
        <div class="container">
            <h1 class="section-title">About Our School</h1>
            <div class="about-content">
                <div class="about-text">
                    <h3>🌟 A Prestigious Educational Institution</h3>
                    <p>My Chhota Global School in Rania, Sirsa-Haryana is a leading name in the education sector, dedicated to providing comprehensive and quality education to every student.</p>
                    <p>We ensure that every student receives the attention and support they need to excel in their academic journey and personal growth.</p>
                    <p>With a team of experienced educators and state-of-the-art facilities, we are committed to academic excellence and holistic development.</p>
                </div>
                <div class="about-image">
                    <div class="image-wrapper">
                        <img src="https://images.unsplash.com/photo-1497633762265-9d179a990aa6?w=800&q=80" alt="School Building">
                        <div class="image-badge">⭐ Excellence</div>
                    </div>
                </div>
            </div>

            <div class="about-content" style="margin-top: 4rem;">
                <div class="about-image">
                    <div class="image-wrapper">
                        <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?w=800&q=80" alt="Students Learning">
                        <div class="image-badge">📚 Quality Education</div>
                    </div>
                </div>
                <div class="about-text">
                    <h3>🎯 Our Approach</h3>
                    <p>We offer a well-rounded education that includes academic subjects, arts, physical education, and character development programs designed to prepare students for future success.</p>
                    <p>Our curriculum ensures effective governance and a structured approach to both academic and administrative functions.</p>
                    <p>The school operates on a flexible schedule that accommodates students' varied commitments and learning needs.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery" id="gallery">
        <div class="container">
            <h1 class="section-title">Our Campus Life</h1>
            <div class="gallery-grid">
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=600&q=80" alt="Students in Classroom">
                    <div class="gallery-overlay">
                        <h3>Modern Classrooms</h3>
                        <p>State-of-the-art learning environment</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?w=600&q=80" alt="Library">
                    <div class="gallery-overlay">
                        <h3>Digital Library</h3>
                        <p>Extensive collection of books & resources</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1571260899304-425eee4c7efc?w=600&q=80" alt="Sports">
                    <div class="gallery-overlay">
                        <h3>Sports Facilities</h3>
                        <p>Promoting physical fitness & teamwork</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=600&q=80" alt="Science Lab">
                    <div class="gallery-overlay">
                        <h3>Science Labs</h3>
                        <p>Hands-on learning experiences</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1522661067900-ab829854a57f?w=600&q=80" alt="Computer Lab">
                    <div class="gallery-overlay">
                        <h3>Computer Lab</h3>
                        <p>Latest technology & equipment</p>
                    </div>
                </div>
                <div class="gallery-item">
                    <img src="https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=600&q=80" alt="Students Activities">
                    <div class="gallery-overlay">
                        <h3>Extracurricular</h3>
                        <p>Arts, music, drama & more</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section class="features" id="features">
        <div class="container">
            <h1 class="section-title" style="color: white;">Why Choose Us</h1>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">👨‍🏫</div>
                    <h3>Experienced Faculty</h3>
                    <p>Dedicated team of qualified and experienced educators committed to student success</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🏫</div>
                    <h3>Modern Facilities</h3>
                    <p>State-of-the-art infrastructure with latest learning resources and technology</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📖</div>
                    <h3>Comprehensive Curriculum</h3>
                    <p>Well-rounded education including academics, arts, sports and life skills</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🎯</div>
                    <h3>Individual Attention</h3>
                    <p>Personalized support and guidance for every student's unique needs</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🌍</div>
                    <h3>Global Perspective</h3>
                    <p>Preparing students with international standards and global mindset</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🤝</div>
                    <h3>Inclusive Environment</h3>
                    <p>Promoting diversity, cultural understanding and mutual respect</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Video Section -->
    <section class="video-section">
        <div class="container">
            <h1 class="section-title">School Tour</h1>
            <p style="text-align: center; font-size: 1.3rem; color: #666; margin-bottom: 2rem;">
                Take a virtual tour of our beautiful campus and facilities
            </p>
            <div class="video-container">
                <iframe src="https://www.youtube.com/embed/jNQXAC9IVRw?si=jHQmw7n9xPQhKBon" title="School Campus" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </section>

    <!-- Levels Section -->
    <section class="levels" id="levels">
        <div class="container">
            <h1 class="section-title">Levels of Schooling</h1>
            <p style="text-align: center; font-size: 1.3rem; color: #666; margin-bottom: 2rem;">
                We offer education across various levels, from early childhood through higher education
            </p>
            <div class="levels-grid">
                <div class="level-card">
                    <div class="level-icon">🧒</div>
                    <h3>Pre-Primary</h3>
                    <p>Nursery & Kindergarten</p>
                </div>
                <div class="level-card">
                    <div class="level-icon">📚</div>
                    <h3>Primary</h3>
                    <p>Classes 1-5</p>
                </div>
                <div class="level-card">
                    <div class="level-icon">🎒</div>
                    <h3>Middle School</h3>
                    <p>Classes 6-8</p>
                </div>
                <div class="level-card">
                    <div class="level-icon">🎓</div>
                    <h3>Secondary</h3>
                    <p>Classes 9-10</p>
                </div>
                <div class="level-card">
                    <div class="level-icon">🏆</div>
                    <h3>Senior Secondary</h3>
                    <p>Classes 11-12</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section class="contact" id="contact">
        <div class="container">
            <h1 class="section-title" style="color: white;">Get In Touch</h1>
            <p style="font-size: 1.4rem; margin-bottom: 2rem;">We welcome applications from students of diverse backgrounds</p>
            <div class="contact-info">
                <div class="contact-card">
                    <div class="contact-icon">📍</div>
                    <h3>Location</h3>
                    <p>Rania, Sirsa<br>Haryana, India</p>
                </div>
                <div class="contact-card">
                    <div class="contact-icon">📞</div>
                    <h3>Contact</h3>
                    <p>Visit our admissions office<br>for detailed information</p>
                </div>
                <div class="contact-card">
                    <div class="contact-icon">⏰</div>
                    <h3>Office Hours</h3>
                    <p>Monday - Saturday<br>Flexible timings</p>
                </div>
                <div class="contact-card">
                    <div class="contact-icon">🎯</div>
                    <h3>Admissions</h3>
                    <p>Structured & Transparent<br>Process for All</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <p style="font-size: 1.3rem; font-weight: 700; margin-bottom: 1rem;">🎓 My Chhota Global School</p>
        <p>&copy; 2024 My Chhota Global School, Rania, Sirsa-Haryana. All rights reserved.</p>
        <p style="margin-top: 1rem;">Empowering Students | Building Futures | Promoting Excellence</p>
        <div class="footer-icons">
            <span>📧</span>
            <span>📱</span>
            <span>🌐</span>
            <span>📍</span>
        </div>
    </footer>

    <script>
        // Slider functionality
        let currentSlide = 0;
        const slides = document.querySelectorAll('.slide');
        const dots = document.querySelectorAll('.dot');
        const totalSlides = slides.length;

        function showSlide(n) {
            slides.forEach(slide => slide.classList.remove('active'));
            dots.forEach(dot => dot.classList.remove('active'));
            
            currentSlide = (n + totalSlides) % totalSlides;
            slides[currentSlide].classList.add('active');
            dots[currentSlide].classList.add('active');
        }

        function changeSlide(direction) {
            showSlide(currentSlide + direction);
        }

        function goToSlide(n) {
            showSlide(n);
        }

        // Auto-advance slides every 6 seconds
        setInterval(() => {
            changeSlide(1);
        }, 6000);

        // Scroll Progress Bar
        window.addEventListener('scroll', () => {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            document.getElementById('scrollProgress').style.width = scrolled + '%';
        });

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all animated elements
        document.querySelectorAll('.feature-card, .level-card, .contact-card, .gallery-item').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(30px)';
            el.style.transition = 'all 0.8s ease';
            observer.observe(el);
        });

        // Smooth scroll for navigation
        document.querySelectorAll('nav a').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if(target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Add parallax effect to hero section
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const parallaxElements = document.querySelectorAll('.slide-bg');
            parallaxElements.forEach(el => {
                el.style.transform = `translateY(${scrolled * 0.5}px)`;
            });
        });
    </script>
</body>
</html>