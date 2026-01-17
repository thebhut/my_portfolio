<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaydip Bhut- Portfolio</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css?v=2') }}">
</head>
<body>
    <div id="root">
        <div class="portfolio-website">
            <!-- Navigation -->
            <nav class="navbar">
                <div class="nav-container">
                    <div class="nav-logo">
                        <h2>Jaydip Bhut</h2>
                    </div>
                    <ul class="nav-menu">
                        <li><a href="#home" class="nav-link">Home</a></li>
                        <li><a href="#about" class="nav-link">About</a></li>
                        <li><a href="#skills" class="nav-link">Skills</a></li>
                        <li><a href="#experience" class="nav-link">Experience</a></li>
                        <li><a href="#projects" class="nav-link">Projects</a></li>
                        <li><a href="#contact" class="nav-link">Contact</a></li>
                    </ul>
                    <div class="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </nav>

            <!-- Hero Section -->
            <section id="home" class="hero">
                <div class="hero-container">
                    <div class="hero-content">
                        <h1 class="hero-title">Hi, I'm <span class="gradient-text">Jaydip Bhut</span></h1>
                        <h2 class="hero-subtitle">Full Time Laravel Developer</h2>
                        <!-- <p class="hero-description">Salesforce Certified Platform Developer with 16+ years of experience leading the design, architecture, and delivery of cloud-native SaaS platforms. Proven expertise in driving high-performance software solutions using modern technologies, with a focus on innovation, scalability, and operational efficiency.</p> -->
                        <div class="hero-buttons">
                            <a href="#projects" class="btn btn-primary">View My Work</a>
                            <a href="#contact" class="btn btn-secondary">Get In Touch</a>
                        </div>
                    </div>
                    <div class="hero-image">
                        <div class="profile-card">
                            <div class="profile-avatar">
                                <span>JD</span>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- About Section -->
            <section id="about" class="about">
                <div class="container">
                    <h2 class="section-title">About Me</h2>
                    <div class="about-content">
                        <div class="about-text">
                            <p>I'm a seasoned Project Manager & Software Architect with over 16 years of expertise in full-stack development and cloud solutions. As a Certified Salesforce Platform Developer 4X and current CTO at AllTake Global PVT.LTD, I specialize in leading technology teams and delivering innovative software solutions.</p>
                            <p>My experience spans across various domains including SocialTech, FinTech, LegalTech, and eCommerce. I'm passionate about translating complex technical concepts into actionable strategies and fostering a culture of innovation within technology teams.</p>
                            <div class="about-stats">
                                <div class="stat">
                                    <h3>16+</h3>
                                    <p>Years Experience</p>
                                </div>
                                <div class="stat">
                                    <h3>{{ $projects->count() }}+</h3>
                                    <p>Major Projects</p>
                                </div>
                                <div class="stat">
                                    <h3>4X</h3>
                                    <p>Salesforce Certified</p>
                                </div>
                                <div class="stat">
                                    <h3>3X</h3>
                                    <p>Hackathon Winner</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Skills Section -->
            <section id="skills" class="py-20 bg-white">
                <div class="container mx-auto px-4 max-w-6xl">
                    <h2 class="section-title text-center mb-12">Skills & Technologies</h2>
                    <div class="space-y-12">
                        @foreach($skills->groupBy('category.name') as $category => $categorySkills)
                        <div class="flex flex-col items-center gap-6 mb-12 last:mb-0">
                            <!-- Category Label -->
                            <div class="text-center mb-4">
                                <h3 class="text-xl font-semibold text-slate-800">{{ $category }}</h3>
                            </div>
                            
                            <!-- Skills Chips -->
                            <div class="flex flex-wrap justify-center gap-4  mb-8">
                                @foreach($categorySkills as $skill)
                                <div class="bg-white border border-gray-200 rounded-lg px-5 py-3 flex items-center gap-3 shadow-sm hover:shadow-md transition-shadow">
                                    <div class="text-xl leading-none flex items-center justify-center">{{ $skill->icon }}</div>
                                    <span class="font-medium text-slate-600">{{ $skill->name }}</span>
                                </div>
                                @endforeach
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>


            <!-- Experience Section -->
            <section id="experience" class="experience">
                <div class="container">
                    <h2 class="section-title">Professional Experience</h2>
                    <div class="timeline">
                        @foreach($experiences as $experience)
                        <div class="timeline-item">
                            <div class="timeline-dot"></div>
                            <div class="timeline-content">
                                <h3>{{ $experience->role }}</h3>
                                <h4>{{ $experience->company }}</h4>
                                <span class="timeline-date">
                                    {{ $experience->start_date ? \Carbon\Carbon::parse($experience->start_date)->format('M Y') : '' }} - 
                                    {{ $experience->is_current ? 'Present' : ($experience->end_date ? \Carbon\Carbon::parse($experience->end_date)->format('M Y') : '') }}
                                </span>
                                <p>{{ $experience->description }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- Projects Section -->
            <section id="projects" class="projects">
                <div class="container">
                    <h2 class="section-title">Featured Projects</h2>
                    <div class="projects-grid">
                        @foreach($projects as $project)
                        <div class="project-card">
                            <div class="project-image">
                                <img alt="{{ $project->title }}" src="{{ $project->image ? asset('storage/' . $project->image) : asset('images/default-project.png') }}">
                                <div class="project-overlay">
                                    <div class="project-links">
                                        @if($project->link)
                                        <a href="{{ $project->link }}" class="project-link" target="_blank">View Details</a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="project-content">
                                <h3>{{ $project->title }}</h3>
                                <p>{{ $project->description }}</p>
                                <div class="project-tech">
                                    @if($project->tech_stack)
                                        @foreach(is_array($project->tech_stack) ? $project->tech_stack : json_decode($project->tech_stack, true) ?? [] as $tech)
                                            <span>{{ $tech }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- Education Section -->
            <section id="education" class="education">
                <div class="container">
                    <h2 class="section-title">Education & Certifications</h2>
                    <div class="education-grid">
                        @foreach($educations as $education)
                        <div class="education-card">
                            <div class="education-icon">🎓</div>
                            <h3>{{ $education->degree }}</h3>
                            <h4>{{ $education->institution }}</h4>
                            <span class="education-year">
                                {{ $education->start_date ? \Carbon\Carbon::parse($education->start_date)->format('Y') : '' }} - 
                                {{ $education->end_date ? \Carbon\Carbon::parse($education->end_date)->format('Y') : 'Present' }}
                            </span>
                            <p>{{ $education->description }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- Testimonials Section -->
            <section id="testimonials" class="testimonials">
                <div class="container">
                    <h2 class="section-title text-center">Testimonials</h2>
                    <div class="testimonials-grid">
                        @foreach($testimonials as $testimonial)
                        <div class="testimonial-card">
                           <div class="testimonial-content">
                               <p>“{{ $testimonial->content }}”</p>
                           </div>
                           <div class="testimonial-author">
                               @if($testimonial->image)
                               <img src="{{ asset('storage/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" class="h-10 w-10 rounded-full inline-block mr-2">
                               @endif
                               <h4>{{ $testimonial->name }}</h4>
                               <span>{{ $testimonial->role }} {{ $testimonial->company ? 'at ' . $testimonial->company : '' }}</span>
                           </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>

            <!-- Contact Section -->
            <section id="contact" class="contact">
                <div class="container">
                    <h2 class="section-title">Get In Touch</h2>
                    <div class="contact-content">
                        <div class="contact-info">
                            <h3>Let's Talk</h3>
                            <p>I'm always open to discussing new projects, creative ideas or opportunities to be part of your visions.</p>
                            <div class="contact-details">
                                <div class="contact-item">
                                    <div class="contact-icon">📧</div>
                                    <div>
                                        <h4>Email</h4>
                                        <p>rohit.vakhariya@gmail.com</p>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <div class="contact-icon">📱</div>
                                    <div>
                                        <h4>Phone</h4>
                                        <p>+91 99999 99999</p>
                                    </div>
                                </div>
                                <div class="contact-item">
                                    <div class="contact-icon">📍</div>
                                    <div>
                                        <h4>Location</h4>
                                        <p>Ahmedabad, Gujarat, India</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <form action="{{ route('contact.store') }}" method="POST" class="contact-form">
                            @csrf
                            @if(session('success'))
                                <div style="background-color: #d1fae5; color: #065f46; padding: 1rem; border-radius: 0.5rem; margin-bottom: 1rem;">
                                    {{ session('success') }}
                                </div>
                            @endif
                            <div class="form-group">
                                <input type="text" name="name" placeholder="Your Name" required>
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="Your Email" required>
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" placeholder="Subject">
                            </div>
                            <div class="form-group">
                                <textarea name="message" placeholder="Your Message" required></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary">Send Message</button>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

            <!-- Footer -->
            <footer class="footer">
                <div class="footer-content">
                    <p>&copy; {{ date('Y') }} Rohit Vakhariya. All rights reserved.</p>
                    <div class="social-links">
                        <a href="#" class="social-link">in</a>
                        <a href="#" class="social-link">tw</a>
                        <a href="#" class="social-link">gh</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!-- Simple Script for Hamburger Menu -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const hamburger = document.querySelector('.hamburger');
            const navMenu = document.querySelector('.nav-menu');

            if(hamburger) {
                hamburger.addEventListener('click', () => {
                    hamburger.classList.toggle('active');
                    navMenu.classList.toggle('active');
                });
            }

            // Close menu when clicking a link
            document.querySelectorAll('.nav-link').forEach(n => n.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navMenu.classList.remove('active');
            }));
        });
    </script>
</body>
</html>
